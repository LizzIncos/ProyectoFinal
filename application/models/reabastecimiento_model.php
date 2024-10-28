<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reabastecimiento_model extends CI_Model {

	public function listaReabastecimiento()
	{
		$this->db->select('r.idreabastecimiento, p.producto, r.cantidad,r.fechaReabastecimiento,r.estado'); 
		$this->db->from('reabastecimiento r'); 
        $this->db->join('inventario i','r.idinventario = i.idinventario');
        $this->db->join('producto p','r.idproducto = p.idproducto');

		return $this->db->get(); 
		
		
	
	}
    public function ordenarReabastecimiento($inventarios) {
        $resultados = [];
        foreach ($inventarios as $inventario) {
            if ($inventario['estado'] === 'no disponible') {

                $this->db->select('idreabastecimiento');
                $this->db->from('reabastecimiento');
                $this->db->where('idproducto', $inventario['idproducto']);
                $this->db->where('estado = "pendiente" OR estado= "confirmado"');
                $query = $this->db->get();

                if($query->num_rows()=== 0){
                    $this->db->select('i.idinventario');
                    $this->db->from('inventario i');
                    $this->db->where('i.idproducto',$inventario['idproducto']);
                    $query = $this->db->get();
                
                    if ($query->num_rows() > 0) {
                        $result = $query->row();


                    $dataR=array(
                        'idinventario' => $result->idinventario,
                        'idproducto' => $inventario['idproducto'],
                        'cantidad' => 10, 
                        'fechaReabastecimiento' => date('Y-m-d H:i:s'),
                        'estado' => 'pendiente'
                    );
                    $this->db->insert('reabastecimiento', $dataR);
                    $resultados[] = $this->db->insert_id();
                    }
                }

                
            }
        
        }

        return $resultados;
    }
    public function aprobarreabastecimiento($idreabastecimiento,$data1)
	{
		$this->db->where('idreabastecimiento',$idreabastecimiento);
		return $this->db->update('reabastecimiento',$data1);
	}
    public function eliminarreabastecimiento($idreabastecimiento)
	{
		$this->db->where('idreabastecimiento',$idreabastecimiento);
		$this->db->delete('reabastecimiento');
	}

	public function recuperarreabastecimiento($idreabastecimiento)
	{
		$this->db->select('r.idreabastecimiento, p.producto, r.cantidad,r.fechaReabastecimiento');
		$this->db->from('reabastecimiento r');
        $this->db->join('inventario i', 'r.idinventario = i.idinventario');
        $this->db->join('producto p', 'r.idproducto = p.idproducto');
		$this->db->where('idreabastecimiento',$idreabastecimiento);
		return $this->db->get(); 
	}

	public function modificarreabastecimiento($idreabastecimiento,$data)
	{
		$this->db->where('idreabastecimiento',$idreabastecimiento);
		$this->db->update('reabastecimiento',$data);
	}
  
}