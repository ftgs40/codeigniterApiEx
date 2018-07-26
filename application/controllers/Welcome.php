<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function addTel(){

		// $postdata = '{"tel":"0823141324"}';

		$postdata = file_get_contents("php://input");
		$tel  = json_decode($postdata, true);
		$tel = $tel["tel"];

		$data = array(
			'tel' => $tel,
		);
	
		$this->db->insert('tel', $data);
		$success["status"] = true;

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($success);
	}
}
