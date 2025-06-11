<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bed extends CI_Controller {

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
	public function create()
	{
		$data['title'] = 'Bed create';
		$data['content'] = $this->load->view('bed/create', [], true);
    	$this->load->view('layouts/main', $data);
	}

	public function save_bed()
	{
		$data = array(
			'date_of_bed' => date('Y-m-d', strtotime($this->input->post('date_of_bed'))),
			'no_of_beds' => $this->input->post('no_of_beds'),
			'description' => $this->input->post('description'),
			'created_at' => date('Y-m-d H:i:s'),
		);

		$create = $this->db->insert('beds', $data);
		if($create) {
			$this->session->set_flashdata('success', 'Bed created successfully.');
			redirect('bed/create');
		} else {
			$this->session->set_flashdata('error', 'Failed to create bed. Please try again.');
			redirect('bed/create');
		}
	}

	public function list()
	{
		$data['title'] = 'Bed create';

		$this->db->select('*');
		$this->db->from('beds');
		$this->db->order_by('date_of_bed', 'desc');
		$this->db->order_by('id', 'desc');
		$data['beds'] = $this->db->get()->result_array();

		$data['content'] = $this->load->view('bed/list', $data, true);
    	$this->load->view('layouts/main', $data);
	}

}
