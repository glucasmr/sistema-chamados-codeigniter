<?php

class Status_model extends CI_Model
{

    public function index()
    {
        return $this->db->get('tb_status')->result_array();
        $this->load->model('status_model');
        $data['tickets_status'] = $this->status_model->index();
    }

    public function store($status)
    {
        $this->db->insert('tb_status', $status);
    }

    public function show($id)
    {
        return $this->db->get_where('tb_status', array(
            'id' => $id
        ))->row_array();
    }

    public function update($id, $user)
    {
        $this->db->where("id", $id);
        return $this->db->update('tb_status', $user);
    }

    public function destroy($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('tb_status');
    }
}
