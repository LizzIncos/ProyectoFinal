<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model {

	public function listaproductos()
	{
		$this->db->select('idproducto,producto');
		$this->db->from('producto');
		//$this->db->where('estado','activo');
		return $this->db->get()-> result_array(); //devuelve el resultado
	}


    public function realizarpedido($idproducto,$cantidad,$data)
	{
		$this->db->trans_start();

        $this->load->model('inventario_model');
        $inventarioDisponible = $this->inventario_model->obtenerstock($idproducto);

           
        if($inventarioDisponible && $inventarioDisponible->inventarioDisponible>=$cantidad['cantidad']) {

            $this->crearpedido($idproducto,$cantidad,$data);

            $nuevostock = $inventarioDisponible ->inventarioDisponible - $cantidad['cantidad'];
            $this->inventario_model->actualizarstock($idproducto,$nuevostock);


            $mensaje = "pedido aceptado";

        }
        else{
            $mensaje = "pedido rechazado";
        }
    		
		$this->db->trans_complete();

		if($this->db->trans_status()===FALSE) //triple igualdad
		{
			$mensaje ="error al procesar el pedido";
		}
        return $mensaje;

	}

    public function crearpedido($idproducto,$cantidad,$data){
        $data2['idproducto']=$idproducto;
        $data2['cantidad']=$cantidad['cantidad'];
        $data2['fechaPedido']=$data['fechaPedido'];
        $data2['estado']=$data['estado'];
        $this->db->insert('pedido',$data2);

        $this->db->where('idproducto',$idproducto);
		$this->db->set('pedido', 'pedido +'.$cantidad['cantidad'],FALSE);
        $this->db->update('inventario');
    }

    public function eliminarpedido($idproducto)
	{
		$this->db->where('idproducto',$idproducto);
		$this->db->delete('pedido');
	}

	public function modificarpedido($idproducto,$data)
	{
		$this->db->where('idproducto',$idproducto);
		$this->db->update('pedido',$data);
	}

    public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}
	

	
}
