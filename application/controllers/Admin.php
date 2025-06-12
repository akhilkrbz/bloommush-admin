<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function index()
	{

		$data['title'] = 'Home';

		//Total expenses
		$query = array(
			'table' => 'expenses',
			'select' => 'sum(amount) as total_amount',
		);
		$data['list'] = resultArray($query);
		$data['total_amount'] = isset($data['list'][0]['total_amount']) ? $data['list'][0]['total_amount'] : 0;


		//Daily expenses
		$de_query = array(
			'table' => 'expenses',
			'select' => 'sum(amount) as total_amount',
			'where' => array(
				'DATE(date)' => date('Y-m-d')
			)
		);
		$data['daily_expenses'] = resultArray($de_query);
		$data['daily_expense'] = isset($data['daily_expenses'][0]['total_amount']) ? $data['daily_expenses'][0]['total_amount'] : 0;

		//Total Beds
		$bedquery = array(
			'table' => 'beds',
			'select' => 'sum(no_of_beds) as total_beds',
		);
		$data['bedslist'] = resultArray($bedquery);
		$data['total_beds'] = isset($data['bedslist'][0]['total_beds']) ? $data['bedslist'][0]['total_beds'] : 0;


		$data['content'] = $this->load->view('pages/dashboard', $data, true);
    	$this->load->view('layouts/main', $data);
	}
}
