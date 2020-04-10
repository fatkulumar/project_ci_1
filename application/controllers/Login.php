<?php

    class Login extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('m_admin');
            $this->load->database();
        }

        function index()
        {
            $this->load->view('v_index');
        }

        function aksi_login()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array(
                'username' => $username,
                'password' =>$password
            );

            $id_register = $this->db->query("SELECT * FROM tb_registrasi WHERE username = '$username'")->result();
            // $cek = $this->m_login->cek_login("tb_login", $where)->num_rows();
            // $cek = $this->m_admin->cek_login("tb_registrasi", $where)->result();
            $cek = $this->db->query("SELECT * FROM tb_registrasi WHERE username = '$username'")->result();
            foreach($cek as $ce){
                $data["level"] = $ce->level;
            }
            if($cek){
                $data_session = array(
                    'nama' => $username,
                    'status' => "login",
                    'id_login' => $id_register,
                    'level' => $data["level"]
                );
                
                $this->session->set_userdata($data_session);
                redirect(base_url("admin"));
            }else{
                $data["error"] = "Username dan Password Salah!!!";
                $this->load->view("v_index", $data);
            }
        }

        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }