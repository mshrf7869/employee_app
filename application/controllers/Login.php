<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    // Show the login page
    public function index() {
        $this->load->view('login_view');
    }

    // Authenticate user
    public function auth() {
        $user = $this->input->post('user_name');
        $pass = md5($this->input->post('password'));

        // Check login credentials
        $check = $this->Login_model->login($user, $pass);

        if ($check) {
            // If credentials are correct, set session and redirect to employee list
            $this->session->set_userdata('logged_in', true);
            redirect('employee');
        } else {
            // If credentials are incorrect, show an error message
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }

    // Logout user
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
