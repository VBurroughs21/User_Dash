<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function create_message($id) 
	{
		$message = $this->input->post('message');
		$this->message->create_message($message, $id);
		redirect(base_url("users/profile/$id")); 

	}

	
}