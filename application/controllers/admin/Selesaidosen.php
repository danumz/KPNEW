 <?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Selesaidosen extends CI_Controller 
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

    $data['title'] = 'Dosen';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['datadosen'] = $this->m_dosen->getwhere('status',1,'form_dosen')->result();
    // if ($this->session->userdata('mahasiswa')== TRUE) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
       $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_selesaidosen',$data);
        $this->load->view('templates/footer');

    // }else{
    //     redirect('admin/data_dosen');
    //         }


    // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data telah selesai dikerjakan</div>');
    //     redirect('admin/Form_dosen');

        
}
  public function hapus($id_dosen)
{
    $where = array ('id_dosen' => $id_dosen);
    $this->m_mhs->hapus_data($where, 'form_dosen');
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil dihapus</div>');
    redirect('admin/selesaidosen');
   
}
public function download($nama)
{

        $name = $nama;
        $data = file_get_contents('assets/files/'.$nama);
        force_download($name, $data);
        
}
}