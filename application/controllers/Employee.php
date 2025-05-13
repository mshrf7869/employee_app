<?php
class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('login');
        // }
        $this->load->model('Employee_model');
    }

    // List all employees
    public function index() {
        $data['employees'] = $this->Employee_model->get_all();
        $this->load->view('list_employee', $data);
    }

    // Show add form
    public function add() {
        $this->load->view('add_employee');
    }

    // Handle add form submit
    public function save() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        $picture = '';
        if ($this->upload->do_upload('picture')) {
            $uploadData = $this->upload->data();
            $picture = $uploadData['file_name'];
        }

        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'designation' => $this->input->post('designation'),
            'salary' => $this->input->post('salary'),
            'picture' => $picture
        );

        $this->Employee_model->insert($data);
        redirect('employee');
    }

    // Show edit form
    public function edit($id) {
        $data['employee'] = $this->Employee_model->get_by_id($id);
        $this->load->view('edit_employee', $data);
    }

    // Handle update
    public function update($id) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);

        $picture = $this->input->post('old_picture');
        if ($this->upload->do_upload('picture')) {
            $uploadData = $this->upload->data();
            $picture = $uploadData['file_name'];
        }

        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'designation' => $this->input->post('designation'),
            'salary' => $this->input->post('salary'),
            'picture' => $picture
        );

        $this->Employee_model->update($id, $data);
        redirect('employee');
    }

    // Delete employee
    public function delete($id) {
        $this->Employee_model->delete($id);
        redirect('employee');
    }
}
