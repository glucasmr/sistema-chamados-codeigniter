<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {

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
		$data['tickets'] = $this->tickets_model->index();
		$data['title'] = 'Chamados - Sistema Chamados';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new(){
		$data['title'] = 'Chamados - Sistema Chamados';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		
	}

	public function store(){

		$ticket = $_POST;
		$ticket['user_id']='1'; 
		$ticket['create_date']='2023-23-04'; 
		$ticket['update_date']='2023-23-04'; 
		
		$this->tickets_model->store($ticket);
		redirect('dashboard');		
	}

	public function edit($id) {
		$data['ticket'] = $this->tickets_model->show($id);
		$data['title'] = 'Editar Chamado - Sistema Chamados';
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-tickets', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id){
		$ticket = $_POST;	
		$ticket['user_id']='1'; 
		$ticket['create_date']='2023-23-04'; 
		$ticket['update_date']='2023-23-04'; 
		
		$this->tickets_model->update($id, $ticket);
		redirect('tickets');		
	}

	public function delete($id){
		$this->tickets_model->destroy($id);
		redirect ('tickets');

	}
	
}
