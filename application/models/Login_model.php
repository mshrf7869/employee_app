<?php
class Login_model extends CI_Model {
    public function login($user, $pass) {
        $this->db->where('user_name', $user);
        $this->db->where('password', $pass);
        return $this->db->get('login_details')->row();
    }
}
