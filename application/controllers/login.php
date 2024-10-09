<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('inc/vistaslte/login_vista');
		
	
				
	}

	public function validarusuario()
	{
		$login=$_POST['login'];
		$password=isset($_POST['password']) ? $_POST['password']:'';

		echo $login;
		echo $password;
		$consulta=$this->login_model->validar($login,$password);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);

				redirect('login/panel','refresh');
			}
		}
		else
		{
			//acceso incorrecto - volvemos al login
			redirect('login/index','refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('login'))
		{
			if($this->session->userdata('tipo')=='admin')
			{
				//el usr ya esta logueado
				redirect('usuario/index','refresh');
			}
			else
			{
				redirect('usuario/guest','refresh');
			}
		}
		else
		{
			//usuario no esta logueado
			redirect('login/index','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/index','refresh');
	}

}
