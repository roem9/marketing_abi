<?php
class Login extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
        $data['header'] = 'Login User';
        $data['title'] = 'Login User';

        $this->load->view("templates/header-login", $data);
        $this->load->view("login/login-user");
    }

    public function admin(){
        $data['header'] = 'Login';
        $data['title'] = 'Login';

        $this->load->view("templates/header-login", $data);
        $this->load->view("login/login");
    }

    public function pendaftaran(){
        $data['title'] = 'Pendaftaran';

        $this->load->view("templates/header-login", $data);
        $this->load->view("login/register");
    }

    public function cek_login_admin(){
        
        $cek = $this->Login_model->cek_login_admin();

		if($cek){
 
			$data_session = array(
                'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin/materiMarketing"));
 
		}else{
            $this->session->set_flashdata('login', 'Maaf, kombinasi username dan password salah');
			redirect(base_url("login"));
		}

    }
    
    public function cek_login_user(){
        $cek = $this->Login_model->cek_login_user();

		if($cek){
            $status = $this->Login_model->cek_status_user($cek['id_marketing']);
            if($status['status'] == 'aktif'){
                $data_session = array(
                    'id' => $cek['id_marketing'],
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("marketing"));
            } elseif($status['status'] == 'nonaktif') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun Anda sudah tidak aktif. Silahkan menghubungi admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect(base_url("login"));
            } elseif (($status['status'] == 'konfirm')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun Anda belum dikonfirmasi. Silahkan menghubungi admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect(base_url("login"));
            }
		}else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Maaf data login Anda salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url("login"));
		}
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url("login/admin"));
    }
    
    function logout_user(){
        $this->session->sess_destroy();
        redirect(base_url("login"));
    }

    // add
        public function add_user(){
            $data = [
				"nama" => $this->input->post("nama", TRUE),
				"no_hp" => $this->input->post("no_hp", TRUE),
				"tgl_lahir" => $this->input->post("tgl_lahir", TRUE),
				"alamat" => $this->input->post("alamat", TRUE),
				"jk" => $this->input->post("jk", TRUE),
				"email" => $this->input->post("email", TRUE),
				"password" => MD5($this->input->post("password", TRUE)),
				"status" => "konfirm"
            ];
            
            $email = $this->input->post("email", TRUE);
            $cek = $this->Login_model->cek_user_by_email($email);
            
            if($cek){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email Anda telah digunakan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->Login_model->add_user($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mendaftarkan akun Anda<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect("login");
            }
        }
}