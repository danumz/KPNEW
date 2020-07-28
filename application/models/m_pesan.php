<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_model{


    	  public function tampildata()
    {
    	$query = $this->db->select("*")
        ->from('memo')
        ->order_by('id_memo', 'DESC')
        ->get();
        return $query->result();
    }

    public function input_data($data,$table)
    {
         $this->db->insert($table,$data);
    }

    public function hapus_data($where,$table)
    {
         $this->db->where($where);
         $this->db->delete($table);
    }

}