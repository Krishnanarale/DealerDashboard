<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResourcesController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

    public function getDistricts() {
        $this->load->model('ResourcesModel');
        $result = $this->ResourcesModel->getDistricts($this->input->post('state_id'))->result_array();
        if(!empty($result))
            $response = ['status' => 'success', 'data' => $result];
        else
            $response = ['status' => 'failed', 'data' => ''];
            
        die(json_encode($response));
    }
    
    public function getTehsils() {
        $this->load->model('ResourcesModel');
        $result = $this->ResourcesModel->getTehsils($this->input->post('city_id'))->result_array();
        if(!empty($result))
            $response = ['status' => 'success', 'data' => $result];
        else
            $response = ['status' => 'failed', 'data' => ''];
            
        die(json_encode($response));
    }
}
?>