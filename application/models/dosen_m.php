<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_m  extends CI_Model
{
      public function tampildata($limit,$start)
    {
        return $this->db->get('form_dosen', $limit,$start);
    }

    public function input_data($data,$table)
    {
         $this->db->insert($table,$data);
    }


    public function lastid2()
    {
        $this->db->select('id_dosen');
        $this->db->order_by('id_dosen', 'ASC');
        $q= $this->db->get('form_dosen')->last_row();
        if (!isset($q)) {
            return 0;
        }else{
            return $q->id_dosen;
        }

    }
    
}





    // private $form_dosen = "form_dosen";

    // public $nama_dosen;
    // public $NIK;
    // public $kebutuhan;
    // public $keperluan;
    // public $file;


    // public function rules()
    // {

    // }

    // public function getAll()
    // {
    //     return $this->db->get('form_dosen')->result();
    // }
    
    // public function getById($id)
    // {
    //     return $this->db->get_where($this->form_dosen, ["id_dosen" => $id])->row();
    // }

    // public function save()
    // {
    //     $data = [
    //         'nama_dosen' => $this->input->post('nama_dosen'),
    //         'NIK' => $this->input->post('NIK'),
    //         'kebutuhan' => $this->input->post('kebutuhan'),
    //         'keperluan' => $this->input->post('keperluan'),
    //         'file' => $this->input->post('file'),
    //     ];
    //     $input = $this->db->insert($this->form_dosen, $data);
    //     return $input;
    // }


    // public function update()
    // {
    //     $data = [
    //         'nama_dosen' => $this->input->post('nama_dosen'),
    //         'NIK' => $this->input->post('NIK'),
    //         'kebutuhan' => $this->input->post('kebutuhan'),
    //         'keperluan' => $this->input->post('keperluan'),
    //         'file' => $this->input->post('file'),
    //     ];
    //     $input = $this->db->update($this->form_dosen, $data);
    //     return $input;
    // }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->form_dosen, array("id_dosen" => $id));
    // }
