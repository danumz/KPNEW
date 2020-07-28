<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_model{

    public function tampildata()
    {
        return $this->db->get('form_dosen');
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

    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function getwhere($field,$where,$table)
    {
      $this->db->where($field,$where);
      $query = $this->db->get($table);
      return $query; 
    }

    public function update($field,$where,$data,$table)
    {
        $this->db->where($field,$where);
        $this->db->update($table,$data);
    }


    public function detail_data($id_dosen = NULL)
    {
         $query = $this->db->get_where('form_dosen', array('id_dosen' => $id_dosen))->row();
         return $query;
    }

    public function download($id_dosen){
  $query = $this->db->get_where('Form_dosen',array('id_dosen'=>$id_dosen));
  return $query->row_array();
 }


    public function selesai($where)
    {
        // return $this->db->get_where('form_dosen',array('id_dosen'=>$id_dosen))->row();
      $this->db->where($where);
         $this->db->get('form_dosen')->row();
    }

    public function getdata($table)
    {
      $this->db->select('*');
      $this->db->from($table);
      $query = $this->db->get();
      return $query;
    }



}