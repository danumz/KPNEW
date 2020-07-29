<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Dosen extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
   if (!$this->session->userdata('email')) {
            redirect('auth');
		$this->load->model('dosen_m');
}
}

	public function index()
	{
		
		$data['title'] = 'Halaman Form Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['surat'] = $this->db->get_where('surat', ['nama_surat' => $this->session->userdata('nama_surat')])->row_array();



        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
		$this->load->view('user/f_dosen',$data);
		$this->load->view('templates/footer');
		

}


public function tambah()
    {
        $nama_dosen     = $this->input->post('nama_dosen');
        $NIK            = $this->input->post('NIK');
        $kebutuhan      = $this->input->post('kebutuhan');
        $keperluan      = $this->input->post('keperluan');
        $file    = $_FILES['file'];
        if ($file=''){}else{
            $config['upload_path'] = './assets/files';
            $config['allowed_types'] = 'pdf|docx|doc';

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')) {
                echo "Upload File Gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }

        }

   
           $last = $this->dosen_m->lastid2();
            $id_dosen = $last + 1;
        $data = array
        (
            'id_dosen'=>$id_dosen,
            'user_id'=>$this->session->userdata('id_user'),
            'nama_dosen'     => $nama_dosen,
            'NIK'            => $NIK,
            'kebutuhan'      => $kebutuhan,
            'keperluan'      => $keperluan,
            'file'           => $file,

        );

        $datanotif = array(
            'nama' => $this->input->post('nama_dosen'),
            'pesan' => $this->input->post('kebutuhan'),
            'user_id'=>$this->session->userdata('id_user'),
            'dosen_id'=>$id_dosen
        );

         $this->db->insert('notif', $datanotif);


        // $this->db->insert('notif',array('user_id'=>$this->session->userdata('id_user')));
        
        $this->dosen_m->input_data($data,'form_dosen');
         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Permintaan berhasil dikirim.</div>');

        redirect('user/H_dosen');


  }
  public function download($nama)
{

        $name = $nama;
        $data = file_get_contents('assets/file_dosen/'.$nama);
        force_download($name, $data);

}







	 
}