<?php

function permission(){
    $ci = get_instance();
    $loggedUser = $ci->session->userdata('logged_user');
    if(!$loggedUser){
        $ci->session->set_flashdata('danger', 'Você precisa estar logado para acessar esta página');
        redirect('login');
    }
    return $loggedUser;
}

function admin_permission() {
    $loggedUser = permission();
    if(!$_SESSION["logged_user"]['is_admin']){
        redirect('tickets');
    }
    return $loggedUser;
}   
function identify($id){
    permission();
    return($_SESSION["logged_user"]['id'] == $id);
}

