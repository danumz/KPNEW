<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	
	}


	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('profile/profile');
		// $this->load->view('templates/footer');
		

	}


	public function profile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/user_topbar',$data);
		$this->load->view('profile/user_profile');
		// $this->load->view('templates/footer');
		

	}  
	} 
