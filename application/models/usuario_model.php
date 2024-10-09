<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function listausuarios()
	{
		$this->db->select('*'); 
		$this->db->from('personas'); 
		$this->db->where('estado','activo');
		return $this->db->get(); 
	}

	public function agregarusuario($data)
	{
		$this->db->insert('personas',$data);
	}

	public function eliminarusuario($idEstudiante)
	{
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->delete('personas');
	}

	public function recuperarusuario($idEstudiante)
	{
		$this->db->select('*'); 
		$this->db->from('personas'); 
		$this->db->where('idEstudiante',$idEstudiante);
		return $this->db->get(); 
	}

	public function modificarusuario($idEstudiante,$data)
	{
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->update('personas',$data);		
	}

	public function listausuariosdeshabilitados()
	{
		$this->db->select('*'); 
		$this->db->from('usuarios'); 
		$this->db->where('estado','inactivo');
		return $this->db->get(); 
	}
}
