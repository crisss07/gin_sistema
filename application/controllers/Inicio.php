<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if (isset($_SESSION['nombre'])){
	    	$contenido['contenido'] = 'hola';
			$this->load->view('plantilla/header');
			$this->load->view('plantilla/menu');
			$this->load->view('plantilla/contenido', $contenido);
			$this->load->view('plantilla/footer');
	   	} else { 
		    redirect('Index'); 
		}
	}

	public function consulta()
	{
		$resultado = $this->db->query("SELECT * FROM usuarios WHERE estado = 1")->result();
		var_dump($resultado);
	}
}
