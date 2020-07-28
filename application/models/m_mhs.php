<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_model{

        public function tampildata()
    {
        return $this->db->get('form_mahasiswa');
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

    public function detail_data($id_mhs = NULL)
    {
         $query = $this->db->get_where('form_mahasiswa', array('id_mhs' => $id_mhs))->row();
         return $query;
    }
    

   public function selesai()
    {
         $this->db->where($where);
         $this->db->get('form_mahasiswa');
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('form_mahasiswa');
        $this->db->like('nama_mahasiswa', $keyword);
        $this->db->or_like('NPM' , $keyword);
        $this->db->or_like('semester' , $keyword);
        return $this->db->get()->result();
    }

    public function getdata($table)
    {
      $this->db->select('*');
      $this->db->from($table);
      $query = $this->db->get();
      return $query;
    }
}

//     public function get_all()
//     {
//         $query = $this->db->select("*")
//                  ->from('form_mahasiswa')
//                  ->order_by('id_mhs', 'DESC')
//                  ->get();
//         return $query->result();
//     }

//     public function simpan($data)
//     {

//         $query = $this->db->insert("form_mahasiswa", $data);

//         if($query){
//             return true;
//         }else{
//             return false;
//         }

//     }

//     public function edit($id_mhs)
//     {

//         $query = $this->db->where("id_mhs", $id_mhs)
//                 ->get("form_mahasiswa");

//         if($query){
//             return $query->row();
//         }else{
//             return false;
//         }

//     }

//     public function update($data, $id_mhs)
//     {

//         $query = $this->db->update("form_mahasiswa", $data, $id_mhs);

//         if($query){
//             return true;
//         }else{
//             return false;
//         }

//     }

//     public function delete($id_mhs)
//     {

//         $query = $this->db->delete("form_mahasiswa", $id_mhs);

//         if($query){
//             return true;
//         }else{
//             return false;
//         }

//     }
// }
