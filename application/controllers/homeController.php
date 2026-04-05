<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeController extends CI_Controller {
	public function __construct(){
        parent::__construct();
    }

	// Redirect to portal home page
	public function index()
	{
		$this->load->view('portal/homeView');	
	}

	public function complaints(){
		$this->load->view('portal/complaintsView');
	}

	public function addComplaint(){
		$this->form_validation->set_rules('complain_name', 'Name', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('complain_email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('complain_phone', 'Phone Number', 'required|trim|numeric|exact_length[10]');
		$this->form_validation->set_rules('complain_title', 'Complain Title', 'required');
		$this->form_validation->set_rules('complain_descr', 'Description', 'required');
		$this->form_validation->set_rules('complain_addr', 'Address', 'required');
		
		if ($this->form_validation->run()) {
			$postData = $this->input->post();

			if(!empty($_FILES['complain_file']['name'])){
				$config['upload_path']   = FCPATH . 'uploads/';
				$config['allowed_types'] = 'jpg|png|pdf';

				$this->upload->initialize($config);

				$this->upload->do_upload('complain_file');
				$complain_file = $this->upload->data();

				$postData['complain_file'] = $complain_file['file_name'];
			}
			
			$query = $this->homeModel->addComplaints($postData);

			if($query){
				$complaintId = $query;

				// format number
				$mobile = "91" . $postData['complain_phone'];

				// message
				$message = "Your complaint has been registered successfully. Complaint ID: ".$complaintId;

				$fields = [
					"route" => "q", // transactional
					"message" => $message,
					"language" => "english",
					"flash" => 0,
					"numbers" => $mobile,
				];

				$curl = curl_init();

				curl_setopt_array($curl, [
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($fields),
					CURLOPT_HTTPHEADER => [
						"authorization: r5VF1bDXasG3dWNqe0K6OgoJjMkpcPERmv9uyIZtQnUTxlACS4YH74PibNMlreDLBpCqtZ18U5gnmySx",
						"accept: application/json",
						"content-type: application/json"
					],
				]);

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				// DEBUG (very important)
				log_message('error', 'SMS RESPONSE: '.$response);

				if ($err) {
					log_message('error', 'SMS CURL ERROR: '.$err);
				}

				$this->session->set_flashdata('successMsg', 'Complaint Registered Successfully. ID: '.$complaintId);
				redirect('homeController/complaints');
			}
		}
		else{
			echo validation_errors();
			die;
		}
	}

	public function getStatus() {
		$postID = $this->input->post();
		if($postID){
			
			$complain_status['status'] = $this->homeModel->searchComplaints($postID);
			if ($complain_status !== null) {
				$this->load->view('portal/statusView', $complain_status);
			}
		}
		else {
			$this->load->view('portal/statusView');
		}
	}
}