<?php
class Employee_model extends CI_Model {

    // Insert employee data
    public function insert($data) {
        return $this->db->insert('emp_details', $data);
    }

    // Get all employees
    public function get_all() {
        $query = $this->db->get('emp_details');
        return $query->result();
    }

    // Get single employee by ID
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('emp_details');
        return $query->row();
    }

    // Update employee
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('emp_details', $data);
    }

    // Delete employee
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('emp_details');
    }
}
