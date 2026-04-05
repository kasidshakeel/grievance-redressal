<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardController extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('officer_id')){
			$this->load->view('loginView');	
		}

    }

	// Redirect to portal dashboard page
	public function index()
	{
		if ($this->session->userdata('officer_id')){
			$this->load->view('index');	
		}
	}

	// check officers
	public function officers(){
		$getData['officersData'] = $this->dashboardModel->getOfficers();
		$this->load->view('officerView', $getData);
		
	}
	
	// Add officers
	public function insertOfficer(){
		
		$this->form_validation->set_rules('officer_name', 'Name', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('officer_email', 'E-mail', 'required|trim|valid_email');
    	$this->form_validation->set_rules('officer_phone', 'Phone', 'required|trim|numeric|exact_length[10]');
		$this->form_validation->set_rules('officer_password', 'Password', 'required|trim|min_length[6]');
		
		if ($this->form_validation->run()) {
			
			$postData = $this->input->post();
			$query = $this->dashboardModel->addOfficer($postData);
			if ($query) {
				$this->session->set_flashdata('successMsg', 'Officer added Successfully');
				redirect('dashboardController/officers');
			}
			else {
				$this->session->set_flashdata('failMsg', 'Officer Not added Successfully');
				redirect('dashboardController/officers');
			}
		}
		else{
			$getData['officersData'] = $this->officerModel->getOfficers();
			$this->load->view('officerView', $getData);
        }
	}

	// Remove Officers
	public function removeOfficer($officer_id){
		$check = $this->dashboardModel->remove_officer($officer_id);
		if ($check) {
			$this->session->set_flashdata('officer_upd_msg','Officer Removed Successfully');
			redirect('dashboardController/officers');
		}
		else{
			$this->session->set_flashdata('officer_err_msg','Officer not Removed');
			redirect('dashboardController/officers');
		}
	}

	// Check Complaints
	public function complaints(){
		if ($this->session->userdata('officer_id') == 5771) {
			$getData['getAssigned'] = $this->dashboardModel->getAssigned();
			$getData['complaintsData'] = $this->dashboardModel->getAllComplaints();
			$this->load->view('complaintsView', $getData);
		}
		else{
			$getData['getAssigned'] = $this->dashboardModel->getAssigned();
			$getData['complaintsData'] = $this->dashboardModel->getComplaints();
			$this->load->view('complaintsView', $getData);
		}
	}

	// Assign Complaints to officers
	public function assignOfficer(){
		$postData = $this->input->post();
		if(!empty($postData['officer_id'])){
			$check = $this->dashboardModel->assign($postData);
			if ($check) {
				$this->session->set_flashdata('assigned_upd_msg','Complaint Assigned Successfully');
				redirect('dashboardController/complaints');
			}
			else{
				$this->session->set_flashdata('assigned_err_msg','Complaint not Assigned');
				redirect('dashboardController/complaints');
			}
		}
		else{
			$this->session->set_flashdata('assigned_err_msg','Complaint not Assigned, select officer');
			redirect('dashboardController/complaints');
		}
	}

	// Resolved Complaints List
	public function resolved(){
		$getData['resolvedData'] = $this->dashboardModel->getResolved();
		$this->load->view('resolvedView', $getData);
		
	}

	// Complaint Resolved
	public function doneComplaint(){
		$postData = $this->input->post();
		$check = $this->dashboardModel->complaintDone($postData);
		if ($check) {
			$this->session->set_flashdata('assigned_upd_msg','Complaint Assigned Successfully');
			redirect('dashboardController/complaints');
		}
		else{
			$this->session->set_flashdata('assigned_err_msg','Complaint not Assigned');
			redirect('dashboardController/complaints');
		}
	}
}
