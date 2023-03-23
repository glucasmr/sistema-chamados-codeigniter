<?php

class Chamados_model extends CI_Model {

    public function index(){
        return $this->db->get('tb_chamados')->result_array();
    }
}