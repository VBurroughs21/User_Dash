<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function signin()
	{
		$this->load->view('signin');
	}
	public function admin_dash()
	{
		$this->session->set_userdata('all_users', $this->user->all_users());
		$this->load->view('admin_dash');
	}
	public function user_dash()
	{
		$this->session->set_userdata('all_users', $this->user->all_users());
		$this->load->view('user_dash');
	} 
	public function edit_profile($id)
	{
		$this->session->set_userdata('user', $this->user->show($id));
		$this->load->view('edit_profile', $this->session->userdata('user'));
	}
	public function edit_user($id)
	{
		$this->session->set_userdata('user', $this->user->show($id));
		$this->load->view('edit_user', $this->session->userdata('user'));
	}  
	public function new_user()
	{
		$this->load->view('new_user');
	}
	public function profile($id)
	{
		
		$this->session->set_userdata('user', $this->user->show($id));
		$this->session->set_userdata('message', $this->message->show($id));
		$this->session->set_userdata('comment', $this->comment->show($id));
		$this->load->view('profile', $this->session->userdata('user'));
		$this->output->enable_profiler();
		
	} 
	
	public function create()
	{
		$email = $this->input->post('email');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$password = md5($this->input->post('password'));
		$con_password = md5($this->input->post('con_password'));

		if ($this->session->userdata('user')) {
			$user_level = 'Normal';
		} else {
			$user_level = 'Admin';
		}

		$user_info = array(
			'email' => $email,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'password' => $password,
			'con_password' => $con_password,
			'user_level' => $user_level
		);

		$this->load->library("form_validation");
		$this->form_validation->set_rules(
			"email", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules(
			"first_name", "First Name", "trim|required");
		$this->form_validation->set_rules(
			"last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules(
			"password", "Password", "trim|required");
		$this->form_validation->set_rules(
			"con_password", "Confirm Password", "trim|required|matches[password]");
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('reg_error', $this->view_data['errors']);
			if ($this->session->userdata('logged_on')) {
				redirect(base_url('/users/new_user'));
			}
			else 
			{
				redirect(base_url('/users/register'));
			}

			
		} 
		else 
		{
			$this->user->create($user_info);
			$user = $this->user->get_user($email); 
			$user_info = array(
				'current_id' => $user['id'],
				'user_level' => $user['user_level'],
				'logged_on' => TRUE
			);

			$this->session->set_userdata($user_info);

			$id = $user['id'];
			redirect(base_url("/users/profile/$id"));
		}
	}
	

	public function get_user()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->user->get_user($email);

		if ($user && $user['password'] == $password) 
		{
			$user_info = array(
				'current_id' => $user['id'],
				'user_level' => $user['user_level'],
				'logged_on' => TRUE
			);

			$this->session->set_userdata($user_info);
			redirect(base_url('/users/user_dash'));

		} 
		else 
		{
			$this->session->set_flashdata('login_error', "Invalid email or password");
			redirect(base_url('/users/signin'));
		}

		$this->load->library("form_validation");
		$this->form_validation->set_rules
		("email", "Email Address", "trim|required|valid_email");
		$this->form_validation->set_rules
		("password", "Password", "trim|required");

		if ($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('login_error', $this->view_data['errors']);
			redirect(base_url('/users/signin'));
		} else {
			redirect(base_url('/users/user_dash'));
		}
	}

	public function edit($id)
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			"email_edit", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules(
			"first_name_edit", "First Name", "trim|required");
		$this->form_validation->set_rules(
			"last_name_edit", "Last Name", "trim|required");
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('edit_error', $this->view_data['errors']);
			redirect(base_url("/users/edit_user/$id"));
		} 
		else 
		{
			$edit_info = array(
				'email' => $this->input->post('email_edit'),
				'first_name' => $this->input->post('first_name_edit'),
				'last_name' => $this->input->post('last_name_edit'),
				'user_level' => $this->input->post('user_level_edit')

			);
			$this->user->edit_user($id, $edit_info);
			redirect(base_url('/users/admin_dash'));
		}
	}

	public function change_pass($id)
	{
		$this->load->library('form_validation');
		$password = md5($this->input->post('password'));

		$this->form_validation->set_rules(
			"password", "Password", "trim|required");
		$this->form_validation->set_rules(
			"con_password", "Password Confirmation", "trim|required|matches[password]");

		if ($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('pass_error', $this->view_data['errors']);
			redirect(base_url("/users/edit_user/$id"));
		}
		else
		{
			$this->user->change_pass($id, $password);
			redirect(base_url("/users/admin_dash"));
		}
	}
	public function remove($id)
	{
		$this->user->remove($id);
		redirect(base_url("/users/admin_dash"));
	}
	public function change_description($id)
	{
		$description = $this->input->post('description');
		$this->user->change_description($description, $id);
		redirect(base_url("/users/profile/$id"));
	}
	public function logoff()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}

//end of main controller









