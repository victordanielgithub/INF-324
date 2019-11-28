<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	public function index()
	{
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci = $this->input->post("ci");
		$apellidos = $this->input->post("apellidos");
		$nombres = $this->input->post("nombres");
		$gmail = $this->input->post("gmail");
		$username = $this->input->post("nomusuario");
		$password = $this->input->post("password");
		$grado = $this->input->post("grado");
		$rol = $this->input->post("rol");
		$data  = array(
			'id' => "0",
			'ci_pol' => $ci,
			'apellido' => $apellidos,
			'nombre' => $nombres,
			'email' => $gmail, 			
			'username' => $username,
			'password' => $password,
			'grado' => $grado,
			'rol_id' => $rol,
			'estado' => "1"
		);

		if ($this->Usuarios_model->save($data)) {
			redirect(base_url()."mantenimiento/usuarios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/clientes/add");
		}
	}

	public function edit($id){
		$data  = array(
			'usuario' => $this->Usuarios_model->getUsuario($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$ci = $this->input->post("ci");
		$apellidos = $this->input->post("apellido");
		$nombres = $this->input->post("nombre");
		$gmail = $this->input->post("email");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$grado = $this->input->post("grado");
		$rol = $this->input->post("rol");
		$estado = $this->input->post("estado");
		$data  = array(
			'ci_pol' => $ci,
			'apellido' => $apellidos,
			'nombre' => $nombres,
			'email' => $gmail, 			
			'username' => $username,
			'password' => $password,
			'grado' => $grado,
			'rol_id' => $rol,
			'estado' => $estado
		);

		if ($this->Usuarios_model->update($ci,$data)) {
			redirect(base_url()."mantenimiento/usuarios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/clientes/edit/".$ci_pol);
		}
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Usuarios_model->update($id,$data);
		echo "mantenimiento/usuarios";
	}
}