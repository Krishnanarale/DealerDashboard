<?php defined('BASEPATH') or exit('No direct script access allowed');
class AuthController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/signin');
    }

    public function signIn()
    {
        $this->load->model('AuthModel');
        $result = $this->AuthModel->getUser($this->input->post('email'))->result_array();
        if (!empty($result) && $result[0]['password'] == $this->input->post('password')) {
            $result[0]['logged_in'] = true;
            $this->session->set_userdata('user', $result[0]);
            $response = ['status' => 'success', 'data' => 'Credentials matched !'];
        } else {
            $response = ['status' => 'failed', 'data' => 'Credentials not matched !'];
        }
        die(json_encode($response));
    }
    
    public function signOut()
    {
        if($this->session->userdata('user')['logged_in']) {
            $this->session->unset_userdata('user');
            redirect(base_url().'admin');
        }
    }
}
