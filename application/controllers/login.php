<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('inc/vistaslte/login_vista');
		
	
				
	}

	public function validarlogin()
	{
		$correo=$_POST['correo'];
		$password=isset($_POST['password']) ? $_POST['password']:'';

		echo $correo;
		echo $password;
		$consulta=$this->login_model->validar($correo);

		echo $consulta->num_rows();

		if($consulta->num_rows()>0)
		{
			echo 'inicio de sesion';
			//usuario valido
			foreach($consulta->result() as $row)
			{

				$this->session->set_userdata('idusuarios',$row->idusuarios);
				$this->session->set_userdata('correo',$row->correo);
				$this->session->set_userdata('rol',$row->rol_idrol);

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
		if($this->session->userdata('correo'))
		{
			if($this->session->userdata('rol')=='4')
			{
				//el usr ya esta logueado
				redirect('dashboard/index','refresh');
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
