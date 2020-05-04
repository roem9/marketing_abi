<?php
class Login_model extends CI_MODEL{
	function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function cek_login_admin(){
        $username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$this->db->from("admin");
		$this->db->where("username", $username);
		$this->db->where("password", MD5($password));
		return $this->db->get()->row_array();
	}

	public function cek_login_user(){
		$email = $this->input->post("email");
		$password = md5($this->input->post("password", TRUE));

		$this->db->from("marketing");
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		return $this->db->get()->row_array();
	}

	public function cek_status_user($id){
		$this->db->from("marketing");
		$this->db->where("id_marketing", $id);
		return $this->db->get()->row_array();
	}
	
	// get by id
		public function cek_user_by_email($email){
			$this->db->where("email", $email);
			$this->db->from("marketing");
			return $this->db->get()->row_array();
		}
	// get by id

	// add
		public function add_user($data){
			$this->db->insert("marketing", $data);
		}
	// add

}