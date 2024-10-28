<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reabastecimiento extends CI_Controller {

    public function index()
	{
        
		//if($this->session->userdata('tipo')=='admin')
		//{ 
		$lista=$this->reabastecimiento_model->listaReabastecimiento();
		$data['reabastecimientos']=$lista;
		
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/reabastecimiento_vista',$data);			
		$this->load->view('inc/vistaslte/footer');
            
		
		
		//}
		//else
		//{
			//redirect('login/panel','refresh');
		//}
	}
    public function aprobarbd()
	{
		$idreabastecimiento=$_POST['idreabastecimiento'];
        $data1 = array(
            'estado'=> 'confirmado'
        );

		$this->reabastecimiento_model->aprobarreabastecimiento($idreabastecimiento,$data1);
		redirect('reabastecimiento/index','refresh');
	}

	public function modificar()
	{
		$idreabastecimiento=$_POST['idreabastecimiento'];
		$data['inforeabastecimiento']=$this->reabastecimiento_model->recuperarreabastecimiento($idreabastecimiento);

		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/modificar_reabastecimiento_vista',$data);
		$this->load->view('inc/vistaslte/footer');
		
	}

	public function modificarbd()
	{
		$idreabastecimiento=$_POST['idreabastecimiento'];
		
		$data['cantidad']=strtoupper($_POST['cantidad']);
		
		$data['fechaReabastecimiento']=strtoupper($_POST['fechaReabastecimiento']);
		

		$this->reabastecimiento_model->modificarreabastecimiento($idreabastecimiento,$data);
		redirect('reabastecimiento/index','refresh');
	}
    public function eliminarbd()
	{
		$idreabastecimiento=$_POST['idreabastecimiento'];
		$this->reabastecimiento_model->eliminarreabastecimiento($idreabastecimiento);
		redirect('reabastecimiento/index','refresh');
	}
	
}