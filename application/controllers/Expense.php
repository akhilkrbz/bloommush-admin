<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

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
	public function types()
	{
		$data['title'] = 'Expense Types';

        $query = array(
			'table' => 'expense_types',
			'select' => '*',
			'sort' => ['id' => 'desc'],
            'where' => [
                'status' => 1,
            ],
		);
		$data['list'] = resultArray($query);
		$data['content'] = $this->load->view('expense/types', $data, true);
    	$this->load->view('layouts/main', $data);
	}

    public function list()
	{
		$data['title'] = 'Expenses';

        $query = array(
			'table' => 'expenses',
			'select' => 'expenses.*,expense_types.title ',
			'sort' => ['id' => 'desc'],
            'where' => [
                'status' => 1,
            ],
            'join' => [
                'expense_types' => 'expense_types.id = expenses.type_id',
            ],
		);
		$data['list'] = resultArray($query);

        $typequery = array(
			'table' => 'expense_types',
			'select' => '*',
			'sort' => ['id' => 'desc'],
            'where' => [
                'status' => 1,
            ],
		);
		$data['types'] = resultArray($typequery);


		$data['content'] = $this->load->view('expense/list', $data, true);
    	$this->load->view('layouts/main', $data);
	}

    //save_expense
    public function save_expense()
    {
        $data = array(
            'type_id' => $this->input->post('type_id'),
            'date' => date('Y-m-d', strtotime($this->input->post('date'))),
            'amount' => $this->input->post('amount'),
            'description' => $this->input->post('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id') ?? 0,
        );

        $create = $this->db->insert('expenses', $data);
        if($create) {
            $this->session->set_flashdata('success', 'Expense created successfully.');
            redirect('expense/list');
        } else {
            $this->session->set_flashdata('error', 'Failed to create expense. Please try again.');
            redirect('expense/list');
        }
    }

    //save_expense_type
    public function save_expense_type()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'status' => 1,
        );

        $create = $this->db->insert('expense_types', $data);
        if($create) {
            $this->session->set_flashdata('success', 'Expense type created successfully.');
            redirect('expense/types');
        } else {
            $this->session->set_flashdata('error', 'Failed to create expense type. Please try again.');
            redirect('expense/types');
        }
    }

}