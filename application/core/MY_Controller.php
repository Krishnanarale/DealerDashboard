<?php defined('BASEPATH') or exit('No direct script access allowed');
    class MY_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        public function renderTemplate($page = null, $data = null) {
            $this->load->view('backend/includes/header', $data);
            $this->load->view('backend/includes/sidebar', $data);
            $this->load->view('backend/includes/topbar', $data);
            $this->load->view('backend/'.$page, $data);
            $this->load->view('backend/includes/footer', $data);
        }

        public function isLoggedIn() {
            if(!$this->session->userdata('user')['logged_in']) {
                redirect(base_url().'admin');
            }
        }
    }
?>