<?php
class Marketing extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->model('Main_model');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function index(){
        $id = $this->session->userdata("id");

        $data['title'] = "Profil";
        
        $data['user'] = $this->Materi_model->get_user_by_id($id);

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/home", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function materiMarketing(){
        $data['title'] = "Materi Marketing";
        
        $materi = $this->Materi_model->get_all_materi_marketing();
        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            $data['materi'][$i]['video'] = COUNT($this->Materi_model->get_all_video_materi_marketing_by_id($materi['id_materi']));
            $data['materi'][$i]['buku'] = COUNT($this->Materi_model->get_all_ebook_materi_marketing_by_id($materi['id_materi']));
        }

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/materi", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function materiProduk(){
        $data['title'] = "Materi Produk";
        
        $materi = $this->Materi_model->get_all_materi_produk();
        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            $data['materi'][$i]['video'] = COUNT($this->Materi_model->get_all_video_materi_produk_by_id($materi['id_materi']));
            $data['materi'][$i]['buku'] = COUNT($this->Materi_model->get_all_ebook_materi_produk_by_id($materi['id_materi']));
        }

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/materi", $data);
        $this->load->view("templates/footer-user", $data);
    }
    
    public function bahanIklan(){
        $data['title'] = "Bahan Iklan";
        
        $materi = $this->Materi_model->get_all_materi_produk();
        $data['materi'] = [];
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
        }

        $data['link'] = MD5($this->session->userdata("id"));

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/bahan-iklan", $data);
        $this->load->view("templates/footer-user", $data);
    }
    
    public function videoMateriMarketing($id){
        $materi = $this->Materi_model->get_materi_marketing_by_id($id);

        $data['type'] = "Materi Marketing";

        $data['title'] = "Video {$materi['judul']}";
        $data['video'] = $this->Materi_model->get_all_video_materi_marketing_by_id($id);

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/video", $data);
        $this->load->view("templates/footer-user", $data);
    }
    
    public function videoMateriProduk($id){
        $materi = $this->Materi_model->get_materi_produk_by_id($id);

        $data['type'] = "Materi Produk";

        $data['title'] = "Video {$materi['judul']}";
        $data['video'] = $this->Materi_model->get_all_video_materi_produk_by_id($id);

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/video", $data);
        $this->load->view("templates/footer-user", $data);
    }

    public function ebookMateriMarketing($id){
        $materi = $this->Materi_model->get_materi_marketing_by_id($id);

        $data['type'] = "Materi Marketing";
        $data['id_materi'] = $id;

        $data['title'] = "Ebook {$materi['judul']}";
        $data['ebook'] = $this->Materi_model->get_all_ebook_materi_marketing_by_id($id);

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/ebook", $data);
        $this->load->view("templates/footer-user", $data);

    }

    public function ebookMateriProduk($id){
        $materi = $this->Materi_model->get_materi_produk_by_id($id);

        $data['type'] = "Materi Produk";
        $data['id_materi'] = $id;

        $data['title'] = "Ebook {$materi['judul']}";
        $data['ebook'] = $this->Materi_model->get_all_ebook_materi_produk_by_id($id);

        $this->load->view("templates/header-user", $data);
        $this->load->view("marketing/ebook", $data);
        $this->load->view("templates/footer-user", $data);
    }

    // get
        public function get_user_by_id(){
            $id = $this->input->post("id");
            $data = $this->Materi_model->get_user_by_id($id);
            echo json_encode($data);
        }

        public function get_produk(){
            $id = $this->input->post("id");
            $data = $this->Main_model->get_one("materi_produk", ["id_materi" => $id]);
            echo json_encode($data);
        }
    // get

    // edit
        public function edit_marketing_by_id(){
            $id = $this->input->post("id_marketing");
            $data = [
                "nama" => $this->input->post("nama", TRUE),
                "jk" => $this->input->post("jk", TRUE),
                "no_hp" => $this->input->post("no_hp", TRUE),
                "tgl_lahir" => $this->input->post("tgl_lahir"),
                "alamat" => $this->input->post("alamat")
            ];
            $this->Materi_model->edit_marketing_by_id($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil merubah profil Anda<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_password(){
            $id = $this->input->post("id_marketing", TRUE);
            $data = [
                "password" => MD5($this->input->post("password"))
            ];
            $this->Materi_model->edit_marketing_by_id($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil merubah password Anda<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect($_SERVER['HTTP_REFERER']);
        }
    // edit
}