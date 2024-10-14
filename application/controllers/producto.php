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

		

        $capturedImage = $this->input->post('capturedImage');

    	if ($capturedImage) {
        	$url = 'http://127.0.0.1:5000/predict'; 
        	$response = $this->call_api($url, $capturedImage);

        // Procesar la respuesta de la API
        	if (isset($response['prod_name'])) {
            	$data['nombre'] = $response['prod_name']; 
            	$data['categoria'] = $response['category']; 
				
		
        	}
			else{
				$data['error'] = 'No se pudo obtener información del producto.';
            	$this->load->view('producto/registrar', $data);
            	return;
			}
    	}

    	// Cargar la vista con los datos para mostrar al usuario
    	$this->load->view('producto/registrar', $data);

		$this->producto_model->agregarproducto($data);
		redirect('producto/menu','refresh');
		
	}
	private function call_api($url, $image_data) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['image' => $image_data]));
	
		$response = curl_exec($ch);
		curl_close($ch);
	
		return json_decode($response, true);
	}


}