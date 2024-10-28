<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model {

	public function listainventario()
	{
		$this->db->select('p.idproducto, p.cantidad as inventarioRecibido, 
						   COALESCE(SUM(pd.cantidad), 0) as pedido, 
						   (p.cantidad - COALESCE(SUM(pd.cantidad), 0)) as inventarioDisponible, 
						   CASE WHEN (p.cantidad - COALESCE(SUM(pd.cantidad), 0)) <= 0 THEN "no disponible" ELSE "disponible" END as estado');
		$this->db->from('producto p');
		$this->db->join('pedido pd', 'pd.idproducto = p.idproducto', 'left'); 
		$this->db->group_by('p.idproducto'); 

		$query = $this->db->get();
		$inventario = $query->result_array();

		
		foreach ($inventario as $data) {
			$this->db->where('idproducto', $data['idproducto']);
			$data3 = $this->db->get('inventario');

			if ($data3->num_rows() > 0) {
				$this->db->where('idproducto', $data['idproducto']);
				$this->db->update('inventario', $data);
			} else {
				$this->db->insert('inventario', $data);
			}
		}

		return $inventario;
	
	}

	public function obtenerstock($idproducto){
        $this->db->from('inventario');
        $this->db->where('idproducto',$idproducto);
        return $this->db->get()->row();
    }
	public function actualizarstock($idproducto,$nuevostock){
      

		$this->db->select_sum('cantidad');
    	$this->db->where('idproducto', $idproducto);
    	$pedidoQuery = $this->db->get('pedido');
    	$totalPedidos = $pedidoQuery->row_array()['cantidad'];

   
    $inventarioDisponible = $nuevostock - $totalPedidos;


    $this->db->where('idproducto', $idproducto);
    return $this->db->update('inventario', ['inventarioDisponible' => $inventarioDisponible]);


    }
	

	
}