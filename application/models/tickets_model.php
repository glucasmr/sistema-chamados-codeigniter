<?php

class Tickets_model extends CI_Model
{

    public function index($controller_name)
    {
        if (!$_SESSION["logged_user"]['is_admin'] || $controller_name == 'tickets') {
            $user_id = $_SESSION["logged_user"]['id'];
            $this->db->order_by('id', 'desc');
            return $this->db->get_where('tb_tickets', array(
                'user_id' => $user_id
            ))->result_array();
        }
        $this->db->order_by('id', 'desc');
        return $this->db->get('tb_tickets')->result_array();
    }

    public function store($ticket)
    {
        $this->db->insert('tb_tickets', $ticket);
    }

    public function show($id)
    {
        return $this->db->get_where('tb_tickets', array(
            'id' => $id
        ))->row_array();
    }

    public function update($id, $ticket)
    {
        $this->db->where("id", $id);
        return $this->db->update('tb_tickets', $ticket);
    }

    public function destroy($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('tb_tickets');
    }
}
