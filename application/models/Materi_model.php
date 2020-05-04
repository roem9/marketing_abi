<?php
class Materi_model extends CI_MODEL{
    // get all
        public function get_all_marketing_konfirm(){
            $this->db->select("id_marketing, nama, status");
            $this->db->from("marketing");
            $this->db->where("status", "konfirm");
            $this->db->order_by("nama", "ASC");
            return $this->db->get()->result_array();
        }
        
        public function get_all_marketing(){
            $this->db->select("id_marketing, nama, status");
            $this->db->from("marketing");
            $this->db->where("status != ", "konfirm");
            $this->db->order_by("nama", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_all_materi_marketing(){
            $this->db->from("materi_marketing");
            return $this->db->get()->result_array();
        }
        
        public function get_all_materi_produk(){
            $this->db->from("materi_produk");
            return $this->db->get()->result_array();
        }
    // get all
    
    // get by id
        public function get_marketing_by_id($id){
            $this->db->from("marketing");
            $this->db->where("id_marketing", $id);
            return $this->db->get()->row_array();
        }

        public function get_marketing_by_like_nama($nama){
            $this->db->select("id_marketing, nama, status");
            $this->db->from("marketing");
            $this->db->like("nama", $nama, "after");
            return $this->db->get()->result_array();
        }

        public function get_materi_marketing_by_id($id){
            $this->db->from("materi_marketing");
            $this->db->where("id_materi", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_materi_produk_by_id($id){
            $this->db->from("materi_produk");
            $this->db->where("id_materi", $id);
            return $this->db->get()->row_array();
        }

        public function get_all_video_materi_marketing_by_id($id){
            $this->db->from("video_materi_marketing");
            $this->db->where("id_materi", $id);
            return $this->db->get()->result_array();
        }
        
        public function get_all_video_materi_produk_by_id($id){
            $this->db->from("video_materi_produk");
            $this->db->where("id_materi", $id);
            return $this->db->get()->result_array();
        }

        public function get_video_materi_marketing_by_id($id){
            $this->db->from("video_materi_marketing");
            $this->db->where("id_video", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_video_materi_produk_by_id($id){
            $this->db->from("video_materi_produk");
            $this->db->where("id_video", $id);
            return $this->db->get()->row_array();
        }

        public function get_user_by_id($id){
            $this->db->from("marketing");
            $this->db->where("id_marketing", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_all_ebook_materi_marketing_by_id($id){
            $this->db->from("ebook_materi_marketing");
            $this->db->where("id_materi", $id);
            return $this->db->get()->result_array();
        }
        
        public function get_all_ebook_materi_produk_by_id($id){
            $this->db->from("ebook_materi_produk");
            $this->db->where("id_materi", $id);
            return $this->db->get()->result_array();
        }
        
        public function get_ebook_materi_marketing_by_id($id){
            $this->db->from("ebook_materi_marketing");
            $this->db->where("id_ebook", $id);
            return $this->db->get()->row_array();
        }
        
        public function get_ebook_materi_produk_by_id($id){
            $this->db->from("ebook_materi_produk");
            $this->db->where("id_ebook", $id);
            return $this->db->get()->row_array();
        }
    // get by id
    
    // add
        public function add_materi_marketing($data){
            $this->db->insert("materi_marketing", $data);
        }
        
        public function add_materi_produk($data){
            $this->db->insert("materi_produk", $data);
        }

        public function add_video_materi_marketing($data){
            $this->db->insert("video_materi_marketing", $data);
        }

        public function add_video_materi_produk($data){
            $this->db->insert("video_materi_produk", $data);
        }

        public function add_ebook_materi_marketing($data){
            $this->db->insert("ebook_materi_marketing", $data);
        }
        
        public function add_ebook_materi_produk($data){
            $this->db->insert("ebook_materi_produk", $data);
        }
    // add

    // edit
        public function edit_status_user($id, $data){
            $this->db->where("id_marketing", $id);
            $this->db->update("marketing", $data);
        }

        public function edit_materi_marketing($id, $data){
            $this->db->where("id_materi", $id);
            $this->db->update("materi_marketing", $data);
        }
        
        public function edit_materi_produk($id, $data){
            $this->db->where("id_materi", $id);
            $this->db->update("materi_produk", $data);
        }

        public function edit_video_materi_marketing($id, $data){
            $this->db->where("id_video", $id);
            $this->db->update("video_materi_marketing", $data);
        }

        public function edit_video_materi_produk($id, $data){
            $this->db->where("id_video", $id);
            $this->db->update("video_materi_produk", $data);
        }

        public function edit_marketing_by_id($id, $data){
            $this->db->where("id_marketing", $id);
            $this->db->update("marketing", $data);
        }

        // public function edit_password($id){
        //     $this->db->where("id_marketing", $id);
        //     $this->db->update("marketing", ["password" => MD5($this->input->post("password"))]);
        // }
        
        public function edit_ebook_materi_marketing($id, $data){
            $this->db->where("id_ebook", $id);
            $this->db->update("ebook_materi_marketing", $data);
        }

        public function edit_ebook_materi_produk($id, $data){
            $this->db->where("id_ebook", $id);
            $this->db->update("ebook_materi_produk", $data);
        }
    // edit

    // delete
        public function delete_user_by_id($id){
            $this->db->where("id_marketing", $id);
            $this->db->delete("marketing");
        }
        
        public function delete_video_materi_marketing_by_id($id){
            $this->db->where("id_video", $id);
            $this->db->delete("video_materi_marketing");
        }
        
        public function delete_video_materi_produk_by_id($id){
            $this->db->where("id_video", $id);
            $this->db->delete("video_materi_produk");
        }

        public function delete_ebook_materi_marketing_by_id($id){
            $this->db->where("id_ebook", $id);
            $this->db->delete("ebook_materi_marketing");
        }
        
        public function delete_ebook_materi_produk_by_id($id){
            $this->db->where("id_ebook", $id);
            $this->db->delete("ebook_materi_produk");
        }
}