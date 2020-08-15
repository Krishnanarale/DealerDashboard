<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function addDealer()
	{
		$response = '';
		$dealer = $this->input->post();
		unset($dealer['optradio']);
		$dealer['created_at'] = date("Y-m-d");
		if(is_uploaded_file($_FILES['signature']['tmp_name'])) {
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
			$config['max_size']      = 900;
			$config['max_width']     = 2048;
			$config['max_height']    = 2048;
			$config['encrypt_name']    = true;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('signature')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$data = array('upload_data' => $this->upload->data());
				$dealer['signature'] = $data['upload_data']['file_name'];
			}
		} 
	if(is_uploaded_file($_FILES['adhar']['tmp_name'])) {
			$config1['upload_path']   = './uploads/';
			$config1['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg|pdf';
			$config1['max_size']      = 900;
			$config1['max_width']     = 2048;
			$config1['max_height']    = 2048;
			$config1['encrypt_name']    = true;
			$this->load->library('upload', $config1);
	
			if (!$this->upload->do_upload('adhar')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$data = array('upload_data' => $this->upload->data());
				$dealer['adhar'] = $data['upload_data']['file_name'];
			}
		} 
		
		
		if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
			$config2['upload_path']   = './uploads/';
			$config2['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
			$config2['max_size']      = 900;
			$config2['max_width']     = 2048;
			$config2['max_height']    = 2048;
			$config2['encrypt_name']    = true;
			$this->load->library('upload', $config2);
	
			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
				$response = ['status' => 'failed', 'errors'=> $error, 'data' => ''];
			} else {
				$data = array('upload_data' => $this->upload->data());
				$dealer['photo'] = $data['upload_data']['file_name'];
			}
		}
		
	
		$this->load->model('DealerModel');
		$result = $this->DealerModel->addDealer($dealer);
		if(!empty($result)) {
		    $this->sendMail($dealer['email']);
			$response = ['status' => 'success', 'errors'=> '', 'data' => '1'];
		}
		die(json_encode($response));
	}
	
	protected function sendMail($email) {
	    $to = $email;
        $subject = "Oxycool.in";
        $txt = "We have received your dealership application, Thank you for your interest in business with us.  We will get back to you soon";
        $headers = "From: customercare@oxycool.com" . "\r\n" .
        "CC: krishna.nucleosys@gmail.com";
        
        mail($to,$subject,$txt,$headers);
	}
}
?>
