<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_list()
	{
		$data = $this->db->get('persons')->result_array();
		foreach ($data as $key => $value) {
			$array['data'][] = array(
				'firstName' => $value['firstName'] , 
				'lastName' => $value['lastName'] , 
				'gender' => $value['gender'] , 
				'address' => $value['address'] , 
				'dob' => $value['dob'],
				'action' => "<a class=\"btn btn-sm btn-primary\" href=\"#\" onclick=\" edit_orang('".$value['id']."') \" title=\"Edit\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>

					<a class=\"btn btn-sm btn-danger\" href=\"#\" onclick=\" delete_orang('".$value['id']."') \" title=\"Delete\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
				"
			);
		};

		return $array;
	}
	
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('persons');
	}

	public function add($data)
	{
		$this->db->insert('persons', $data);
		return $this->db->insert_id();
	}

	public function edit($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('persons', $data);
	}

	public function data_id($id){
		$this->db->from('persons');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	

}
