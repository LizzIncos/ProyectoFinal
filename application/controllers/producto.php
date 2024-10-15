<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function demo(){
		$this->load->view('inc/vistaslte/header');
		$this->load->view('inc/vistaslte/menu');
		$this->load->view('inc/vistaslte/producto_vista');			
		$this->load->view('inc/vistaslte/footer');
	}

	public function menu()
	{
		//if($this->session->userdata('tipo')=='admin')
		//{
			$lista=$this->producto_model->listaproductos();
			$data['productos']=$lista;

			$this->load->view('inc/vistaslte/header');
			$this->load->view('inc/vistaslte/menu');
			$this->load->view('inc/vistaslte/producto_vista',$data);
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
		$data['categoria']=$_POST['categoria'];
		$data['cantidad']=$_POST['cantidad'];
		$data['fecha']=$_POST['fecha'];
		
		

		$this->producto_model->inscribirproducto($data);
		redirect('producto/index','refresh');
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

	public function agregarbdd()
	{
		$data['producto']='';
		$data['categoria']='';
		
		$data['cantidad']=$_POST['cantidad'];
		$data['fecha']=$_POST['fecha'];

		

         // Obtener datos capturados
    $capturedData = $this->input->post(); // Recibir todos los datos enviados

    // Verificar que los campos esperados están presentes
    if (isset($capturedData['prod_name']) && isset($capturedData['category'])) {
        $data['nombre'] = $capturedData['prod_name'];
        $data['categoria'] = $capturedData['category'];

        // Validar si se encontró información del producto
        if (empty($data['nombre']) || empty($data['categoria'])) {
            $data['error'] = 'No se pudo obtener información del producto.';
            $this->load->view('producto/registrar', $data);
            return;
        }
    } else {
        $data['error'] = 'No se recibieron datos válidos del producto.';
        $this->load->view('producto/registrar', $data);
        return;
    }

    // Registrar el producto en la base de datos
    $this->producto_model->agregarproducto($data);
    
    // Redirigir al menú de productos
    redirect('producto/menu', 'refresh');
		
	}
	public function iniciarCaptura() {
		
		$url = 'http://127.0.0.1:5001/capture'; // URL de tu nueva API
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Procesar la respuesta
        if (isset($data['prod_name']) && isset($data['category'])) {
			$this->session->set_flashdata('captured_image', $data['image']);
			$this->session->set_flashdata('prod_name', $data['prod_name']);
			$this->session->set_flashdata('category', $data['category']);
		} else {
			$this->session->set_flashdata('error', 'No se pudo capturar la imagen.');
		}

        //redirect('producto/agregar', 'refresh');
	}

}