<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model {

	public function listaproveedores()
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		$this->db->where('estado','activo');
		return $this->db->get(); //devuelve el resultado
	}

	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}

	public function agregarproveedor($data)
	{
		$this->db->insert('proveedor',$data);
	}

	public function eliminarproveedor($idproveedor)
	{
		$this->db->where('idproveedor',$idproveedor);
		$this->db->delete('proveedor');
	}

	public function recuperarproveedor($idproveedor)
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		$this->db->where('idproveedor',$idproveedor);
		return $this->db->get(); //devuelve el resultado
	}

	public function modificarproveedor($idproveedor,$data)
	{
		$this->db->where('idproveedor',$idproveedor);
		$this->db->update('proveedor',$data);
	}
}
