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
            $uname_karyawan = "Belum Login";
            $id_log = 0;
            $waktu = date("Y-m-d h:i:sa");
            $aktif = base_url('login/index/'); 

            $data = array(
                'uname_aktifitas' => $uname_karyawan,
                'id_register_aktifitas' => $id_log,
                'waktu_aktifitas' => $waktu,
                'aktifitas' => $aktif,
                'aksi' => "mau login pertama jadikan admin"
            );

            $this->m_admin->input_aktifitas($data, 'tb_aktifitas');

            $this->load->view('v_index');
        }

        function aksi_login()
        {
            $username = $this->input->post('username');
            $psd = $this->input->post('password');
            $password = $this->db->query("SELECT * FROM tb_registrasi WHERE username = '$username'")->row('password');

            $where = array(
                'username' => $username
                // 'password' => $password
            );

            //cek registrasi == 0
            $cek_reg = $this->m_admin->cek_reg()->result();
            $jml_cek = count($cek_reg);
            if($jml_cek == 0) {
                $this->db->query("INSERT INTO `tb_registrasi`(`id_karyawan`, `nip`, `ttl`, `nik`, `username`, `password`, `level`) VALUES (0,0,'', 0,'$username', '$password', 0)");
                $this->load->view("v_index");
            }


            $id_register = $this->db->query("SELECT * FROM tb_registrasi WHERE username = '$username'")->result();
            // $cek = $this->m_admin->cek_login("tb_registrasi", $where)->result();
            // $cek = $this->db->query("SELECT * FROM tb_registrasi WHERE username = '$username' AND password = '$password'")->result();
            $cek = $this->m_login->cek_login($where, "tb_registrasi")->result();
            foreach($cek as $ce){
                $data["level"] = $ce->level;
            }
            
            $hash = password_verify($psd,$password);
            if($cek && $hash){
                $data_session = array(
                    'nama' => $username,
                    'status' => "login",
                    'id_login' => $id_register,
                    'level' => $data["level"]
                );
                
                $this->session->set_userdata($data_session);
               
                    $id_login = $this->session->userdata('id_login');
                    foreach ($id_login as $id) {
                    $idku = $id->id_registrasi;
                    }
                print_r($foto = $this->db->query("SELECT foto FROM tb_profil WHERE id_registrasi = '$idku'")->result()); 
                $fotoku = array(
                    'foto' => $foto
                );
                $this->session->set_userdata($fotoku);
                $this->t_aktifitas("login","login");
                redirect(base_url("admin"));
            }else{
                $uname_karyawan = "Gagal Login";
                $id_log = 0;
                $waktu = date("Y-m-d h:i:sa");
                $aktif = base_url('login/index/'); 

                $data = array(
                    'uname_aktifitas' => $uname_karyawan,
                    'id_register_aktifitas' => $id_log,
                    'waktu_aktifitas' => $waktu,
                    'aktifitas' => $aktif,
                    'aksi' => "mau login pertama jadikan admin"
                );

                $this->m_admin->input_aktifitas($data, 'tb_aktifitas');
                // $this->t_aktifitas("login","login gagal");
                $data["error"] = "Username dan Password Salah!!!";
                $this->load->view("v_index", $data);
            }
        }

        function logout()
        {
            $this->t_aktifitas("logout","logout");
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }

        private function t_aktifitas($aktifitas, $aksi)
        {
            
            $uname_karyawan = $this->session->userdata('nama');
            $id_login = $this->session->userdata('id_login');
            foreach ($id_login as $id) {
                $id_log = $id->id_registrasi;
            }
            $waktu = date("Y-m-d h:i:sa");
            $aktif = base_url('login/' . $aktifitas . '/'); 

            $data = array(
                'uname_aktifitas' => $uname_karyawan,
                'id_register_aktifitas' => $id_log,
                'waktu_aktifitas' => $waktu,
                'aktifitas' => $aktif,
                'aksi' => $aksi
            );

            $this->m_admin->input_aktifitas($data, 'tb_aktifitas');
        }
    }