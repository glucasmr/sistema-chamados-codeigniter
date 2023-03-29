<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends CI_Controller
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
		permission();
		$this->load->model('tickets_model');
	}

	public function index()
	{
		$controller = 'tickets';
		$data['tickets'] = $this->tickets_model->index($controller);
		$this->load->model('status_model');
		$data['status'] = $this->status_model->index();
		$data['title'] = 'Chamados - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new()
	{
		$data['title'] = 'Chamados - Sistema Chamados';
		$this->load->model('status_model');
		$data['tickets_status'] = $this->status_model->index();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store()
	{
		$ticket = $_POST;
		$ticket['user_id'] = $_SESSION["logged_user"]['id'];
		if (!$ticket['status_id']) {
			$ticket['status_id'] = '1';
		}

		$format = "%Y-%m-%d";
		$ticket['create_date'] = @mdate($format);
		$ticket['update_date'] = @mdate($format);
		$config["upload_path"] = 'assets\files';
		$config["max_size"] = 2048;
		$config["allowed_types"] = "gif|jpg|jpeg|png";
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = $this->upload->error_msg[0];
			if ($error != 'You did not select a file to upload.') {
				$msg = $this->upload->display_errors();
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('title', $ticket['title']);
				$this->session->set_flashdata('description', $ticket['description']);
				redirect('tickets/new');
			}
		}
		$ticket['userfile'] = $this->upload->file_name;
		$this->tickets_model->store($ticket);
		redirect('dashboard');
	}

	public function edit($id)
	{
		$data['ticket'] = $this->tickets_model->show($id);
		if ($data['ticket']['user_id'] != $_SESSION["logged_user"]['id']) {
			admin_permission();
		}
		$this->load->model('status_model');
		$data['tickets_status'] = $this->status_model->index();
		$data['title'] = 'Editar Chamado - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function show($id)
	{
		$this->load->model('users_model');
		$this->load->model('status_model');
		$data['users'] = $this->users_model->index();
		$data['ticket'] = $this->tickets_model->show($id);
		$data['status'] = $this->status_model->index();
		if ($data['ticket']['user_id'] != $_SESSION["logged_user"]['id']) {
			admin_permission();
		}
		$data['title'] = 'Visualizar Chamado - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/show', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$ticket = $_POST;
		$data['ticket'] = $this->tickets_model->show($id);
		if ($data['ticket']['user_id'] != $_SESSION["logged_user"]['id']) {
			admin_permission();
		}
		$unedited_ticket = $this->tickets_model->show($id);
		if ($unedited_ticket['user_id'] == $_SESSION["logged_user"]['id']) {
			$ticket = $_POST;
		} else {
			$ticket['status_id'] = $_POST['status_id'];
		}
		$format = "%Y-%m-%d";
		$ticket['update_date'] = @mdate($format);
		$unedited_ticket = $this->tickets_model->show($id);
		$config["upload_path"] = 'assets\files';
		$config["max_size"] = 2048;
		$config["allowed_types"] = "gif|jpg|jpeg|png";
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$error = $this->upload->error_msg[0];
			if ($error != 'You did not select a file to upload.') {
				$msg = $this->upload->display_errors();
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('title', $ticket['title']);
				$this->session->set_flashdata('description', $ticket['description']);
				redirect('tickets/edit/' . $id);
			} else {
				$ticket['userfile'] = $unedited_ticket['userfile'];
				$this->tickets_model->update($id, $ticket);
				redirect('dashboard');
			}
		}
		$ticket['userfile'] = $this->upload->file_name;
		unlink('application/assets/files/' . $unedited_ticket['userfile']);
		$this->tickets_model->update($id, $ticket);
		redirect('dashboard');
	}

	public function delete($id)
	{
		$unedited_ticket = $this->tickets_model->show($id);
		if ($unedited_ticket['user_id'] != $_SESSION["logged_user"]['id']) {
			admin_permission();
		}
		if ($_SESSION["logged_user"]['id'] != $unedited_ticket['user_id']) {
			$msg = 'Não é possível excluir chamados de outros usuários.';
			$this->session->set_flashdata('msg', $msg);
			redirect('dashboard');
		}
		unlink('application/assets/files/' . $unedited_ticket['userfile']);
		$this->tickets_model->destroy($id);
		redirect('tickets');
	}
}
