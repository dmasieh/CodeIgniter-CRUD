<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			//user data array
			$data = array(
				'firstname' => trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS)),
				'lastname' => trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS)),
				'email' => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS)),
				'username' => trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS)),
				'password' => $enc_password
			);

			//insert user
			return $this->db->insert('users', $data);
		}
		// Log User In
		public function login($username, $password){
			//validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}


		// Check if username is in use
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check if email is in use
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}  