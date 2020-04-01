<?php

    class M_admin extends CI_Model
    {
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

        function tampil_registrasi()
        {
            return $this->db->get("tb_registrasi");
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

        function jabatanDivisi()
        {
            $this->db->select('*');
            $this->db->from('tb_jabatan');
            $this->db->join('tb_divisi', 'tb_divisi.id_divisi = tb_jabatan.id_divisi');
            $query = $this->db->get();
            return $query->result();
        }

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

        function pekerjaanStatus()
        {
            $this->db->select('*');
            $this->db->from('tb_pekerjaan p');
            $this->db->join('tb_status s', 'p.status_pekerjaan = s.status');
            $query = $this->db->get();
            return $query->result();
        }

        function tampil_status()
        {
            return $this->db->get("tb_status");
        }

        function tampil_task()
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

        function tampil_profil()
        {
            return $this->db->get("tb_profil");
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

        function tampil_karyawan()
        {
            return $this->db->get("tb_karyawan");
        }

        function getAjaxKaryawan($table,$where)
        {
            return $this->db->get_where($where, $table);
        }
    }