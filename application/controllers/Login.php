<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$data['title'] = 'Login - Sistema Chamados';
		$this->load->view('pages/login', $data);
	}

	public function store()
	{
		$this->load->model('login_model');
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$user = $this->login_model->store($email, $password);
		if ($user) {
			$this->session->set_userdata('logged_user', $user);
			if ($user['is_admin']) {
				redirect('dashboard');
			}
			redirect('tickets');
		} else {
			$msg = 'E-mail ou senha incorreto';
			$this->session->set_flashdata('msg', $msg);
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_user');
		redirect('login');
	}
}
