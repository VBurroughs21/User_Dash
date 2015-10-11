<?php

class Message extends CI_Model {

	function create_message($message, $id)
	{
	   		$query = "INSERT INTO messages(content, created_at, profile_id, author_id)
	   					VALUES(?,NOW(),?,?)";
	   		$values = array($message, $id, $this->session->userdata('current_id'));

	   		return $this->db->query($query, $values);
	}
	function show($id)
	{

		$query = "SELECT users.first_name, users.last_name, users.id, DATE_FORMAT(messages.created_at, '%M %e %Y') AS time, messages.id, messages.content, 
						messages.profile_id, messages.author_id 
					FROM users
					LEFT JOIN messages
					ON users.id = messages.author_id
					WHERE messages.profile_id = ?
					ORDER BY messages.created_at DESC";
		return $this->db->query($query, $id)->result_array();
	}
}