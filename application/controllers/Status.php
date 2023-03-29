<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		admin_permission();
		$this->load->model('status_model');
	}

	public function index()
	{
		$data['tickets_status'] = $this->status_model->index();
		$data['title'] = 'status - Sistema Chamados';
		$this->load->model('tickets_model');
		$data['all_tickets'] = $this->tickets_model->index('dashboard');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/status', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new()
	{
		$data['title'] = 'Status - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-status', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store()
	{
		$status = $_POST;
		$this->status_model->store($status);
		redirect('status');
	}

	public function edit($id)
	{
		$data['status'] = $this->status_model->show($id);
		$data['title'] = 'Editar Status - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-status', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function show($id)
	{
		$this->load->model('users_model');
		$data['users'] = $this->users_model->index();
		$data['ticket'] = $this->tickets_model->show($id);
		$data['title'] = 'Visualizar Chamado - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/show', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$status = $_POST;
		$this->load->model('status_model');
		$this->status_model->update($id, $status);
		redirect('status');
	}

	public function delete($id)
	{
		$this->load->model('tickets_model');
		$data['tickets'] = $this->tickets_model->index('dashboard');
		foreach ($data['tickets'] as $ticket) {
			if ($ticket['status_id'] == $id) {
				$msg = 'Não é possível excluir pois existem chamados com este Status.';
				$this->session->set_flashdata('msg', $msg);
				redirect('status');
			}
		}
		$this->status_model->destroy($id);
		redirect('status');
	}
}
