<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model {

	public function listainventario()
	{
		$this->db->select('idproducto,cantidad'); 
		$this->db->from('producto '); 

		$productos= $this->db->get()->result_array(); 
		
		$inventario = [];

		foreach($productos as $producto){
			$this->db->select_sum('cantidad');
        	$this->db->where('idproducto', $producto['idproducto']);
        	$query = $this->db->get('pedido');
        	$pedido = $query->row_array();

		
		

		$data=array(
			'idproducto'=>$producto['idproducto'],
			'inventarioRecibido'=>$producto['cantidad'],
			'pedido'=>$pedido['cantidad'],
			'inventarioDisponible'=>$producto['cantidad'] - ($pedido['cantidad']),
			'estado'=>'disponible'
		);

		if ($data['inventarioDisponible']<=0){
			$data['estado'] = 'no disponible';
		}

		$this->db->where('idproducto',$producto['idproducto']);
		$data3 = $this->db->get('inventario');

		

		if($data3->num_rows()>0){
			$this->db->where('idproducto',$producto['idproducto']);
			$this->db->update('inventario',$data);
		}
		else{
			$this->db->insert('inventario',$data);
		}

		$inventario[]=$data;
		
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