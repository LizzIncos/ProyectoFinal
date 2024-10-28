<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	public function demo(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/proveedor_vista');			
		$this->load->view('inc/vistaslte/footer');
	}

	public function menu()
	{
		//if($this->session->userdata('tipo')=='admin')
		//{
			$lista=$this->proveedor_model->listaproveedores();
			$data['proveedores']=$lista;

			$this->load->view('inc/vistaslte/header');
			$this->load->view('inc/vistaslte/menu');
			$this->load->view('inc/vistaslte/proveedor_vista',$data);
			$this->load->view('inc/vistaslte/footer');
					
		//}
		//else
		//{
			//redirect('usuarios/index','refresh');
		//}


		
	}

	public function inscribirbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['direccion']=$_POST['direccion'];
		$data['encargado']=$_POST['encargado'];
		$data['contacto']=$_POST['contacto'];
		$data['estado']=$_POST['estado'];
		

		$this->proveedor_model->inscribirproveedor($data);
		redirect('proveedor/index','refresh');
	}

	public function deshabilitados()
	{
		$lista=$this->proveedor_model->listadeshabilitados();
		$data['proveedor']=$lista;

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
		$this->load->view('inc/vistaslte/registrar_proveedor_vista');
		$this->load->view('inc/vistaslte/footer');
	}

	public function agregarbd()
	{
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['encargado']=strtoupper($_POST['encargado']);
		$data['contacto']=$_POST['contacto'];
		$data['estado']=strtoupper($_POST['estado']);

		$this->proveedor_model->agregarproveedor($data);
		redirect('proveedor/menu','refresh');
		
	}

	public function eliminarbd()
	{
		$idproveedor=$_POST['idproveedor'];
		$this->proveedor_model->eliminarproveedor($idproveedor);
		redirect('proveedor/menu','refresh');
	}

	public function modificar()
	{
		$idproveedor=$_POST['idproveedor'];
		$data['infoproveedor']=$this->proveedor_model->recuperarproveedor($idproveedor);

		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/modificar_proveedor_vista',$data);
		$this->load->view('inc/vistaslte/footer');
		
	}

	public function modificarbd()
	{
		$idproveedor=$_POST['idproveedor'];
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['direccion']=strtoupper($_POST['direccion']);
		$data['encargado']=strtoupper($_POST['encargado']);
		$data['contacto']=$_POST['contacto'];
		$data['estado']=strtoupper($_POST['estado']);
		

		$this->proveedor_model->modificarproveedor($idproveedor,$data);
		redirect('proveedor/menu','refresh');
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
	public function listapdf()
	{
		//if($this->session->userdata('tipo')=='4')
		//{ 
			$lista=$this->proveedor_model->listaproveedores();
			$lista=$lista->result();

			$this->pdf=new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Lista de proveedores");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'LISTA DE PROVEEDORES',0,1,'C',1);

			$this->pdf->Ln(10);

			$this->pdf->SetFont('Arial', 'B', 10);
        	$this->pdf->Cell(7, 10, 'No.', 1, 0, 'C', 1);
        	$this->pdf->Cell(50, 10, 'Nombre', 1, 0, 'C', 1);
			$this->pdf->Cell(40, 10, 'Direccion', 1, 0, 'C', 1);
			$this->pdf->Cell(30, 10, 'Encargado', 1, 0, 'C', 1);
			$this->pdf->Cell(20, 10, 'Contacto', 1, 0, 'C', 1);
			$this->pdf->Cell(20, 10, 'Estado', 1, 1, 'C', 1);

			$this->pdf->SetFont('Arial','',9);
			$num=1;
			foreach ($lista as $row) {
				$nombre=$row->nombre;
				$direccion=$row->direccion;
				$encargado=$row->encargado;
				$contacto=$row->contacto;
				$estado=$row->estado;
				$this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$nombre,'TBLR',0,'L',0);
				$this->pdf->Cell(40,5,$direccion,'TBLR',0,'L',0);
				$this->pdf->Cell(30,5,$encargado,'TBLR',0,'L',0);
				$this->pdf->Cell(20,5,$contacto,'TBLR',0,'L',0);
				$this->pdf->Cell(20,5,$estado,'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$num++;
			}

			$this->pdf->Output("listaproveedores.pdf","I");

		//}
		//else
		//{
			//redirect('usuarios/panel','refresh');
		//}
	}

}
