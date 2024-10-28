<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/dashboard_vista');			
		$this->load->view('inc/vistaslte/footer');
	}

	

	public function proveedores() {
            // Datos de ejemplo
           
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
