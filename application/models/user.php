<?php

class User extends CI_Model {

	function create($user_info)
	{
	   		$query = "INSERT INTO users(first_name, last_name, password, email, user_level, created_at, updated_at) 
	   					VALUES(?,?,?,?,?,NOW(),NOW())";
	   		$values = array($user_info['first_name'], $user_info['last_name'], $user_info['password'], $user_info['email'], $user_info['user_level']);

	   		return $this->db->query($query, $values);
	}

	function show($id)
	{
		$query = "SELECT id, email, first_name, 
	   			last_name, DATE_FORMAT(created_at, '%M %e %Y') AS time, description, user_level 
	   			FROM users 
				WHERE id = ?";
	   		return $this->db->query($query, array($id))->row();
	}

	function get_user($email)
	{
	   		return $this->db->query("SELECT id, email, password, 
	   			first_name, last_name, DATE_FORMAT(created_at, '%M %e %Y') AS time, description, user_level 
	   			FROM users 
				WHERE email = ?", array($email))->row_array();
	}
	function all_users()
	{
	   		return $this->db->query("SELECT id,first_name, 
	   			last_name, email, DATE_FORMAT(created_at, '%M %e %Y') AS time, updated_at, user_level 
	   			FROM users")->result_array();

	}
	function edit_user($id, $edit_info)
	{
	   		$query = "UPDATE users 
	   					SET email=?, first_name=?, last_name=?, 
	   						user_level=?, updated_at=NOW()
	   					WHERE id = ?";
	   		$values = array($edit_info['email'], $edit_info['first_name'], $edit_info['last_name'], $edit_info['user_level'], $id);

	   		return $this->db->query($query, $values);
	}
	function change_pass($id, $password)
	{
		$query = "UPDATE users
					SET password=?, updated_at=NOW()
					WHERE id=?";
		$values = array($password, $id);
		return $this->db->query($query, $values);

	}
	function change_description($description, $id)
	{
		$query = "UPDATE users
					SET description=?
					WHERE id=?";
		$values = array($description, $id);
		return $this->db->query($query, $values);
	}
	function remove($id)
	{
		$query = "DELETE FROM users
					WHERE id=?";
		return $this->db->query($query, $id);
	}
}





















