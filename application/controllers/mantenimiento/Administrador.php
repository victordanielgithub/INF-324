<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Administrador_model");
	}

	public function index()
	{
		$data  = array(
			'Administrador' => $this->Administrador_model->getAdministradors(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/admi/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/admi/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci_adm = $this->input->post("ci_adm");
		$apellido_a = $this->input->post("apellido_a");
		$nombre_a
		 = $this->input->post("nombre_a");
		$grado_a = $this->input->post("grado_a");
		$data  = array(
			
			'ci_adm' => $ci_adm,
			'apellido_a' => $apellido_a,
			'nombre_a' => $nombre_a,
			'grado_a' => $grado_a,
			'estado_a' => "1"
		);

		if ($this->Administrador_model->save($data)) {
			redirect(base_url()."mantenimiento/administrador");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/administrador/add");
		}
	}

	public function edit($ci_adm){
		$data  = array(
			'administrador' => $this->Administrador_model->getAdministrador($ci_adm), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/admi/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$ci_adm = $this->input->post("ci_adm");
		$apellido_a = $this->input->post("apellido_a");
		$nombre_a = $this->input->post("nombre_a");
		$grado_a = $this->input->post("grado_a");
		$estado_a = $this->input->post("estado_a");
		$data  = array(
			'ci_adm' => $ci_adm,
			'apellido_a' => $apellido_a,
			'nombre_a' => $nombre_a,
			'grado_a' => $grado_a,
			'estado_a' => $estado_a
		);

		if ($this->Administrador_model->update($ci_adm,$data)) {
			redirect(base_url()."mantenimiento/administrador");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/administrador/edit/".$ci_adm);
		}
	}

	public function delete($ci_adm){
		$data  = array(
			'estado' => "0", 
		);
		$this->Administrador_model->update($ci_adm,$data);
		echo "mantenimiento/administrador";
	}
}