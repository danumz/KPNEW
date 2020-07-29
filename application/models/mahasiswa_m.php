<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_m extends CI_Model
{



    public function tampildata()
    {
        return $this->db->get('form_mahasiswa');
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function lastid()
    {
        $this->db->select('id_mhs');
        $this->db->order_by('id_mhs', 'ASC');
        $q = $this->db->get('form_mahasiswa')->last_row();
        if (!isset($q)) {
            return 0;
        } else {
            return $q->id_mhs;
        }
    }
}


//     private $form_mahasiswa = "form_mahasiswa";

//     public $nama_mahasiswa;
//     public $tempat_lahir;
//     public $tanggal_lahir;
//     public $NPM;
//     public $semester;
//     public $kebutuhan;
//     public $keperluan;
   
    
    

//     public function rules()
//     {

//     }

//     public function getAll()
//     {
//         return $this->db->get($this->form_mahasiswa)->result();
//     }
    
//     public function getById($id)
//     {
//         return $this->db->get_where($this->form_mahasiswa, ["no_urut" => $id])->row();
//     }

//     public function save()
//     {
//         $data = [
//             'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
//             'tempat_lahir' => $this->input->post('tempat_lahir'),
//             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
//             'NPM' => $this->input->post('NPM'),
//             'semester' => $this->input->post('semester'),
//             'kebutuhan' => $this->input->post('kebutuhan'),
//             'keperluan' => $this->input->post('keperluan'),
         
//         ];
//         $input = $this->db->insert($this->form_mahasiswa, $data);
//         return $input;
//     }


//     public function update()
//     {
//         $data = [
//             'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
//             'tempat_lahir' => $this->input->post('tempat_lahir'),
//             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
//             'NPM' => $this->input->post('NPM'),
//             'semester' => $this->input->post('semester'),
//             'kebutuhan' => $this->input->post('kebutuhan'),
//             'keperluan' => $this->input->post('keperluan'),
           
           
          
//         ];
//         $input = $this->db->update($this->form_mahasiswa, $data);
//         return $input;
//     }

//     public function delete($id)
//     {
//         return $this->db->delete($this->form_mahasiswa, array("no_urut" => $id));
//     }
// }
