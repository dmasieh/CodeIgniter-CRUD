<?php
	class Users extends CI_Controller{

		//register user
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists|min_length[8]');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]|min_length[8]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt Password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can now log in!');

				redirect('posts');
			}

		}

		//Log in user
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				// get username
				$username = $this->input->post('username');

				//get and encrypt password
				$password = md5($this->input->post('password'));

				// Login User
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in!');

					redirect('posts');
				} else {
					// Failed Login
					$this->session->set_flashdata('login_failed', 'Log In Information Invalid!');

					redirect('users/login');
				}

				
			}

		}

		// Log the user out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// set message
			$this->session->set_flashdata('user_loggedout', 'You are now Logged Out!');

			redirect('/');
		}

		//check if the username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken, please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		//check if the username exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email address is taken, please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}
