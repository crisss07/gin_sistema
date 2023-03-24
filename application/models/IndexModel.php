<?php
class IndexModel extends CI_Model{

    function __construct()
    {
        parent::__construct(); // llama al constructor
    }

    public function login_admin($usuario, $contrasena)
	{
	 	$password = hash('sha256', $contrasena);
	 	$this->db->where('estado', 1);
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasena', $password);				
		$resultado = $this->db->get('usuarios');
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
	}

}

?>
