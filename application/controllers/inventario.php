<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

    public function demo(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');	
        $this->load->view('inc/vistaslte/inventario_vista');	
		$this->load->view('inc/vistaslte/footer');
	}

	public function index()
	{
        
		//if($this->session->userdata('tipo')=='admin')
		//{ 
			//$idproducto=$this->input->get();
		
			$lista=$this->inventario_model->listainventario();
			$data['inventario']=$lista;
			
			$data['infoproductos'] = $this->pedido_model->listaproductos();

			
			
			$this->load->view('inc/vistaslte/header');
            $this->load->view('inc/vistaslte/menu');
			$this->load->view('inc/vistaslte/inventario_vista',$data);
			$this->load->view('inc/vistaslte/footer');
		//}
		//else
		//{
			//redirect('login/panel','refresh');
		//}
	}
	

	public function inscribir()
	{
		if($this->session->userdata('tipo')=='admin')
		{ 
			$data['infocarreras']=$this->carrera_model->listaCarreras();
			
			$this->load->view('inc/header');
			$this->load->view('inscribirform',$data);
			$this->load->view('inc/footer');
		}
		else
		{
			redirect('usuarios/panel','refresh');
		}
	}

	public function inscribirbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerapellido'];
		$data['segundoApellido']=$_POST['segundoapellido'];
        $data['carnet']=$_POST['carnet'];
        $data['telefono']=$_POST['telefono'];
        $data['rol']=$_POST['rol'];
        $data['estado']=$_POST['estado'];
		//$idCarrera=$_POST['idCarrera'];

		$this->inventario_model->inscribirusuario($data);
		redirect('usuario/index','refresh');
	}


	public function guest()
	{
		if($this->session->userdata('tipo')=='guest')
		{ 
			$this->load->view('inc/vistaslte/header');
			$this->load->view('inc/vistaslte/login_vista');
			$this->load->view('inc/vistaslte/footer');
		}
	}

	

	public function listapdf()
	{
		if($this->session->userdata('tipo')=='admin')
		{ 
			$lista=$this->usuario_model->listaestudiantes();
			$lista=$lista->result();

			$this->pdf=new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Lista de estudiantes");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'LISTA DE ESTUDIANTES',0,0,'C',1);

			$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial','',9);
			$num=1;
			foreach ($lista as $row) {
				$nombre=$row->nombre;
				$primerapellido=$row->primerApellido;
				$segundoapellido=$row->segundoApellido;
				$nota=$row->nota;
				$this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$nombre,'TBLR',0,'L',0);
				$this->pdf->Cell(30,5,$primerapellido,'TBLR',0,'L',0);
				$this->pdf->Cell(30,5,$segundoapellido,'TBLR',0,'L',0);
				$this->pdf->Cell(10,5,$nota,'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$num++;
			}

			$this->pdf->Output("listaestudiantes.pdf","I");

		}
		else
		{
			redirect('usuarios/panel','refresh');
		}
	}
}
