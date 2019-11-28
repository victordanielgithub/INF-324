<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Director_model");
	}

	public function index()
	{
		$data  = array(
			'director' => $this->Director_model->getDirectors(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/director/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/director/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci_direc = $this->input->post("ci_direc");
		$apellido_d = $this->input->post("apellido_d");
		$nombre_d = $this->input->post("nombre_d");
		$grado_d = $this->input->post("grado_d");
		$data  = array(
			'ci_direc' => $ci_direc,
			'apellido_d' => $apellido_d,
			'nombre_d' => $nombre_d,
			'grado_d' => $grado_d,
			'estado_d' => "1"
		);

		if ($this->Director_model->save($data)) {
			redirect(base_url()."mantenimiento/director");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/director/add");
		}
	}

	public function edit($ci_direc){
		$data  = array(
			'director' => $this->Director_model->getDirector($ci_direc), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/director/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$ci_direc = $this->input->post("ci_direc");
		$apellido_d = $this->input->post("apellido_d");
		$nombre_d = $this->input->post("nombre_d");
		$grado_d = $this->input->post("grado_d");
		$estado_d = $this->input->post("estado_d");
		$data  = array(
			'ci_direc' => $ci_direc,
			'apellido_d' => $apellido_d,
			'nombre_d' => $nombre_d,
			'grado_d' => $grado_d,
			'estado_d' => $estado_d
		);

		if ($this->Director_model->update($ci_direc,$data)) {
			redirect(base_url()."mantenimiento/director");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/director/edit/".$ci_direc);
		}
	}

	public function delete($ci_direc){
		$data  = array(
			'estado' => "0", 
		);
		$this->Director_model->update($ci_direc,$data);
		echo "mantenimiento/director";
	}
}