<?php

    class Admin extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library("session");
            $this->load->model("m_admin");
            $this->load->helper(array("form", "url"));
            if($this->session->userdata('status') != "login"){
                redirect(base_url("login"));
            }
        }

        function index()
        {
            $this->t_aktifitas("index", "index");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0,
                        'tb_task.progress' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            // $data["task"] = $this->m_admin->get_task()->result();
            // foreach ($data["task"] as $t) {
            //     echo $data["notif"] = $t->notif_kerja;
            //     if($data["notif"] == 1){
            //         $this->session->set_flashdata("notif", "Ada Pekerjaan Baru Buat Kamu Nih... :)");
            //     }
            // }
            $data["page"] = "home";
            $data["ses_uname"] = $this->session->userdata('nama');
            $this->load->view('v_admin', $data);
        }

        function registrasi()
        {
            $this->t_aktifitas("registrasi","tampil registrasi");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["registrasi"] = $this->m_admin->tampil_registrasi()->result();
            $data["page"] = "registrasi";
            $this->load->view('v_admin', $data);
        }

        function v_t_registrasi()
        {
            $this->t_aktifitas("v_t_registrasi", "input registrasi");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }
            $data["gakJelas"] = $this->m_admin->registrasiKaryawan()->result();
            $data["karyawan"] = $this->m_admin->tampil_karyawan()->result();
            $data["page"] = "v_t_registrasi";
            $this->load->view('v_admin', $data);
        }

        function v_e_registrasi($id)
        {
            $this->t_aktifitas("v_e_registrasi", "edit registrasi");
            
            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_registrasi' => $id
            );
            $data["page"] = "v_e_registrasi";
            $data["registrasi"] = $this->m_admin->e_registrasi($where, "tb_registrasi")->result();
            $data["karyawan"] = $this->m_admin->tampil_karyawan()->result();

            $this->load->view('v_admin', $data);
        }

        function t_registrasi()
        {
            $this->t_aktifitas("t_registrasi", "tambah proses registrasi");

            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $id_karyawan = $this->input->post('id_karyawan');
            $ttl = $this->input->post('ttl');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');
            // $hpassword = password_hash($password, "PASSWORD_DEFAULT");

            $data = array(
                'nip' => $nip,
                'nik' => $nik,
                'id_karyawan' => $id_karyawan,
                'ttl' => $ttl,
                'username' => $username,
                'password' => $password,
                'level' => $level
            );

            $data_log = array(
                'username' => $username,
                'password' => $password
            );

            // $this->m_admin->input_login($data_log, "tb_login");
            $this->m_admin->input_registrasi($data, "tb_registrasi");
            $data["id_terakhir"] = $this->db->insert_id(); 
            $id_akhir = $data["id_terakhir"];
            $this->db->query("INSERT INTO `tb_profil`(`id_registrasi`, `profil`, `nama_profil`, `tpt_lahir`, `tgl_lahir`, `alamat_asal`, `alamat_sekarang`, `hobi`, `id_sts_perkawinan`, `agama`, `foto`) VALUES ('$id_akhir', '', '', '', '', '', '', '', 0, '', '')");
            redirect('admin/registrasi');
        }

        function e_registrasi()
        {
            $this->t_aktifitas("e_registrasi", "edit proses registrasi");

            $id = $this->input->post('id_registrasi');
            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $id_karyawan = $this->input->post('id_karyawan');
            $ttl = $this->input->post('ttl');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');
            $data = array(
                'nip' => $nip,
                'nik' => $nik,
                'id_karyawan' => $id_karyawan,
                'ttl' => $ttl,
                'username' => $username,
                'password' => $password,
                'level' => $level
            );

            $where = array(
                'id_registrasi' => $id
            );
            
            $this->m_admin->update_registrasi($where, $data,"tb_registrasi");
            redirect("admin/registrasi");
        }

        function h_registrasi($id)
        {
            $this->t_aktifitas("h_t_registrasi", "hapus registrasi");

            $where = array(
                'id_registrasi' => $id
            );

            $this->m_admin->h_registrasi($where, "tb_registrasi");
            redirect("admin/registrasi");
        }

        function jabatan()
        {
            $this->t_aktifitas("jabatan", "tampil jabatan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["jabatan"] = $this->m_admin->tampil_jabatan()->result();
            $data["page"] = "jabatan";
            $this->load->view('v_admin', $data);
        }

        function v_t_jabatan()
        {
            $this->t_aktifitas("v_t_jabatan", "tambah jabatan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["page"] = "v_t_jabatan";
            // $data["id_divisi"] = $this->m_admin->tampil_divisi()->result();
            $data["id_karyawan"] = $this->m_admin->tampil_karyawan()->result();
            $this->load->view('v_admin', $data);
        }

        function v_e_jabatan($id)
        {
            $this->t_aktifitas("v_e_jabatan","edit jabatan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_jabatan' => $id
            );

            $data["page"] = "v_e_jabatan";
            $data["id_karyawan"] = $this->m_admin->tampil_karyawan()->result();
            $data["jabatan"] = $this->m_admin->e_jabatan($where, "tb_jabatan")->result();
            $this->load->view('v_admin', $data);
        }

        function t_jabatan()
        {
            $this->t_aktifitas("t_jabatan","tambah proses jabatan");

            $jabatan = $this->input->post('jabatan');
            // $id_karyawan = $this->input->post('id_karyawan');

            $data = array(
                'jabatan' => $jabatan
                // 'id_karyawan'=> $id_karyawan
            );

            $this->m_admin->input_jabatan($data, "tb_jabatan");
            redirect('admin/jabatan');
        }

        function e_jabatan()
        {
            $this->t_aktifitas("e_jabatan","edit proses jabatan");

            $id = $this->input->post('id_jabatan');
            $jabatan = $this->input->post('jabatan');
            // $id_karyawan = $this->input->post('id_karyawan');

            $data = array(
                'jabatan' => $jabatan
                // 'id_karyawan' => $id_karyawan
            );

            $where = array(
                'id_jabatan' => $id
            );
            
            $this->m_admin->update_jabatan($where, $data,"tb_jabatan");
            redirect("admin/jabatan");
        }

        function h_jabatan($id)
        {
            $this->t_aktifitas("h_jabatan", "hapus jabatan");

            $where = array(
                'id_jabatan' => $id
            );

            $this->m_admin->h_jabatan($where, "tb_jabatan");
            redirect("admin/jabatan");
        }

        function karyawan()
        {
            $this->t_aktifitas("karyawan", "tampil karyawan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["karyawan"] = $this->m_admin->karyawan()->result();
            $data["page"] = "karyawan";
            $this->load->view('v_admin', $data);
        }

        function v_t_karyawan()
        {
            $this->t_aktifitas("v_t_karyawan","tambah karyawan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }
            
            $data["page"] = "v_t_karyawan";
            $data["id_jabatan"] = $this->m_admin->tampil_jabatan()->result();
            $data["id_divisi"] = $this->m_admin->tampil_divisi()->result();
            // $data["id_pekerjaan"] = $this->m_admin->tampil_pekerjaan()->result();
            $this->load->view('v_admin', $data);
        }

        function v_e_karyawan($id)
        {
            $this->t_aktifitas("v_e_karyawan", "edit karyawan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'tb_karyawan.id_karyawa' => $id
            );

            $data["page"] = "v_e_karyawan";
            $data["id_karyawan"] = $this->m_admin->v_e_karyawan($where, "tb_karyawan")->result();
            $data["id_jabatan"] = $this->m_admin->tampil_jabatan()->result();
            $data["id_divisi"] = $this->m_admin->tampil_divisi()->result();
            $data["id_pekerjaan"] = $this->m_admin->tampil_pekerjaan()->result();
            $this->load->view('v_admin', $data);
        }

        function t_karyawan()
        {
            $this->t_aktifitas("t_karyawan", "tambah proses karyawan");

            $karyawan = $this->input->post('nama_karyawan');
            $id_jabatan = $this->input->post('id_jabatan');
            $id_divisi = $this->input->post('id_divisi');
            // $id_pekerjaan = $this->input->post('id_pekerjaan');

            $data = array(
                'nama_karyawan' => $karyawan,
                'id_jabatan'=> $id_jabatan,
                'id_divisi'=> $id_divisi
                // 'id_pekerjaan'=> $id_pekerjaan
            );

            $this->m_admin->input_karyawan($data, "tb_karyawan");
            redirect('admin/karyawan');
        }

        function e_karyawan()
        {
            $this->t_aktifitas("e_karyawan", "edit karyawan");

            $id = $this->input->post('id_karyawan');
            $karyawan = $this->input->post('nama_karyawan');
            $id_divisi = $this->input->post('id_divisi');
            $id_jabatan = $this->input->post('id_jabatan');
            // $id_pekerjaan = $this->input->post('id_pekerjaan');

            $data = array(
                'nama_karyawan' => $karyawan,
                'id_divisi' => $id_divisi,
                'id_jabatan' => $id_jabatan,
                // 'id_pekerjaan' => $id_pekerjaan
            );

            $where = array(
                'id_karyawa' => $id
            );
            
            $this->m_admin->update_karyawan($where, $data,"tb_karyawan");
            redirect("admin/karyawan");
        }

        function h_karyawan($id)
        {
            $this->t_aktifitas("h_karyawan", "hapus karyawan");

            $where = array(
                'id_karyawan' => $id
            );

            $this->m_admin->h_karyawan($where, "tb_karyawan");
            redirect("admin/karyawan");
        }

        function getAjaxDivisi()
        {
            $this->t_aktifitas("getAjaxDivisi", "get ajax divisi");

            $id_jabatan = $this->input->post("id_jabatan");
            $where = array(
                'tb_divisi.id_jabatan' => $id_jabatan
            );
            $data=$this->db
                ->join('tb_jabatan','tb_divisi.id_jabatan=tb_jabatan.id_jabatan')
                ->get_where('tb_divisi',$where)->result();
            echo json_encode($data);
        }

        function divisi()
        {
            $this->t_aktifitas("divisi", "tampil divisi");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }


            $data["divisi"] = $this->m_admin->jabatanDivisi();
            $data["page"] = "divisi";
            $this->load->view('v_admin', $data);
        }

        function v_t_divisi()
        {
            $this->t_aktifitas("v_t_divisi", "tambah divisi");
            
            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["id_jabatan"] = $this->m_admin->tampil_jabatan()->result();
            $data["page"] = "v_t_divisi";
            $this->load->view('v_admin', $data);
        }

        function t_divisi()
        {
            $this->t_aktifitas("t_divisi", "tambah proses divisi");

            $divisi = $this->input->post('divisi');
            $id_jabatan = $this->input->post('id_jabatan');
            $data = array(
                'divisi' => $divisi,
                'id_jabatan' => $id_jabatan
            );

            $this->m_admin->input_divisi($data, 'tb_divisi');
            
            redirect('admin/divisi');
            
        }

        function v_e_divisi($id)
        {
            $this->t_aktifitas("v_e_divisi", "edit divisi");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }
            
            $where = array(
                'tb_divisi.id_divisi' => $id
            );

            $data["page"] = "v_e_divisi";
            $data["divisi"] = $this->m_admin->e_divisi($where, "tb_divisi")->result();
            $data["id_jabatan"] = $this->m_admin->tampil_jabatan()->result();

            $this->load->view('v_admin', $data);

        }

        function h_divisi($id)
        {
            $this->t_aktifitas("h_divisi", "hapus divisi");

            $where = array(
                'id_divisi' => $id
            );

            $this->m_admin->h_divisi($where, "tb_divisi");
            redirect("admin/divisi");
        }

        function e_divisi()
        {
            $this->t_aktifitas("e_divisi", "edit proses divisi");

            $id = $this->input->post('id_divisi');
            $id_jabatan = $this->input->post('id_jabatan');
            $divisi = $this->input->post('divisi');

            $data = array(
                'divisi' => $divisi,
                'id_jabatan' => $id_jabatan
            );

            $where = array(
                'id_divisi' => $id
            );
            $this->m_admin->update_divisi($where, $data,"tb_divisi");
            redirect("admin/divisi");
        }

        function tampil_pekerjaan()
        {
            $this->t_aktifitas("tampil_pekerjaan", "json tampil pekerjaan");
            
            $data = $this->m_admin->tampil_pekerjaan()->result();
            echo json_encode($data);
        }

        function pekerjaan()
        {
            $this->t_aktifitas("pekerjaan", "tampil pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["pekerjaan"] = $this->m_admin->pekerjaanStatus();
            $data["page"] = "pekerjaan";
            $this->load->view('v_admin', $data);
        }

        function v_t_pekerjaan()
        {
            $this->t_aktifitas("v_t__pekerjaan", "tambah pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["status"] = $this->m_admin->tampil_status()->result();
            $data["page"] = "v_t_pekerjaan";
            $this->load->view('v_admin', $data);

        }

        function v_e_pekerjaan($id)
        {
            $this->t_aktifitas("v_e_pekerjaan", "edit pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_pekerjaan' => $id,
            );

            $data["page"] = "v_e_pekerjaan";
            $data["pekerjaan"] = $this->m_admin->e_pekerjaan($where, "tb_pekerjaan")->result();
            $data["status"] = $this->m_admin->tampil_status()->result();
            $this->load->view('v_admin', $data);
        }

        function t_pekerjaan()
        {
            $this->t_aktifitas("t_pekerjaan", "tambah proses pekerjaan");

            $pekerjaan = $this->input->post('pekerjaan');
            $status = $this->input->post('status');
            $deskripsi = $this->input->post('deskripsi');
            $data = array(
                'pekerjaan' => $pekerjaan,
                'deskripsi' => $deskripsi,
                'status_pekerjaan' => $status
            );

            $this->m_admin->input_pekerjaan($data, 'tb_pekerjaan');
            
            redirect('admin/pekerjaan');
            
        }

        function e_pekerjaan()
        {
            $this->t_aktifitas("e_pekerjaan", "edit proses pekerjaan");

            $id = $this->input->post('id_pekerjaan');
            $pekerjaan = $this->input->post('pekerjaan');
            $deskripsi = $this->input->post('deskripsi');
            $status = $this->input->post('status');

            $data = array(
                'id_pekerjaan' => $id,
                'pekerjaan' => $pekerjaan,
                'deskripsi' => $deskripsi,
                'status_pekerjaan' => $status
            );

            $where = array(
                'id_pekerjaan' => $id
            );
            
            $this->m_admin->update_pekerjaan($where, $data,"tb_pekerjaan");
            redirect("admin/pekerjaan");
        }

        function h_pekerjaan($id)
        {
            $this->t_aktifitas("h_pekerjaan", "hapus pekerjaan");

            $where = array(
                'id_pekerjaan' => $id
            );

            $this->m_admin->h_pekerjaan($where, "tb_pekerjaan");
            redirect("admin/pekerjaan");
        }

        function task()
        {
            $this->t_aktifitas("task", "tampil task");
            
            $level_admin = $this->session->userdata("level");
            if($level_admin == 0) {
                $data["task"] = $this->m_admin->get_task()->result(); 
            
                $data['jabatan']=$this->db->get('tb_jabatan')->result();  
                $data["page"] = "task";

                $data["laporanTglSelesai"] = $this->db->query("SELECT DISTINCT tgl_penyelesaian FROM tb_task")->result();


                $this->load->view('v_admin', $data);

            }else{
                $ii = $this->session->userdata("id_login");
                foreach($ii as $i) {
                $data["id_session"] = $i->id_registrasi;
                }

                $where = array(
                    'tb_task.id_registrasi' => $data["id_session"],
                    'tb_task.id_baca' => 0,
                    'tb_task.progress' => 0
                );

                $data["task"] = $this->m_admin->tampil_task($where, "tb_task")->result();
                // $data["task"] = $this->m_admin->get_task()->result();

                // $data["task"] = $this->db
                // ->join('tb_divisi','tb_divisi.id_divisi=tb_task.id_divisi')
                // ->join('tb_karyawan','tb_karyawan.id_karyawa=tb_task.id_karyawan')
                // ->join('tb_pekerjaan','tb_pekerjaan.id_pekerjaan=tb_task.id_pekerjaan')
                // ->get_where('tb_task',$where)->result();
                $wherekuh = array(
                    'tb_task.id_registrasi' => $data["id_session"]
                );

                $data["taskUserAll"] = $this->m_admin->tampil_task($wherekuh, "tb_task")->result();

                   
                $data["page"] = "taskUserAll";
                $this->load->view('v_admin', $data);
            }
        }

        function taskku($id)
        {
            $this->t_aktifitas("task", "tampil task");
            $ii = $this->session->userdata("id_login");
                foreach($ii as $i) {
                $data["id_session"] = $i->id_registrasi;
                }

                $whereku = array(
                    'tb_task.id_registrasi' => $data["id_session"],
                    'tb_task.id_baca' => 0,
                    'tb_task.progress' => 0
                );

                $this->db->query("UPDATE tb_task SET id_baca = 1 WHERE id_task = '$id'");
                $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();

                $where = array(
                    'tb_task.id_registrasi' => $data["id_session"],
                    'tb_task.id_baca' => 0,
                    'tb_task.progress' => 0,
                    // 'tb_task.id_task' => $id
                );

                $data["taskku"] = $this->m_admin->tampil_task($where, "tb_task")->result();

                $data["page"] = "taskku";
                $this->load->view('v_admin', $data);
        }

        function taskDetail($id)
        {
            $this->t_aktifitas("taskDetail", "tampil task detail");
            $ii = $this->session->userdata("id_login");
                foreach($ii as $i) {
                $data["id_session"] = $i->id_registrasi;
                }

                $where = array(
                    'tb_task.id_registrasi' => $data["id_session"],
                    // 'tb_task.id_baca' => 0,
                    // 'tb_task.progress' => 0,
                    'tb_task.id_task' => $id
                );

                $data["taskku"] = $this->m_admin->tampil_task($where, "tb_task")->result();

                $whereku = array(
                    'tb_task.id_registrasi' => $data["id_session"],
                    'tb_task.id_baca' => 0,
                    'tb_task.progress' => 0
                );

                $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                // $this->db->query("UPDATE tb_task SET id_baca = 1 WHERE id_task = '$id'");

                $data["page"] = "taskku";
                $this->load->view('v_admin', $data);
        }

        function v_t_task()
        {
            $this->t_aktifitas("v_t_task","tambah task");

            // $data["task"] = $this->m_admin->tampil_task()->result();
            // $data["jabatan"] = $this->m_admin->tampil_jabatan()->result();
            // $data["page"] = "v_t_task";
            // $this->load->view('v_admin', $data);
            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $id_divisi = $this->input->post("id_divisi");
            $where = array(
                'tb_karyawan.id_divisi' => $id_divisi
            );
            $data=$this->db
                ->join('tb_registrasi','tb_registrasi.id_karyawan=tb_karyawan.id_karyawa')
                ->join('tb_divisi','tb_divisi.id_divisi=tb_karyawan.id_divisi')
                ->get_where('tb_karyawan',$where)->result();
            echo json_encode($data);

        }

        function regKar()
        {
            $id_karyawan = $this->input->post("id_karyawan");
            $where = array(
                'tb_registrasi.id_karyawan' => $id_karyawan
            );

            $data=$this->db
                ->join('tb_karyawan','tb_karyawan.id_karyawa=tb_registrasi.id_karyawan')
                ->get_where('tb_registrasi',$where)->result();
            echo json_encode($data);
            // echo json_encode($data);
        }

        function t_task()
        {
            $this->t_aktifitas("t_task", "tambah proses task");

            $id_registrasi = $this->input->post('id_registrasi');
            $id_jabatan = $this->input->post('id_jabatan');
            $id_divisi = $this->input->post('id_divisi');
            $id_karyawan = $this->input->post('id_karyawan');
            $id_pekerjaan = $this->input->post('id_pekerjaan');
            $keterangan = $this->input->post('keterangan');
            $tgl_penugasan = $this->input->post('tgl_penugasan');
            $tgl_selesai = $this->input->post('tgl_selesai');

            $data = array(
                'id_registrasi' => $id_registrasi,
                'id_jabatan' => $id_jabatan,
                'id_divisi' => $id_divisi,
                'id_karyawan' => $id_karyawan,
                'id_pekerjaan' => $id_pekerjaan,
                'keterangan' => $keterangan,
                'tgl_penugasan' => $tgl_penugasan,
                'tgl_penyelesaian' => $tgl_selesai,
                'progress' => 0,
                'notif_kerja' => 0,
                'id_baca' => 0
            );

            $query = $this->m_admin->input_task($data, 'tb_task');
            
            echo json_encode($query);
            // redirect('admin/task');  
            
        }

        function konfir_notif_kerja($id)
        {
            $this->t_aktifitas("konfir_notif_kerja", "notif pekerjaan selesai");

            $this->db->query("UPDATE `tb_task` SET `notif_kerja`= 1 WHERE id_task = '$id'");
            redirect('admin/task');
        }

        function konfir_baca($id)
        {
            $this->t_aktifitas("konfir_baca", "notif sudah baca");

            $this->db->query("UPDATE `tb_task` SET `id_baca`= 1 WHERE id_task = '$id'");
            redirect('admin/task');
        }

        function v_e_task($id)
        {
            $this->t_aktifitas("v_e_task", "edit task");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_task' => $id,
            );

            $data["page"] = "v_e_task";
            $data["task"] = $this->m_admin->e_task($where, "tb_task")->result();
            $data["jabatan"] = $this->m_admin->tampil_jabatan()->result();
            $data["divisi"] = $this->m_admin->tampil_divisi()->result();
            $this->load->view('v_admin', $data);
        }

        function e_task()
        {
            $this->t_aktifitas("e_task","edit proses task");

            $id = $this->input->post('id_task');
            $id_jabatan = $this->input->post('id_jabatan');
            $id_registrasi = $this->input->post('id_registrasi');
            $id_divisi = $this->input->post('id_divisi');
            $id_karyawan = $this->input->post('id_karyawan');
            $keterangan = $this->input->post('keterangan');
            $tgl_penugasan = $this->input->post('tgl_penugasan');
            $tgl_selesai = $this->input->post('tgl_penyelesaian');

            $data = array(
                'id_jabatan' => $id_jabatan,
                'id_registrasi' => $id_registrasi,
                'id_divisi' => $id_divisi,
                'id_karyawan' => $id_karyawan,
                'keterangan' => $keterangan,
                'tgl_penugasan' => $tgl_penugasan,
                'tgl_penyelesaian' => $tgl_selesai
            );

            $where = array(
                'id_task' => $id
            );

            
            $dt = $this->m_admin->update_task($where, $data,"tb_task");
            echo json_encode($data);
            // redirect("admin/task");

            // $this->db->set($data);
            // $this->db->where('id_task', $where);
            // $this->db->update('tb_task');
        }

        function h_task($id)
        {
            $this->t_aktifitas("h_task","hapus task");

            $where = array(
                'id_task' => $id
            );

            $this->m_admin->h_task($where, "tb_task");
            redirect("admin/task");
        }

        function konfirProgress()
        {
            $uri3 = $this->uri->segment(3);
            $uri4 = $this->uri->segment(4); 
            if($uri3 == "progress"){
                $this->t_aktifitas("konfirProgress" , "konfir pekerjaan selesai");
                $this->m_admin->konfirProgress($uri4);
            }else{
                $this->t_aktifitas("konfirProgress" , "konfir pekerjaan Bermasalah");
                $this->m_admin->konfirMasalah($uri4);
            }
            
            redirect('admin/task');
        }

        function profil()
        {
            $this->t_aktifitas("profil", "tampil profil");
            
            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'tb_profil.id_registrasi' => $data["id_session"]
            );

            $data["profil"] = $this->m_admin->tampil_profil($where, "tb_profil")->result();
            $data["page"] = "profil";
            $this->load->view('v_admin', $data);
        }

        function v_t_profil()
        {
            $this->t_aktifitas("v_t_profil", "tambah profil");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["profil"] = $this->m_admin->tampil_profil()->result();
            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "v_t_profil";
            $this->load->view('v_admin', $data);

        }

        function t_profil()
        {
            $this->t_aktifitas("t_profil", "tambah proses profil");

            $profil = $this->input->post('profil');
            $nama = $this->input->post('nama_profil');
            $tpt_lahir = $this->input->post('tpt_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat_asal = $this->input->post('alamat_asal');
            $alamat_sekarang = $this->input->post('alamat_sekarang');
            $hobi = $this->input->post('hobi');
            $sts_perkawinan = $this->input->post('id_sts_perkawinan');
            $agama = $this->input->post('agama');

            $data = array(
                'profil' => $profil,
                'nama_profil' => $nama,
                'tpt_lahir' => $tpt_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat_asal' => $alamat_asal,
                'alamat_sekarang' => $alamat_sekarang,
                'hobi' => $hobi,
                'id_sts_perkawinan' => $sts_perkawinan,
                'agama' => $agama
            );

            $this->m_admin->input_profil($data, 'tb_profil');
            // $this->load->view('v_registrasi', $data);

            
            redirect('admin/profil');
        
        }

        function v_e_profil($id)
        {
            $this->t_aktifitas("v_e_profil", "edit profil");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_profil' => $id,
            );

            $data["page"] = "v_e_profil";
            $data["profil"] = $this->m_admin->e_profil($where, "tb_profil")->result();
            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();

            $this->load->view('v_admin', $data);
        }

        function e_profil()
        {
            $this->t_aktifitas("e_profil", "edit proses profil");

            $id = $this->input->post('id_profil');
            $profil = $this->input->post('profil');
            $nama = $this->input->post('nama_profil');
            $tpt_lahir = $this->input->post('tpt_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat_asal = $this->input->post('alamat_asal');
            $alamat_sekarang = $this->input->post('alamat_sekarang');
            $hobi = $this->input->post('hobi');
            $id_sts_perkawinan = $this->input->post('id_sts_perkawinan');
            $agama = $this->input->post('agama');

            $where = array(
                'id_profil' => $id
            );

            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 404800;
            $config['max_width']            = 404008;
            $config['max_height']           = 4048000;
         
            $this->load->library('upload', $config);
         
            $this->upload->do_upload('foto');
            
            $foto=$this->upload->data();
              $data = array(
                'profil' => $profil,
                'nama_profil' => $nama,
                'tpt_lahir' => $tpt_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat_asal' => $alamat_asal,
                'alamat_sekarang' => $alamat_sekarang,
                'hobi' => $hobi,
                'id_sts_perkawinan' => $id_sts_perkawinan,
                'agama' => $agama,
                'foto' => $foto['file_name']
            );
           
            $this->m_admin->update_profil($where, $data,"tb_profil");
            redirect("admin/profil");
        }

        function h_profil($id)
        {
            $this->t_aktifitas("h_profil", "hapus profil");

            $where = array(
                'id_profil' => $id
            );

            $this->m_admin->h_profil($where, "tb_profil");
            redirect("admin/profil");
        }

        function sts_kawin()
        {
            $this->t_aktifitas("sts_kawin", "tampil status pernikahan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $whereku = array(
                'tb_task.id_registrasi' => $data["id_session"]
            );

            $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();

            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "sts_kawin";
            $this->load->view('v_admin', $data);
        }

        function v_t_sts_kawin()
        {
            $this->t_aktifitas("v_t_sts_kawin", "tambah status pernikahan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $whereku = array(
                'tb_task.id_registrasi' => $data["id_session"]
            );

            $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();

            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "v_t_sts_kawin";
            $this->load->view('v_admin', $data);

        }

        function t_sts_kawin()
        {
            $this->t_aktifitas("t_sts_kawin", "tambah proses status pernikahan");

            $sts_kawin = $this->input->post('sts_kawin');

            $data = array(
                'sts_kawin' => $sts_kawin
            );

            $this->m_admin->input_sts_kawin($data, 'tb_sts_kawin');
            
            redirect('admin/sts_kawin');
            
        }

        function v_e_sts_kawin($id)
        {
            $this->t_aktifitas("v_e_sts_kawin", "edit status pernikahan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $whereku = array(
                'tb_task.id_registrasi' => $data["id_session"]
            );

            $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();

            $where = array(
                'id_sts_kawin' => $id,
            );

            $data["page"] = "v_e_sts_kawin";
            $data["sts_kawin"] = $this->m_admin->e_sts_kawin($where, "tb_sts_kawin")->result();
            $this->load->view('v_admin', $data);
        }

        function e_sts_kawin()
        {
            $this->t_aktifitas("e_sts_kawin", "edit proses status pernikahan");

            $id = $this->input->post('id_sts_kawin');
            $sts_kawin = $this->input->post('sts_kawin');

            $data = array(
                'sts_kawin' => $sts_kawin,
            );

            $where = array(
                'id_sts_kawin' => $id
            );

            $this->m_admin->update_sts_kawin($where, $data,"tb_sts_kawin");
            redirect("admin/sts_kawin");
        }

        function h_sts_kawin($id)
        {
            $this->t_aktifitas("h_ts_kawin", "hapus status pernikahan");

            $where = array(
                'id_sts_kawin' => $id
            );

            $this->m_admin->h_sts_kawin($where, "tb_sts_kawin");
            redirect("admin/sts_kawin");
        }

        function sts_pekerjaan()
        {
            $this->t_aktifitas("sts_pekerjaan", "tampil status pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["sts_pekerjaan"] = $this->m_admin->tampil_status()->result();
            $data["page"] = "sts_pekerjaan";
            $this->load->view('v_admin', $data);
        }

        function v_t_sts_pekerjaan()
        {
            $this->t_aktifitas("v_t_sts_pekerjaan","tambah status pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $data["page"] = "v_t_sts_pekerjaan";
            $this->load->view('v_admin', $data);

        }

        function t_sts_pekerjaan()
        {
            $this->t_aktifitas("t_sts_pekerjaan", "tambah proses status pekerjaan");

            $sts_pekerjaan = $this->input->post('sts_pekerjaan');

            $data = array(
                'nama_status' => $sts_pekerjaan
            );

            $this->m_admin->input_sts_pekerjaan($data, 'tb_status');
            
            redirect('admin/sts_pekerjaan');
            
        }

        function v_e_sts_pekerjaan($id)
        {
            $this->t_aktifitas("v_e_sts_pekerjaan","edit status pekerjaan");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where = array(
                'id_status' => $id,
            );

            $data["page"] = "v_e_sts_pekerjaan";
            $data["sts_pekerjaan"] = $this->m_admin->v_e_sts_pekerjaan($where, "tb_status")->result();
            $this->load->view('v_admin', $data);
        }

        function e_sts_pekerjaan()
        {
            $this->t_aktifitas("e_sts_pekerjaan","edit proses status pekerjaan");

            $id = $this->input->post('id_sts_pekerjaan');
            $nama_status = $this->input->post('sts_pekerjaan');

            $data = array(
                'nama_status' => $nama_status
            );

            $where = array(
                'id_status' => $id
            );

            $this->m_admin->update_sts_pekerjaan($where, $data,"tb_status");
            redirect("admin/sts_pekerjaan");
        }

        function h_sts_pekerjaan($id)
        {
            $this->t_aktifitas("h_sts_pekerjaan","hapus status pekerjaan");

            $where = array(
                'id_status' => $id
            );

            $this->m_admin->h_sts_pekerjaan($where, "tb_status");
            redirect("admin/sts_pekerjaan");
        }

        private function t_aktifitas($aktifitas, $aksi)
        {
            
            $uname_karyawan = $this->session->userdata('nama');
            $id_login = $this->session->userdata('id_login');
            foreach ($id_login as $id) {
                $id_log = $id->id_registrasi;
            }
            $waktu = date("Y-m-d h:i:sa");
            $aktif = base_url('admin/' . $aktifitas . '/'); 

            $data = array(
                'uname_aktifitas' => $uname_karyawan,
                'id_register_aktifitas' => $id_log,
                'waktu_aktifitas' => $waktu,
                'aktifitas' => $aktif,
                'aksi' => $aksi
            );

            $this->m_admin->input_aktifitas($data, 'tb_aktifitas');
            
            // redirect('admin/sts_pekerjaan');
        }
        

        function getAjaxKaryawan()
        {
            $this->t_aktifitas("getAjaxKaryawan", "tampil ajax karyawan");

            $id = $this->input->post("id_karyawan");
            $where = array(
                'id_karyawa' => $id
            );

            $data = $this->m_admin->getAjaxKaryawan($where, "tb_karyawan")->result();
            echo json_encode($data);

        }

        function aktifitas()
        {
            $this->t_aktifitas("tampil_aktifitas", "tampil aktifitas");
            $data["aktifitas"] = $this->m_admin->tampil_aktifitas()->result();
            $data["page"] = "aktifitas";
            $this->load->view('v_admin', $data);
        }

        function tampil_karyawan()
        {
            $this->t_aktifitas("tampil_karyawan", "tampil karyawan");

            $data = $this->m_admin->tampil_karyawan()->result();
            echo json_encode($data);
        }

        function getEditTaskJabatan()
        {
            $this->t_aktifitas("getEditTaskJabatan", "tampil data edit ajax taskJabatan");

            $data = $this->m_admin->tampil_jabatan()->result();
            echo json_encode($data);
        }

        function getEditTaskDivisi()
        {
            $this->t_aktifitas("getEditTaskDivisi", "tampil data edit ajax divisi");
            
            $id_jabatan = $this->input->post("e_id_jabatan");
            $where = array(
                'tb_jabatan.id_jabatan' => $id_jabatan
            );
            $data=$this->db
                ->join('tb_divisi','tb_jabatan.id_divisi=tb_divisi.id_divisi')
                ->get_where('tb_jabatan',$where)->result();
            echo json_encode($data);
        }

        function grafik()
        {
            $this->t_aktifitas("grafik", "tampil grafik");

            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }
            $data["page"] = "grafik";
            $data["taskGrafik2"] = $this->m_admin->tampil_grafik()->result();
            $data["taskGrafik"] = $this->db->query("SELECT * FROM tb_task WHERE progress = 1 GROUP BY tgl_penyelesaian")->result();
            $this->load->view('v_admin', $data);
        }

        function chat()
        {
            $this->t_aktifitas("chat", "tampil chat");
            $ii = $this->session->userdata("id_login");
            foreach($ii as $i) {
               $data["id_session"] = $i->id_registrasi;
            }

            $level_admin = $this->session->userdata("level");
            if($level_admin === 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                $data["view_task"] = $this->m_admin->view_task()->result();
                foreach ($data["view_task"] as $task) {
                    $task->id_baca; 
                    $whereku = array(
                        'tb_task.id_registrasi' => $data["id_session"],
                        'tb_task.id_baca' => 0
                    );
                    $data["task"] = $this->m_admin->tampil_task($whereku, "tb_task")->result();
                }
            }

            $where   = array(
                'tb_chat.id_from_reg'
            );

            $whereBales = array(
                'tb_chat.id_to_reg'
            );
            
            $data["chatBales"] = $this->m_admin->chat($where, "tb_chat")->result();
            $data["chat"] = $this->m_admin->chat($whereBales, "tb_chat")->result();
            
            $data["page"] = "chat";
            $this->load->view('v_admin', $data);
        }

        function laporan()
        {
            $this->t_aktifitas("laporan", "Download laporan");

            $tgl_penyelesaian = $this->input->post('tgl_penyelesaian');
            if($tgl_penyelesaian == 0){
                $data["task"] = $this->m_admin->get_task()->result();
            }else{
                
            $where = array(
                'tb_task.tgl_penyelesaian' => $tgl_penyelesaian
            );

            $data["task"] = $this->m_admin->downloadLaporan($where, "tb_task")->result();
            }

            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('v_laporan',$data, true);
            $mpdf->WriteHTML($html);
            $mpdf->setFooter('<div style="text-align: left; font-weight: bold; font-size: 8pt; font-style: italic;">
            Laporan Pekerjaan </div> {PAGENO}');
            $nama_dokumen = "Laporan Perusahaan" . date("Y-m-d H:i:s a");
            $mpdf->output($nama_dokumen.".pdf" ,'I');

        }
    }