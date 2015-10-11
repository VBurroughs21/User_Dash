<?php

class Comment extends CI_Model {

	function create_comment($comment, $message_id)
	{
	   		$query = "INSERT INTO comments(content, created_at, user_id, message_id)
	   					VALUES(?,NOW(),?,?)";
	   		$values = array($comment, $this->session->userdata('current_id'), $message_id);

	   		return $this->db->query($query, $values);
	}
	function show($message_id)
	{
			$query = "SELECT users.first_name, users.last_name, users.id, DATE_FORMAT(comments.created_at, '%M %e %Y') AS time, comments.id, comments.content, comments.user_id, comments.message_id
					FROM users
					LEFT JOIN comments
					ON users.id = comments.user_id
					ORDER BY comments.created_at ASC";
			return $this->db->query($query)->result_array();


	}
}