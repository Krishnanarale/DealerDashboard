<?php defined('BASEPATH') or exit('No direct script access allowed');
class DealersController extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->isLoggedIn();
		$this->load->model('DealerModel');
    }

    public function index()
    {
        $this->renderTemplate('dealers');
	}
	
	public function dealerCount() {
		$result = $this->DealerModel->getDealers()->result_array();
		if (!empty($result))
            $response = ['status' => 'success', 'data' => count($result)];
        else
            $response = ['status' => 'failed', 'data' => ''];

        die(json_encode($response));
	}

    public function getDealers()
    {
        $result = $this->DealerModel->getDealers()->result_array();
        if (!empty($result))
            $response = ['status' => 'success', 'data' => $result];
        else
            $response = ['status' => 'failed', 'data' => ''];

        die(json_encode($response));
    }

    public function editDealer($id = null)
    {
        $this->renderTemplate('editDealer', ['id' => $id]);
    }

    public function getDealer()
    {
        $result = $this->DealerModel->getDealers($this->input->post('id'))->result_array();
        if (!empty($result))
            $response = ['status' => 'success', 'data' => $result];
        else
            $response = ['status' => 'failed', 'data' => ''];

        die(json_encode($response));
    }

    public function updateDealer() {
        $response = '';
		$dealer = $this->input->post();
		if(is_uploaded_file($_FILES['signature']['tmp_name'])) {
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
			$config['max_size']      = 500;
			$config['max_width']     = 2048;
			$config['max_height']    = 2048;
			$config['encrypt_name']    = true;
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('signature')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$signature = $this->DealerModel->getDealers($this->input->post('id'))->result_array();
				unlink('./uploads/'.$signature[0]['signature']); 
				$data = array('upload_data' => $this->upload->data());
				$dealer['signature'] = $data['upload_data']['file_name'];
			}
		} 
		if(is_uploaded_file($_FILES['adhar']['tmp_name'])) {
			$config1['upload_path']   = './uploads/';
			$config1['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg|pdf';
			$config1['max_size']      = 1000;
			$config1['max_width']     = 2048;
			$config1['max_height']    = 2048;
			$config1['encrypt_name']    = true;
			$this->load->library('upload', $config1);
	
			if (!$this->upload->do_upload('adhar')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$adhar = $this->DealerModel->getDealers($this->input->post('id'))->result_array();
				unlink('./uploads/'.$adhar[0]['adhar']);
				$data = array('upload_data' => $this->upload->data());
				$dealer['adhar'] = $data['upload_data']['file_name'];
			}
		} 
		if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
			$config2['upload_path']   = './uploads/';
			$config2['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
			$config2['max_size']      = 500;
			$config2['max_width']     = 2048;
			$config2['max_height']    = 2048;
			$config2['encrypt_name']    = true;
			$this->load->library('upload', $config2);
	
			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$photo = $this->DealerModel->getDealers($this->input->post('id'))->result_array();
				unlink('./uploads/'.$photo[0]['photo']);
				$data = array('upload_data' => $this->upload->data());
				$dealer['photo'] = $data['upload_data']['file_name'];
			}
		}
		$this->load->model('DealerModel');
		$result = $this->DealerModel->updateDealer($dealer);
		if(!empty($result)) {
			$response = ['status' => 'success', 'errors'=> '', 'data' => '1'];
		}
		die(json_encode($response));
	}
	
	public function deleteDealer() {
		$dealer = $this->DealerModel->getDealers($this->input->post('id'))->result_array();
		unlink('./uploads/'.$dealer[0]['photo']);
		unlink('./uploads/'.$dealer[0]['signature']);
		unlink('./uploads/'.$dealer[0]['adhar']);
		$result = $this->DealerModel->deleteDealer($this->input->post('id'));
		if(!empty($result)) {
			$response = ['status' => 'success', 'errors'=> '', 'data' => '1'];
		}
		die(json_encode($response));
	}

	public function dealerApplicationPdf($id = null) {
		$result = $this->DealerModel->getDealers($id, 1)->result_array();
		$this->load->view('backend/dealerPdf',['data' => $result[0]]);
	}
}
