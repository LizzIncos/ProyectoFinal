<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function demo(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/pedido_vista');			
		$this->load->view('inc/vistaslte/footer');
	}

	public function menu()
	{
		//if($this->session->userdata('tipo')=='admin')
		//{
			$lista=$this->pedido_model->listaproductos();
			$data['infoproductos']=$lista;

			$this->load->view('inc/vistaslte/header');
			$this->load->view('inc/vistaslte/menu');
			$this->load->view('inc/vistaslte/inventario_vista',$data);
			$this->load->view('inc/vistaslte/footer');
					
		//}
		//else
		//{
			//redirect('usuarios/index','refresh');
		//}


		
	}

	public function inscribirbd()
	{
		
		//$data['categoria']=$_POST['categoria'];
		$cantidad['cantidad']=$_POST['cantidad'];
		$data['fechaPedido']=$_POST['fechaPedido'];
        $data['estado']=$_POST['estado'];

		$idproducto=$_POST['idproducto'];

        $this->load->model('pedido_model');
        $this->pedido_model->realizarpedido($idproducto,$cantidad,$data);
		
		redirect('inventario/index','refresh');
	}



	public function deshabilitados()
	{
		$lista=$this->usuario_model->listadeshabilitados();
		$data['alumnos']=$lista;

		$this->load->view('inc/header');
		$this->load->view('inc/menu');
		$this->load->view('deshabilitados',$data);
		$this->load->view('inc/footer');
		$this->load->view('inc/pie');
	}

	public function agregar()
	{
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/registrar_producto_vista');
		$this->load->view('inc/vistaslte/footer');
	}

	public function agregarbd()
	{
		$data['producto']=$_POST['nombre'];
		$data['categoria']=$_POST['categoria'];
		$data['cantidad']=$_POST['cantidad'];
		$data['fecha']=$_POST['fecha'];

		$this->producto_model->agregarproducto($data);
		redirect('producto/menu','refresh');
        
		
	}

	public function eliminarbd()
	{
		$idproducto=$_POST['idproducto'];
		$this->producto_model->eliminarproducto($idproducto);
		redirect('producto/menu','refresh');
	}

	public function modificar()
	{
		$idproducto=$_POST['idproducto'];
		$data['infoproducto']=$this->producto_model->recuperarproducto($idproducto);

		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/modificar_producto_vista',$data);
		$this->load->view('inc/vistaslte/footer');
		
	}

	public function modificarbd()
	{
		$idproducto=$_POST['idproducto'];
		$data['producto']=$_POST['producto'];
		$data['categoria']=$_POST['categoria'];
		$data['cantidad']=$_POST['cantidad'];
		$data['fecha']=$_POST['fecha'];
		

		$this->producto_model->modificarproducto($idproducto,$data);
		redirect('producto/menu','refresh');
	}

	public function deshabilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';

		$this->usuario_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/curso','refresh');
	}

	public function habilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';

		$this->usuario_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/deshabilitados','refresh');
	}

}