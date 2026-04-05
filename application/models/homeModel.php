<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeModel extends CI_Model{
    // Retrieve all Complaints
    public function getcomplaints(){
        return $this->db->get('complaints')->result();
    }

    // Add New Complaints
    public function addComplaints($data){
        $data['complain_id'] = mt_rand(1111, 9999);
        $data['complain_added_on'] = date('Y-m-d');
        $data['complain_status'] = 0;
        
        $this->db->insert('complaints', $data);

        if ($this->db->affected_rows() > 0) {
            return $data['complain_id'];
        } else {
            return false;
        }
    }

    // Remove complaints
    public function remove_Complaints($complaints_id){
        $complaintsData = $this->db->where('complaints_id', $complaints_id)->delete('complaints');
        if ($complaintsData) {
            return true;
        }
        else {
            return false;
        }
    }

    // Retrieve user search Complaint status
    public function searchComplaints($complaintID) {
        $query = $this->db->where('complain_id', $complaintID['complain_id'])
                        ->get('assigned')
                        ->row();
        if ($query) {
            return $query;
        } else {
            return null;
        }
    }
}
?>