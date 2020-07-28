 <?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Form_dosen extends CI_Controller 
{
        public function __construct()
    {
        parent::__construct();
            is_logged_in();
            $this->load->model('m_dosen');
   }

            // $this->load->library('form_validation');
        
        

      public function index()
    {
        $data['title'] = 'Form Dosen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       $data['form_dosen'] = $this->m_dosen->getwhere('status',0,'Form_dosen')->result();

        $data['dd1'] = $this->m_dosen->getwhere('status',0,'form_dosen')->num_rows();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
         $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_dosen',$data);
        $this->load->view('templates/footer');
    }
       
public function tambah()
    {
        $config['upload_path']          = 'assets/files/';
        $config['allowed_types']        = 'pdf|docx|doc';
        $config['max_size']             = 2048;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload())
        {
            redirect('admin/data_dosen');
        }
        else
        {
            $file = $this->upload->data();
        $nama_dosen           = $this->input->post('nama_dosen');
        $NIK            = $this->input->post('NIK');
        $kebutuhan      = $this->input->post('kebutuhan');
        $keperluan      = $this->input->post('keperluan');


        $data = array
        (
            'nama_dosen'     => $nama_dosen,
            'NIK'            => $NIK,
            'kebutuhan'      => $kebutuhan,
            'keperluan'      => $keperluan,
            'file'           => $file,

        );
        $this->m_dosen->input_data($data,'form_dosen');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil ditambah</div>');
        redirect('admin/Form_dosen');

    }
}

public function hapus($id_dosen)
{
    $where = array ('id_dosen' => $id_dosen);
    $this->m_dosen->hapus_data($where, 'form_dosen');
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil di Hapus</div>');
    redirect('admin/Form_dosen');
}


// public function update()
// {
//     $id_dosen        = $this->input->post('id_dosen');
//     $nama_dosen = $this->input->post('nama_dosen');
//     $tempat_lahir   = $this->input->post('tempat_lahir');
//     $tanggal_lahir  = $this->input->post('tanggal_lahir');
//     $NIM            = $this->input->post('NIM');
//     $kebutuhan      = $this->input->post('kebutuhan');
//     $keperluan      = $this->input->post('keperluan');
//     $catatan        = $this->input->post('catatan');
//     $file = $this->input->post('file');
 
//     $data = array 
//         (
//             'nama_dosen'     => $nama_dosen,
//             'NIM'            => $NIM,
//             'kebutuhan'      => $kebutuhan,
//             'keperluan'      => $keperluan,
//             'catatan'        => $catatan,
//             'file'           => $file,

//         );
//         $where = array
//         (
//             'id_dosen' => $id_dosen
//         );

//         $this->m_dosen->update_data($where,$data,'form_dosen');
//         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil diupdate</div>');
//         redirect('admin/Form_dosen');
// }

 public function detail($id_dosen)
    {
        $this->load->model('m_dosen');
        $detail = $this->m_dosen->detail_data($id_dosen);
        $data['title'] = 'Detail Data Dosen';
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $data['detail'] = $detail;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
         $this->load->view('templates/topbar',$data);
        $this->load->view('admin/detail_dosen',$data);
        $this->load->view('templates/footer');
        
}

// public function print()
// {
//     $data['form_dosen'] = $this->m_dosen->tampildata('form_dosen')->result();
//     $this->load->view('admin/dosen/print_dosen',$data);
// }

public function download($nama)
{

        $name = $nama;
        $data = file_get_contents('assets/files/'.$nama);
        force_download($name, $data);

    //     $this->load->library('zip'); //untuk mengkonversi kedalam zip
    //     $file_path = 'assets/files/';
    //     $zip_file_name ='Download';
    //     $selected_files = $_POST['files'];
    //     foreach($selected_files as $key=>$file)
    // {
    //     $this->zip->read_file($file_path.$file);
    // }
    // $this->zip->download($zip_file_name);
  

    // force_download('assets/files/surat.docx', NULL);
    // redirect('admin/data_dosen');

}
public function dosen_selesai()
    {

    $data['title'] = 'Data Selesai';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
$data = $this->input->post();
$update = array(
'status' => $this->input->post('status')
);
$this->m_dosen->update('id_dosen',$data['id'],$update,'form_dosen');
$this->m_dosen->update('dosen_id',$data['id'],$update,'notif');
    echo json_encode('success');

    // $id_dosen = $this->input->post('id_dosen');
    // $where   = array('id_dosen' => $id_dosen);
    // $data    = $this->input->post();
    // unset($data['id_dosen']);
 
    // $this->m_dosen->update($where,$data,'form_dosen');
    // redirect('admin/form_dosen');
}

public function cektotal1()
{
    $data = $this->m_dosen->getwhere('status',0,'form_dosen')->num_rows();
    // print_r($data); 
    echo json_encode($data);
}

public function cekseluruh1()
{
    $data = $this->m_dosen->getwhere('status',0,'form_dosen')->row_array();
    // print_r($data); 
    echo json_encode($data);
}


}