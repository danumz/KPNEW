 <?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Selesaimhs extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
            is_logged_in();
             $this->load->model('m_mhs');

   }

            // $this->load->library('form_validation');
        
        
      public function index()
    {

    $data['title'] = 'Mahasiswa';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     // $data['selesaimahasiswa'] = $this->m_mahasiswa->selesai()->result();

      $data['datamhs'] = $this->m_mhs->getwhere('status',1,'form_mahasiswa')->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
       $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_selesaimhs',$data);
        $this->load->view('templates/footer');


    // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data telah selesai dikerjakan</div>');
    //     redirect('admin/Form_mahasiswa');

        
}

  public function hapus($id_mhs)
{
    $where = array ('id_mhs' => $id_mhs);
    $this->m_mhs->hapus_data($where, 'form_mahasiswa');
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil dihapus</div>');
    redirect('admin/selesaimhs');
   
}
}
