<?php
    class M_login extends CI_Model
    {
        function cek_login($table, $where)
        {
            return $this->db->get_where($where,$table);
        }

        function id_ses_log($table, $where)
        {
            return $this->db->get_where($table,$where);
        }
    }
?>