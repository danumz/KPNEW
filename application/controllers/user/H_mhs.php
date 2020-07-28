<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class H_mhs extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
		  if (!$this->session->userdata('email')) {
            redirect('auth');
            $this->load->model('mahasiswa_m');

           

}
}
	public function index()
	{
		$data['title'] = 'Halaman Awal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		 $this->load->view('templates/header',$data);
$this->load->view('templates/sidebar',$data);
$this->load->view('templates/user_topbar',$data);

      
				$this->load->view('user/home_mhs',$data);
		$this->load->view('templates/footer');

		
		

	}
	}