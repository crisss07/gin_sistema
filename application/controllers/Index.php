<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

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
	function __construct() 
    {
        parent::__construct();
        $this->load->model('IndexModel');
    }

	public function index()
	{
		if (isset($_SESSION['nombre'])){
	    	redirect('Inicio'); 
	   	} else { 
		    $this->load->view('login/login');
		}
	}

	public function autenticar()
	{
		$usuario = $this->input->post('usuario');      
        $contrasena = $this->input->post('contrasena');

        $datos = $this->IndexModel->login_admin($usuario,$contrasena);

        if ($datos) {
	        $_SESSION['nombre']=$datos->nombre;
	        $_SESSION['id_usuario']=$datos->id;
	        $_SESSION['rol_usuario']=$datos->rol;
	        $_SESSION['ultimoAcceso']=date("Y-n-j H:i:s");

	        $respuesta = array('estado'=>'ok', 'mensaje'=>'Datos verificados');
        	echo json_encode($respuesta); 
    	} else {
    		$respuesta = array('estado'=>'nok', 'mensaje'=>'Vuelva a intentarlo');
        	echo json_encode($respuesta); 
    	}
	}

	function cerrar_session()
    {   
        session_destroy();
        redirect();
    }
}
