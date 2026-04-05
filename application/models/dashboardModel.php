<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardModel extends CI_Model{
    // Retrieve all Officers details
    public function getOfficers(){
        return $this->db->where('officer_id !=', 5771)->get('officers')->result();
    }

    // Add New Officer
    public function addOfficer($data){
        $data['officer_id'] = mt_rand(1111, 9999);
        $data['added_on'] = date('Y-m-d');
        
        return $this->db->insert('officers', $data);
    }

    // Remove Officer
    public function remove_officer($officer_id){
        $officerData = $this->db->where('officer_id', $officer_id)->delete('officers');
        if ($officerData) {
            return true;
        }
        else {
            return false;
        }
    }

    // Retrieve all Complaints
    public function getAllComplaints(){
        return $this->db->get('complaints')->result();
    }

    public function getComplaints() {
    $officer_id = $this->session->userdata('officer_id');

    $this->db->select('complaints.*');
    $this->db->from('complaints');
    $this->db->join('assigned', 'assigned.complain_id = complaints.complain_id');
    $this->db->where('assigned.officer_id', $officer_id);
    $this->db->where('assigned.complain_status', 1);

    $query = $this->db->get();

    return $query->result(); // always return (empty array if no data)
}

    // Assign Officer
    public function assign($data){
        $officerData = $this->db->select('officer_name')->where('officer_id', $data['officer_id'])->get('officers')->result();
        $complainData = $this->db->where('complain_id', $data['complain_id'])->update('complaints', ['complain_status' => 1]);
        
        $data['officer_name'] = $officerData[0]->officer_name;
        $data['complain_status'] = $complainData;
        
        return $this->db->insert('assigned', $data);
        
    }

    // Retrieve Resolved Complaints
    public function getAssigned(){
        if($this->session->userdata('officer_id') == 5771){
            return $this->db->where('complain_status', 1)->get('assigned')->result();
        }
        else {
            return $this->db->where(['complain_status' => 1, 'officer_id' => $this->session->userdata('officer_id')])->get('assigned')->result();
        }  
    }

    // Retrieve Resolved Complaints
    public function getResolved(){
        if($this->session->userdata('officer_id') == 5771){
            return $this->db->where('complain_status', 2)->get('assigned')->result();
        }
        else {
            return $this->db->where(['complain_status' => 2, 'officer_id' => $this->session->userdata('officer_id')])->get('assigned')->result();
        }  
    }

    // Done Assign Complaint
    public function complaintDone($data){
        $this->db->where('complain_id', $data['complain_id'])->update('complaints', ['complain_status' => 3]);
        $this->db->where('complain_id', $data['complain_id'])->update('assigned', ['complain_status' => 2]);
        
        
        return $this->db->insert('assigned', $data);
        
    }
}
?>