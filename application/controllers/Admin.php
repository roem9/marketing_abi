<?php
class Admin extends CI_CONTROLLER{
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
        redirect("admin/konfirmmarketing");
    }
    
    public function materiMarketing(){
        $data['title'] = "Materi Marketing";
        
        $data['materi'] = [];
        $materi = $this->Materi_model->get_all_materi_marketing();
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            $data['materi'][$i]['video'] = COUNT($this->Materi_model->get_all_video_materi_marketing_by_id($materi['id_materi']));
            $data['materi'][$i]['ebook'] = COUNT($this->Materi_model->get_all_ebook_materi_marketing_by_id($materi['id_materi']));
        }

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/materi", $data);
        $this->load->view("templates/footer-admin", $data);
    }
    
    public function materiProduk(){
        $data['title'] = "Materi Produk";
        
        $data['materi'] = [];
        $materi = $this->Materi_model->get_all_materi_produk();
        foreach ($materi as $i => $materi) {
            $data['materi'][$i] = $materi;
            $data['materi'][$i]['video'] = COUNT($this->Materi_model->get_all_video_materi_produk_by_id($materi['id_materi']));
            $data['materi'][$i]['ebook'] = COUNT($this->Materi_model->get_all_ebook_materi_produk_by_id($materi['id_materi']));
        }

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/materi", $data);
        $this->load->view("templates/footer-admin", $data);
    }

    public function videoMateriMarketing($id){
        $materi = $this->Materi_model->get_materi_marketing_by_id($id);

        $data['type'] = "Materi Marketing";
        $data['id_materi'] = $id;

        $data['title'] = "Video {$materi['judul']}";
        $data['video'] = $this->Materi_model->get_all_video_materi_marketing_by_id($id);

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/video", $data);
        $this->load->view("templates/footer-admin", $data);

    }

    public function videoMateriProduk($id){
        $materi = $this->Materi_model->get_materi_produk_by_id($id);

        $data['type'] = "Materi Produk";
        $data['id_materi'] = $id;

        $data['title'] = "Video {$materi['judul']}";
        $data['video'] = $this->Materi_model->get_all_video_materi_produk_by_id($id);

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/video", $data);
        $this->load->view("templates/footer-admin", $data);
    }
    
    public function ebookMateriMarketing($id){
        $materi = $this->Materi_model->get_materi_marketing_by_id($id);

        $data['type'] = "Materi Marketing";
        $data['id_materi'] = $id;

        $data['title'] = "Ebook {$materi['judul']}";
        $data['ebook'] = $this->Materi_model->get_all_ebook_materi_marketing_by_id($id);

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/ebook", $data);
        $this->load->view("templates/footer-admin", $data);

    }

    public function ebookMateriProduk($id){
        $materi = $this->Materi_model->get_materi_produk_by_id($id);

        $data['type'] = "Materi Produk";
        $data['id_materi'] = $id;

        $data['title'] = "Ebook {$materi['judul']}";
        $data['ebook'] = $this->Materi_model->get_all_ebook_materi_produk_by_id($id);

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/ebook", $data);
        $this->load->view("templates/footer-admin", $data);
    }

    public function marketing(){
        $data['title'] = "List Marketing";
        
        $data['marketing'] = $this->Materi_model->get_all_marketing();

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/marketing", $data);
        $this->load->view("templates/footer-admin", $data);
    }
    
    public function konfirmMarketing(){
        $data['title'] = "Konfirmasi Marketing";
        
        $data['marketing'] = $this->Materi_model->get_all_marketing_konfirm();

        $this->load->view("templates/header-admin", $data);
        $this->load->view("admin/konfirm-marketing", $data);
        $this->load->view("templates/footer-admin", $data);
    }

    // get
        public function get_marketing_by_id(){
            
            $id = $this->input->post("id");
            $data =  $this->Materi_model->get_marketing_by_id($id);
            echo json_encode($data);
        }

        public function get_marketing_by_like_nama(){
            $nama = $this->input->post("nama", TRUE);
            $data = $this->Materi_model->get_marketing_by_like_nama($nama);
            echo json_encode($data);
        }

        public function get_materi_marketing_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_materi_marketing_by_id($id);
            echo json_encode($data);
        }
        
        public function get_materi_produk_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_materi_produk_by_id($id);
            echo json_encode($data);
        }
        
        public function get_video_materi_marketing_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_video_materi_marketing_by_id($id);
            echo json_encode($data);
        }
        
        public function get_video_materi_produk_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_video_materi_produk_by_id($id);
            echo json_encode($data);
        }
        
        public function get_ebook_materi_marketing_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_ebook_materi_marketing_by_id($id);
            echo json_encode($data);
        }
        
        public function get_ebook_materi_produk_by_id(){
            $id = $this->input->post("id", TRUE);
            $data = $this->Materi_model->get_ebook_materi_produk_by_id($id);
            echo json_encode($data);
        }
    // get

    // edit
        public function konfirm_user(){
            $id = $this->input->post("id_marketing", TRUE);
            $data = [
                "status" => "aktif"
            ];

            $this->Materi_model->edit_status_user($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengkonfirmasi marketing<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_status_user($id, $status){
            $data = [
                "status" => $status
            ];

            $this->Materi_model->edit_status_user($id, $data);

            if($status == "aktif"){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengaktifkan marketing<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menonaktifkan marketing<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_materi_marketing(){
            $id = $this->input->post("id_materi");
            $data = [
                "judul" => $this->input->post("judul", TRUE)
            ];
            $this->Materi_model->edit_materi_marketing($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_materi_produk(){
            $id = $this->input->post("id_materi");
            $data = [
                "judul" => $this->input->post("judul", TRUE),
                "telegram" => $this->input->post("telegram", TRUE),
                "link" => $this->input->post("link", TRUE)
            ];
            // $this->Materi_model->edit_materi_produk($id, $data);
            $this->Main_model->edit_data("materi_produk", ["id_materi" => $id], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_video_materi_marketing(){
            $id = $this->input->post("id_video");
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "video" => $this->input->post("video")
            ];
            $this->Materi_model->edit_video_materi_marketing($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah video<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_video_materi_produk(){
            $id = $this->input->post("id_video");
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "video" => $this->input->post("video")
            ];
            $this->Materi_model->edit_video_materi_produk($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah video<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_ebook_materi_marketing(){
            $id = $this->input->post("id_ebook");
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "ebook" => $this->input->post("ebook")
            ];
            $this->Materi_model->edit_ebook_materi_marketing($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah ebook<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_ebook_materi_produk(){
            $id = $this->input->post("id_ebook");
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "ebook" => $this->input->post("ebook")
            ];
            $this->Materi_model->edit_ebook_materi_produk($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengubah ebook<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit

    // delete
        public function delete_user_by_id(){
            $id = $this->input->post("id_marketing", TRUE);
            $this->Materi_model->delete_user_by_id($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil membatalkan marketing<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function delete_video_materi_marketing_by_id($id){
            $this->Materi_model->delete_video_materi_marketing_by_id($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menghapus video materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function delete_video_materi_produk_by_id($id){
            $this->Materi_model->delete_video_materi_produk_by_id($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menghapus video materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function delete_ebook_materi_marketing_by_id($id){
            $data = $this->Materi_model->get_ebook_materi_marketing_by_id($id);
            $target = "./assets/ebook/".$data['cover'];
            unlink($target);
            $this->Materi_model->delete_ebook_materi_marketing_by_id($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menghapus ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function delete_ebook_materi_produk_by_id($id){
            $data = $this->Materi_model->get_ebook_materi_produk_by_id($id);
            $target = "./assets/ebook/".$data['cover'];
            unlink($target);
            $this->Materi_model->delete_ebook_materi_produk_by_id($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menghapus ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // delete

    // add
        public function add_materi_marketing(){
            $data['judul'] = $this->input->post("judul", TRUE);
            $this->Materi_model->add_materi_marketing($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan materi marketing<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function add_materi_produk(){
            $data = [
                "judul" => $this->input->post("judul", TRUE),
                "telegram" => $this->input->post("telegram", TRUE),
                "link" => $this->input->post("link", TRUE)
            ];

            // $this->Materi_model->add_materi_produk($data);
            $this->Main_model->add_data("materi_produk", $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan materi produk<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function add_video_materi_marketing(){
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "video" => $this->input->post("video"),
                "urutan" => "",
                "id_materi" => $this->input->post("id_materi")
            ];

            $this->Materi_model->add_video_materi_marketing($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan video materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function add_video_materi_produk(){
            $data = [
                "judul" => $this->input->post("judul"),
                "deskripsi" => $this->input->post("deskripsi"),
                "video" => $this->input->post("video"),
                "urutan" => "",
                "id_materi" => $this->input->post("id_materi")
            ];

            $this->Materi_model->add_video_materi_produk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan video materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function add_ebook_materi_marketing(){
            $name = $this->add_cover();
            if($name){
                $data = [
                    "judul" => $this->input->post("judul", TRUE),
                    "deskripsi" => $this->input->post("deskripsi", TRUE),
                    "ebook" => $this->input->post("ebook", TRUE),
                    "cover" => $name,
                    "urutan" => "0",
                    "id_materi" => $this->input->post("id_materi")
                ];
                $this->Materi_model->add_ebook_materi_marketing($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menambahkan ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

        public function add_ebook_materi_produk(){
            $name = $this->add_cover();
            if($name){
                $data = [
                    "judul" => $this->input->post("judul", TRUE),
                    "deskripsi" => $this->input->post("deskripsi", TRUE),
                    "ebook" => $this->input->post("ebook", TRUE),
                    "cover" => $name,
                    "urutan" => "0",
                    "id_materi" => $this->input->post("id_materi")
                ];
                $this->Materi_model->add_ebook_materi_produk($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menambahkan ebook materi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    // add

    // other function
        public function add_cover(){
            if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != '') {
                unset($config);
                $configCover['upload_path'] = './assets/cover';
                $configCover['max_size'] = '6000';
                $configCover['allowed_types'] = 'png|jpg|jpeg|img';
                $configCover['overwrite'] = FALSE;
                $configCover['remove_spaces'] = TRUE;
                $cover_name = $this->input->post("judul");
                $configCover['file_name'] = $cover_name;
                
                // return $configCover;
                $this->load->library('upload', $configCover);
                $this->upload->initialize($configCover);
                if(!$this->upload->do_upload('cover')) {
                    echo $this->upload->display_errors();
                }else{
                    $coverDetails = $this->upload->data();
                    $data['cover_name']= $configCover['file_name'];
                    $data['cover_detail'] = $coverDetails;
                    return $coverDetails['orig_name'];
                }

            }
        }
    // other function
}