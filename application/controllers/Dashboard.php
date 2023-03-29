<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		 $this->load->model('tickets_model');
		 $this->load->model('users_model');
		 $this->load->model('status_model');
	 }

	 public function index()
	{
		$this->load->model('tickets_model');
		$controller = 'dashboard';
		$data['tickets'] = $this->tickets_model->index($controller);
		$data['users'] = $this->users_model->index();
		$data['status'] = $this->status_model->index();
		$data['title'] = 'Dashboard - Sistema Chamados';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
