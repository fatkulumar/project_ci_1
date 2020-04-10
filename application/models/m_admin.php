<?php

    class M_admin extends CI_Model
    {
        function  __construct()
        {
            $this->load->database();
        }

        function cek_login($table, $where)
        {
            return $this->db->get_where($table,$where);
        }

        function hitung_notif($table, $where)
        {
            $this->db->select('*');
            $this->db->from('tb_registrasi r');
            $this->db->join('tb_task t', 't.id_karyawan = r.id_karyawan');
            $query = $this->db->get_where($where, $table);
            return $query->num_rows();

            // $query = $this->db->query("SELECT * FROM tb_task");
            // return $query->num_rows();
        }

        function input_divisi($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function tampil_divisi()
        {
            return $this->db->get('tb_divisi');
        }

        function h_divisi($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function e_divisi($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function update_divisi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function input_jabatan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function tampil_jabatan()
        {
            return $this->db->get("tb_jabatan");
        } 

        function e_jabatan($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_jabatan($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_jabatan($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function input_registrasi($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function get_registrasi($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function tampil_registrasi()
        {
            $this->db->select('*');
            $this->db->from('tb_karyawan k');
            $this->db->join('tb_registrasi r', 'k.id_karyawa = r.id_karyawan', 'right');    
            // $this->db->join('tb_divisi d', 'd.id_divisi = k.id_divisi', 'left');
            // $this->db->join('tb_pekerjaan p', 'p.id_pekerjaan = k.id_pekerjaan', 'left');
            $query = $this->db->get();
            return $query;
            // return $this->db->get("tb_registrasi");
        }

        function registrasiKaryawan()
        {
            $this->db->select('*');
            $this->db->from('tb_registrasi r');
            $this->db->join('tb_karyawan k', 'r.id_karyawan = k.id_karyawa');
            $query = $this->db->get();
            return $query;
        }

        function view_registrasi()
        {
            return $this->db->get();
        }

        function e_registrasi($where, $table)
        {
            return $this->db->get_where($table,$where);
        }

        function h_registrasi($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_registrasi($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function input_login($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function jabatanDivisi()
        {
            $this->db->select('*');
            $this->db->from('tb_jabatan');
            $this->db->join('tb_divisi', 'tb_divisi.id_jabatan = tb_jabatan.id_jabatan','right');
            $query = $this->db->get();
            return $query->result();
        }

        function jabatanKaryawan()
        {
            $this->db->select('*');
            $this->db->from('tb_jabatan j');
            $this->db->join('tb_karyawan k', 'k.id_jabatan = j.id_jabatan', 'inner');
            $query = $this->db->get();
            return $query->result();
        }

        // function regKar($where, $table)
        // {
        //     $this->db->select('*');
        //     $this->db->from('tb_registrasi r');
        //     $this->db->join('tb_karyawan k', 'k.id_karyawa = r.id_karyawan');
        //     $query = $this->db->get_where($table, $where);
        //     // $query = $this->db->get();
        //     return $query->result();
        // }

        function tampil_pekerjaan()
        {
            return $this->db->get("tb_pekerjaan");
        }

        function input_pekerjaan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function e_pekerjaan($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_pekerjaan($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_pekerjaan($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function karyawan()
        {
            $this->db->select('*');
            $this->db->from('tb_karyawan k');
            $this->db->join('tb_jabatan j', 'k.id_jabatan = j.id_jabatan', 'left');    
            $this->db->join('tb_divisi d', 'd.id_divisi = k.id_divisi', 'left');
            $this->db->join('tb_pekerjaan p', 'p.id_pekerjaan = k.id_pekerjaan', 'left');
            $query = $this->db->get();
            return $query;
            // return $this->db->get("tb_karyawan");
        }

        function v_e_karyawan($where, $table)
        {
            // $this->db->select('*');
            // $this->db->from('tb_karyawan k');
            // $this->db->join('tb_jabatan j', 'k.id_jabatan = j.id_jabatan', 'left');    
            // $this->db->join('tb_divisi d', 'd.id_divisi = k.id_divisi', 'left');
            // $this->db->join('tb_pekerjaan p', 'p.id_pekerjaan = k.id_pekerjaan','left');
            // $query = $this->db->get_where($table,$where);
            // return $query->result();
            return $this->db->get_where($table,$where);
        }

        
        function input_karyawan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function e_karyawan($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_karyawan($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_karyawan($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function karyawanStatus()
        {
            $this->db->select('*');
            $this->db->from('tb_karyawan p');
            $this->db->join('tb_status s', 'p.status_karyawan = s.id_status', 'left');    
            $this->db->join('tb_karyawan k', 'p.id_karyawan = k.id_karyawan', 'left');
            $query = $this->db->get();
            return $query->result();
        }

        function pekerjaanStatus()
        {
            $this->db->select('*');
            $this->db->from('tb_pekerjaan p');
            $this->db->join('tb_status s', 'p.status_pekerjaan = s.id_status', 'left');    
            $this->db->join('tb_pekerjaan k', 'p.id_pekerjaan = k.id_pekerjaan', 'left');
            $query = $this->db->get();
            return $query->result();
        }

        function tampil_status()
        {
            return $this->db->get("tb_status");
        }

        function input_sts_pekerjaan($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function v_e_sts_pekerjaan($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function update_sts_pekerjaan($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function h_sts_pekerjaan($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function tampil_task($where, $table)
        {
            // $this->db->select('*');
            // $this->db->from('tb_task t');
            // $this->db->join('tb_divisi d', 't.id_divisi = d.id_divisi');
            // $this->db->join('tb_karyawan k', 't.id_karyawan = k.id_karyawa');
            // $this->db->join('tb_pekerjaan p', 't.id_pekerjaan = p.id_pekerjaan');
            // $query = $this->db->get_where($table, $where);
            // return $query;

            return $this->db
                ->join('tb_divisi','tb_divisi.id_divisi=tb_task.id_divisi')
                ->join('tb_karyawan','tb_karyawan.id_karyawa=tb_task.id_karyawan')
                ->join('tb_pekerjaan','tb_pekerjaan.id_pekerjaan=tb_task.id_pekerjaan')
                ->get_where('tb_task',$where);
        }

        function get_task()
        {
            $this->db->select('*');
            $this->db->from('tb_task t');
            $this->db->join('tb_divisi d', 't.id_divisi = d.id_divisi');
            $this->db->join('tb_karyawan k', 't.id_karyawan = k.id_karyawa');
            $this->db->join('tb_pekerjaan p', 't.id_pekerjaan = p.id_pekerjaan');
            $query = $this->db->get();
            return $query;
        }

        function view_task()
        {
            return $this->db->get("tb_task");
        }

        function input_task($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function e_task($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_task($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function konfirProgress($id)
        {
            $this->db->query("UPDATE `tb_task` SET `progress`= 1 WHERE id_task = $id");
        }

        function update_task($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function karyawanDevisiTgl()
        {
            $this->db->select('*');
            $this->db->from('tb_task t');
            $this->db->join('tb_divisi d', 'tb_pekerjaan.status_pekerjaan = tb_status.status');
            $query = $this->db->get();
            return $query->result();
        }

        function tampil_profil($where, $table)
        {
            // $this->db->select('*');
            // $this->db->from('tb_profil p');
            // $this->db->join('tb_sts_kawin s', 's.id_sts_kawin = p.id_sts_perkawinan', 'right');
            // $query = $this->db->get_where($table,$where);
            // return $query;

            return $this->db->get_where($table, $where);
        }

        function input_profil($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function e_profil($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_profil($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_profil($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function tampil_sts_kawin()
        {
            return $this->db->get("tb_sts_kawin");
        }

        function input_sts_kawin($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function e_sts_kawin($table, $where)
        {
            return $this->db->get_where($where, $table);
        }

        function h_sts_kawin($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_sts_kawin($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function tampil_aktifitas()
        {
            return $this->db->get("tb_aktifitas");
        }

        function tampil_karyawan()
        {
            return $this->db->get("tb_karyawan");
        }

        function input_aktifitas($data, $table)
        {
            $this->db->insert($table, $data);
        }

        function getAjaxKaryawan($table,$where)
        {
            return $this->db->get_where($where, $table);
        }
    }