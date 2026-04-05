<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {
    // Login to Dashboard for both admin and officers
    public function login(){
		$this->form_validation->set_rules('officer_email', 'E-mail', 'required|trim|valid_email');
    	$this->form_validation->set_rules('officer_password', 'Password', 'required|trim|min_length[6]');
		if ($this->form_validation->run()) {
			$postData = $this->input->post();
            $query = $this->loginModel->login($postData);
            if ($query) {
                redirect('dashboardController');
            }
            else {
                $this->session->set_flashdata('invalidUser', 'User email or Password is invalid, Please try again');
                redirect('dashboardController');
            }
        }
        else{
            $this->load->view('loginView');
        }
    }

    // Logout
    public function logoutUser(){
        $this->loginModel->logout();
    }


}