<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function demo(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');	
        $this->load->view('inc/vistaslte/usuario_vista');	
		$this->load->view('inc/vistaslte/footer');
	}

	public function index()
	{
        
		if($this->session->userdata('tipo')=='admin')
		{ 
			$lista=$this->usuario_model->listausuarios();
			$data['personas']=$lista;
			
			$this->load->view('inc/vistaslte/header');
            $this->load->view('inc/vistaslte/menu');
			$this->load->view('inc/vistaslte/usuario_vista',$data);
			$this->load->view('inc/vistaslte/footer');
		}
		else
		{
			redirect('login/panel','refresh');
		}
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

		$this->usuario_model->inscribirusuario($data);
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

	public function agregar()
	{
		
		$this->load->view('inc/vistaslte/registrarse');
		
	}


	public function agregarbd()
	{
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['primerApellido']=strtoupper($_POST['primerApellido']);
		$data['segundoApellido']=strtoupper($_POST['segundoApellido']);
        $data['carnet']=$_POST['carnet'];
        $data['telefono']=$_POST['telefono'];
        $data['rol']=$_POST['rol'];
        $data['estado']=strtoupper($_POST['estado']);


		$lista=$this->usuario_model->agregarusuario($data);
		redirect('usuario/index','refresh');
	}

	public function eliminarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$this->usuario_model->eliminarusuario($idEstudiante);
		redirect('usuario/index','refresh');
	}

	public function modificar()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['infousuario']=$this->usuario_model->recuperarusuario($idEstudiante);

		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/usuario_vista',$data);
		$this->load->view('inc/vistaslte/footer');
	}

	public function modificarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];		
        $data['segundoApellido']=strtoupper($_POST['segundoApellido']);
        $data['carnet']=$_POST['carnet'];
        $data['telefono']=$_POST['telefono'];
        $data['rol']=$_POST['rol'];
        $data['estado']=strtoupper($_POST['estado']);

		

		$this->usuario_model->modificarusuario($idEstudiante,$data);
		
		redirect('usuario/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';

		$this->usuario_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function deshabilitados()
	{
		$lista=$this->usuario_model->listaestudiantesdeshabilitados();
		$data['estudiantes']=$lista;
		

		$this->load->view('inc/header');
		$this->load->view('listadeshabilitados',$data);
		$this->load->view('inc/footer');
	}

	public function habilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';

		$this->usuario_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/deshabilitados','refresh');
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
