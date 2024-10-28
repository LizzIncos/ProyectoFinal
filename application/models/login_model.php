<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function validar($correo)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('correo',$correo);
		//$this->db->where('password',$password);
		return $this->db->get(); //devuelve el resultado
	}
	public function agregarlogin($login)
	{
		$this->db->insert('usuarios',$login);
		
	}
}
