<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model{

    public function login($postData){
        
        $query = $this->db->select('officer_id, officer_name, officer_password')->where(['officer_email' => $postData['officer_email'], 'officer_password' => $postData['officer_password']])->get('officers')->row();
        if ($query) {
            $this->session->set_userdata('officer_id', $query->officer_id);
            $this->session->set_userdata('officer_name', $query->officer_name);
            if ($postData['officer_password'] == $query->officer_password) {
                return true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('officer_id');
        $this->session->unset_userdata('officer_name');
        $this->session->sess_destroy();
        redirect('homeController');
    }
}
?>