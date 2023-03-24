<?php

class Chamados_model extends CI_Model {

    public function index(){
        return $this->db->get('tb_chamados')->result_array();
    }

    public function store($chamado){
        $this->db->insert('tb_chamados',$chamado);
    }

    public function show($id){
        return $this->db->get_where('tb_chamados',array(
            'id'=>$id
        ))->row_array();
    }

    public function update($id,$chamado) {
        $this->db->where("id", $id);
        return $this->db->update('tb_chamados',$chamado);
    }

    public function destroy($id) {
        $this->db->where("id", $id);
        return $this->db->delete('tb_chamados');
    }
    
}