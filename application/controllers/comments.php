<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function create_comment($id, $message_id) 
	{
		$comment = $this->input->post('comment');
		$this->comment->create_comment($comment, $message_id);
		redirect(base_url("users/profile/$id")); 

	}
}