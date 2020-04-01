<?php

    class Admin extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model("m_admin");
            $this->load->helper("url");
            if($this->session->userdata('status') != "login"){
                redirect(base_url("login"));
            }
        }

        function index()
        {
            $data["page"] = "home";
            $data["ses_uname"] = $this->session->userdata('nama');
            $this->load->view('v_admin', $data);
        }

        function registrasi()
        {
            $data["registrasi"] = $this->m_admin->tampil_registrasi()->result();
            $data["page"] = "Registrasi";
            $this->load->view('v_admin', $data);
        }

        function v_t_registrasi()
        {
            $data["karyawan"] = $this->m_admin->tampil_karyawan()->result();
            $data["page"] = "v_t_registrasi";
            $this->load->view('v_admin', $data);
        }

        function v_e_registrasi($id)
        {
            $where = array(
                'id_registrasi' => $id
            );
            $data["page"] = "v_e_registrasi";
            $data["registrasi"] = $this->m_admin->e_registrasi($where, "tb_registrasi")->result();
            $this->load->view('v_admin', $data);
        }

        function t_registrasi()
        {
            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $ttl = $this->input->post('ttl');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nip' => $nip,
                'nik' => $nik,
                'nama' => $nama,
                'ttl' => $ttl,
                'username' => $username,
                'password' => $password
            );

            $this->m_admin->input_registrasi($data, "tb_registrasi");
            redirect('admin/registrasi');
        }

        function e_registrasi()
        {
            $id = $this->input->post('id_registrasi');
            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $ttl = $this->input->post('ttl');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'nip' => $nip,
                'nik' => $nik,
                'nama' => $nama,
                'ttl' => $ttl,
                'username' => $username,
                'password' => $password
            );

            $where = array(
                'id_registrasi' => $id
            );
            
            $this->m_admin->update_registrasi($where, $data,"tb_registrasi");
            redirect("admin/registrasi");
        }

        function h_registrasi($id)
        {
            $where = array(
                'id_registrasi' => $id
            );

            $this->m_admin->h_registrasi($where, "tb_registrasi");
            redirect("admin/registrasi");
        }

        function jabatan()
        {
            $data["jabatan"] = $this->m_admin->jabatanDivisi();
            $data["page"] = "Jabatan";
            $this->load->view('v_admin', $data);
        }

        function v_t_jabatan()
        {
            
            $data["page"] = "v_t_jabatan";
            $data["id_divisi"] = $this->m_admin->tampil_divisi()->result();
            $this->load->view('v_admin', $data);
        }

        function v_e_jabatan($id)
        {

            $where = array(
                'id_jabatan' => $id
            );

            $data["page"] = "v_e_jabatan";
            $data["jabatan"] = $this->m_admin->e_jabatan($where, "tb_jabatan")->result();
            $this->load->view('v_admin', $data);
        }

        function t_jabatan()
        {
            $jabatan = $this->input->post('jabatan');
            $id_divisi = $this->input->post('id_divisi');

            $data = array(
                'jabatan' => $jabatan,
                'id_divisi'=> $id_divisi
            );

            $this->m_admin->input_jabatan($data, "tb_jabatan");
            redirect('admin/jabatan');
        }

        function e_jabatan()
        {
            $id = $this->input->post('id_jabatan');
            $jabatan = $this->input->post('jabatan');

            $data = array(
                'jabatan' => $jabatan
            );

            $where = array(
                'id_jabatan' => $id
            );
            
            $this->m_admin->update_jabatan($where, $data,"tb_jabatan");
            redirect("admin/jabatan");
        }

        function h_jabatan($id)
        {
            $where = array(
                'id_jabatan' => $id
            );

            $this->m_admin->h_jabatan($where, "tb_jabatan");
            redirect("admin/jabatan");
        }

        function getAjaxDivisi()
        {
            $id_jabatan = $this->input->post("id_jabatan");
            $where = array(
                'tb_jabatan.id_jabatan' => $id_jabatan
            );
            $data=$this->db
                ->join('tb_divisi','tb_jabatan.id_divisi=tb_divisi.id_divisi')
                ->get_where('tb_jabatan',$where)->result();
            echo json_encode($data);
        }

        function divisi()
        {
            $data["divisi"] = $this->m_admin->tampil_divisi()->result();
            $data["page"] = "Divisi";
            $this->load->view('v_admin', $data);
        }

        function v_t_divisi()
        {
            $data["page"] = "v_t_divisi";
            $this->load->view('v_admin', $data);
        }

        function t_divisi()
        {
            $divisi = $this->input->post('divisi');
            $data = array(
                'divisi' => $divisi
            );

            $this->m_admin->input_divisi($data, 'tb_divisi');
            
            redirect('admin/divisi');
            
        }

        function v_e_divisi($id)
        {
            $where = array(
                'id_divisi' => $id
            );

            $data["page"] = "v_e_divisi";
            $data["divisi"] = $this->m_admin->e_divisi($where, "tb_divisi")->result();
            $this->load->view('v_admin', $data);

        }

        function h_divisi($id)
        {
            $where = array(
                'id_divisi' => $id
            );

            $this->m_admin->h_divisi($where, "tb_divisi");
            redirect("admin/divisi");
        }

        function e_divisi()
        {
            $id = $this->input->post('id_divisi');
            $divisi = $this->input->post('divisi');
            // echo $divisi; die();

            $data = array(
                'divisi' => $divisi
            );

            $where = array(
                'id_divisi' => $id
            );
            // print_r($data); die();
            $this->m_admin->update_divisi($where, $data,"tb_divisi");
            redirect("admin/divisi");
        }

        function pekerjaan()
        {
            $data["pekerjaan"] = $this->m_admin->pekerjaanStatus();
            $data["page"] = "pekerjaan";
            $this->load->view('v_admin', $data);
        }

        function v_t_pekerjaan()
        {
            $data["status"] = $this->m_admin->tampil_status()->result();
            $data["page"] = "v_t_pekerjaan";
            $this->load->view('v_admin', $data);

        }

        function v_e_pekerjaan($id)
        {
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
            $pekerjaan = $this->input->post('pekerjaan');
            $status = $this->input->post('status');
            $data = array(
                'pekerjaan' => $pekerjaan,
                'status_pekerjaan' => $status
            );

            $this->m_admin->input_pekerjaan($data, 'tb_pekerjaan');
            
            redirect('admin/pekerjaan');
            
        }

        function e_pekerjaan()
        {
            $id = $this->input->post('id_pekerjaan');
            $pekerjaan = $this->input->post('pekerjaan');
            $status = $this->input->post('status');

            $data = array(
                'id_pekerjaan' => $id,
                'pekerjaan' => $pekerjaan,
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
            $where = array(
                'id_pekerjaan' => $id
            );

            $this->m_admin->h_pekerjaan($where, "tb_pekerjaan");
            redirect("admin/pekerjaan");
        }

        function task()
        {
            $data["task"] = $this->m_admin->tampil_task()->result();
            $data["page"] = "task";
            $this->load->view('v_admin', $data);
        }

        function v_t_task()
        {
            // $data["task"] = $this->m_admin->tampil_task()->result();
            // $data["jabatan"] = $this->m_admin->tampil_jabatan()->result();
            // $data["page"] = "v_t_task";
            // $this->load->view('v_admin', $data);
            $data = $this->m_admin->tampil_jabatan()->result();
            echo json_encode($data);

        }

        function t_task()
        {
            $id_divisi = $this->input->post('id_divisi');
            $id_karyawan = $this->input->post('id_karyawan');
            $tgl_penugasan = $this->input->post('tgl_penugasan');

            $data = array(
                'id_divisi' => $id_divisi,
                'id_karyawan' => $id_karyawan,
                'tgl_penugasan' => $tgl_penugasan
            );

            $this->m_admin->input_task($data, 'tb_task');
            
            redirect('admin/task');
            
        }

        function v_e_task($id)
        {
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
            $id = $this->input->post('id_task');
            $id_divisi = $this->input->post('id_divisi');
            $id_karyawan = $this->input->post('id_karyawan');
            $tgl_penugasan = $this->input->post('tgl_penugasan');

            $data = array(
                'id_divisi' => $id_divisi,
                'id_karyawan' => $id_karyawan,
                'tgl_penugasan' => $tgl_penugasan
            );

            $where = array(
                'id_task' => $id
            );

            $this->m_admin->update_task($where, $data,"tb_task");
            redirect("admin/task");
        }

        function h_task($id)
        {
            $where = array(
                'id_task' => $id
            );

            $this->m_admin->h_task($where, "tb_task");
            redirect("admin/task");
        }

        function profil()
        {
            $data["profil"] = $this->m_admin->tampil_profil()->result();
            $data["page"] = "profil";
            $this->load->view('v_admin', $data);
        }

        function v_t_profil()
        {
            $data["profil"] = $this->m_admin->tampil_profil()->result();
            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "v_t_profil";
            $this->load->view('v_admin', $data);

        }

        function t_profil()
        {
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
            
            redirect('admin/profil');
            
        }

        function v_e_profil($id)
        {
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

            $data = array(
                'profil' => $profil,
                'nama_profil' => $nama,
                'tpt_lahir' => $tpt_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat_asal' => $alamat_asal,
                'alamat_sekarang' => $alamat_sekarang,
                'hobi' => $hobi,
                'id_sts_perkawinan' => $id_sts_perkawinan,
                'agama' => $agama
            );

            $where = array(
                'id_profil' => $id
            );

            $this->m_admin->update_profil($where, $data,"tb_profil");
            redirect("admin/profil");
        }

        function h_profil($id)
        {
            $where = array(
                'id_profil' => $id
            );

            $this->m_admin->h_profil($where, "tb_profil");
            redirect("admin/profil");
        }

        function sts_kawin()
        {
            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "sts_kawin";
            $this->load->view('v_admin', $data);
        }

        function v_t_sts_kawin()
        {
            $data["sts_kawin"] = $this->m_admin->tampil_sts_kawin()->result();
            $data["page"] = "v_t_sts_kawin";
            $this->load->view('v_admin', $data);

        }

        function t_sts_kawin()
        {
            $sts_kawin = $this->input->post('sts_kawin');

            $data = array(
                'sts_kawin' => $sts_kawin
            );

            $this->m_admin->input_sts_kawin($data, 'tb_sts_kawin');
            
            redirect('admin/sts_kawin');
            
        }

        function v_e_sts_kawin($id)
        {
            $where = array(
                'id_sts_kawin' => $id,
            );

            $data["page"] = "v_e_sts_kawin";
            $data["sts_kawin"] = $this->m_admin->e_sts_kawin($where, "tb_sts_kawin")->result();
            $this->load->view('v_admin', $data);
        }

        function e_sts_kawin()
        {
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
            $where = array(
                'id_sts_kawin' => $id
            );

            $this->m_admin->h_sts_kawin($where, "tb_sts_kawin");
            redirect("admin/sts_kawin");
        }

        function getAjaxKaryawan()
        {
            $id = $this->input->post("id_karyawan");
            $where = array(
                'id_karyawan' => $id
            );

            $data = $this->m_admin->getAjaxKaryawan($where, "tb_registrasi")->result();
            echo json_encode($data);

        }

        function tampil_karyawan()
        {
            $data = $this->m_admin->tampil_karyawan()->result();
            echo json_encode($data);
        }

        function getEditTaskJabatan()
        {
            $data = $this->m_admin->tampil_jabatan()->result();
            echo json_encode($data);
        }

        function getEditTaskDivisi()
        {
            $id_jabatan = $this->input->post("e_id_jabatan");
            $where = array(
                'tb_jabatan.id_jabatan' => $id_jabatan
            );
            $data=$this->db
                ->join('tb_divisi','tb_jabatan.id_divisi=tb_divisi.id_divisi')
                ->get_where('tb_jabatan',$where)->result();
            echo json_encode($data);
        }
    }