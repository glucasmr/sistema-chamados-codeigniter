<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
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
	public function index()
	{
		$data['title'] = 'Cadastro - Sistema Chamados';
		$this->load->view('pages/signup', $data);
	}

	public function store()
	{
		$this->load->model('users_model');
		$user = array(
			"name" => $_POST['name'],
			"email" => $_POST['email'],
			"password" => md5($_POST['password']),
		);
		if ($this->users_model->getUserByEmail($user['email'])) {
			$msg = 'Este e-mail já está sendo utilizado';
			$this->session->set_flashdata('msg', $msg);
			redirect('signup');
		}
		$this->users_model->store($user);
		redirect('login');
	}
}
