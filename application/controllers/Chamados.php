<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chamados extends CI_Controller {

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
		$this->load->model('chamados_model');
	}

	public function index()
	{
		$data['chamados'] = $this->chamados_model->index();
		$data['title'] = 'Chamados - Sistema Chamados';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/chamados', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new(){
		$data['title'] = 'Chamados - Sistema Chamados';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-chamados', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		
	}

	public function store(){

		$chamado = $_POST;
		$chamado['user_id']='1'; 
		$chamado['create_date']='2023-23-04'; 
		$chamado['update_date']='2023-23-04'; 
		
		$this->chamados_model->store($chamado);
		redirect('dashboard');		
	}

	public function edit($id) {
		$data['chamado'] = $this->chamados_model->show($id);
		$data['title'] = 'Editar Chamado - Sistema Chamados';
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-chamados', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id){
		$chamado = $_POST;	
		$chamado['user_id']='1'; 
		$chamado['create_date']='2023-23-04'; 
		$chamado['update_date']='2023-23-04'; 
		
		$this->chamados_model->update($id, $chamado);
		redirect('chamados');		
	}

	public function delete($id){
		$this->chamados_model->destroy($id);
		redirect ('chamados');

	}
	
}
