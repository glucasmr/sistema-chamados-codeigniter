<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
		$this->load->model('users_model');
	}

	public function index()
	{
		admin_permission();
		$this->load->model('users_model');
		$this->load->model('tickets_model');
		$data['users'] = $this->users_model->index();
		$controller = 'dashboard';
		$data['all_tickets'] = $this->tickets_model->index($controller);
		$data['title'] = 'Usuários - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/users', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function edit($id)
	{
		$this->load->model('users_model');
		$data['user'] = $this->users_model->show($id);
		$data['title'] = 'Editar Usuário - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-users', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$unedited_user = $this->users_model->show($id);
		if ($unedited_user['id'] == $_SESSION["logged_user"]['id']) {
			$user = $_POST;
		} else {
			$user['is_admin'] = $_POST['is_admin'];
		}
		$this->load->model('users_model');
		$this->users_model->update($id, $user);
		$msg = 'Dados editados com sucesso.';
		$this->session->set_flashdata('msgSucess', $msg);
		redirect('users/profile');
	}

	public function delete($id)
	{
		admin_permission();
		$this->load->model('tickets_model');
		$data['tickets'] = $this->tickets_model->index('dashboard');
		foreach ($data['tickets'] as $ticket) {
			if ($ticket['user_id'] == $id) {
				$msg = 'Não é possível excluir pois existem chamados abertos deste usuário.';
				$this->session->set_flashdata('msg', $msg);
				redirect('users');
			}
		}
		$this->users_model->destroy($id);
		redirect('users');
	}

	public function profile()
	{
		$this->load->model('users_model');
		$data['user'] = $this->users_model->show($_SESSION["logged_user"]['id']);
		$data['title'] = 'Seu perfil - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/profile', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function editLogin($id)
	{
		$this->load->model('users_model');
		$data['user'] = $this->users_model->show($id);
		$data['title'] = 'Editar Usuário - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-edit-login', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function updateLogin($id)
	{
		if (!identify($id)) {
			admin_permission();
		}
		$this->load->model('users_model');
		$this->load->model('login_model');
		$data['user'] = $this->users_model->show($id);
		$email = $data['user']['email'];
		$password = md5($_POST['password']);
		$user = $this->login_model->store($email, $password);
		if ($user) {
			if ($_POST['newPassword'] != $_POST['confirmPassword']) {
				$msgFailure = 'Nova senha e confirmação são diferentes.';
				$this->session->set_flashdata('msgFailure', $msgFailure);
				redirect('users/editLogin/'.$id);
			} else if ($_POST['newPassword'] != '') {
				$user['password'] = md5($_POST['newPassword']);;
			}
			$user['email'] = $_POST['email'];
			$this->load->model('users_model');
			$this->users_model->update($id, $user);
			$msgSuccess = 'Dados editados com sucesso.';
			$this->session->set_flashdata('msg', $msgSuccess);
			redirect('users/profile');
		} else {
			$msgFailure = 'Senha incorreta.';
			$this->session->set_flashdata('msgFailure', $msgFailure);
			redirect('users/editLogin/'.$id);
		}
	}
}
