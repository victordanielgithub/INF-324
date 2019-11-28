<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Economo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Economo_model");
	}

	public function index()
	{
		$data  = array(
			'economo' => $this->Economo_model->getEconomos(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/economo/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/economo/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci_eco = $this->input->post("ci_eco");
		$apellido_e = $this->input->post("apellido_e");
		$nombre_e = $this->input->post("nombre_e");
		$grado_e = $this->input->post("grado_e");
		$data  = array(

			'ci_eco' => $ci_eco,
			'apellido_e' => $apellido_e,
			'nombre_e' => $nombre_e,
			'grado_e' => $grado_e,
			'estado_e' => "1"
		);

		if ($this->Economo_model->save($data)) {
			redirect(base_url()."mantenimiento/economo");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/economo/add");
		}
	}

	public function edit($ci_eco){
		$data  = array(
			'economo' => $this->Economo_model->getEconomo($ci_eco), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/economo/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$ci_eco = $this->input->post("ci_eco");
		$apellido_e = $this->input->post("apellido_e");
		$nombre_e = $this->input->post("nombre_e");
		$grado_e = $this->input->post("grado_e");
		$estado_e = $this->input->post("estado_e");
		$data  = array(
			'ci_eco' => $ci_eco,
			'apellido_e' => $apellido_e,
			'nombre_e' => $nombre_e,
			'grado_e' => $grado_e,
			'estado_e' => $estado_e
		);

		if ($this->Economo_model->update($ci_eco,$data)) {
			redirect(base_url()."mantenimiento/economo");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/economo/edit/".$ci_eco);
		}
	}

	public function delete($ci_eco){
		$data  = array(
			'estado' => "0", 
		);
		$this->Economo_model->update($ci_eco,$data);
		echo "mantenimiento/economo";
	}
}