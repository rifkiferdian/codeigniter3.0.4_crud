<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('crud_model');
	}

	public function index() {
		$this->load->view('crud');
	}

	public function jax_add(){
		$data = array(
				'firstName' => $this->input->post('first'),
				'lastName' => $this->input->post('last'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
		);
		$insert = $this->crud_model->add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$id = $this->input->post('id');
		$data = array(
				'firstName' => $this->input->post('first'),
				'lastName' => $this->input->post('last'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
		);

		$this->crud_model->edit($id, $data);
		echo json_encode(array("status" => TRUE));
	}

	public function data_list(){
		$data = $this->crud_model->get_list();		
		echo json_encode($data);
	}

	public function jax_del(){
		$id = $_GET['id'];
		$data = $this->crud_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}

	public function jax_edit(){
		$id = $_GET['id'];
		$dta = $this->crud_model->data_id($id);
		echo json_encode($dta);
	}


}
