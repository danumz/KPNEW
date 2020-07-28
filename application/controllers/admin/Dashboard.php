<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_notif');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['notif'] = $this->m_notif->tampildata();

        $data['notif2'] = $this->m_notif->gabungan();

        // echo "<pre>";
        // print_r($data['notif2']);
        // echo "</pre>";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/allnotif');
        $this->load->view('templates/footer');
    }

    public function get_notif()
    {
        $this->db->select('COUNT(id_notif) as jumlah')->from('notif');
        $this->db->where("status", 0);
        $data = $this->db->get()->row_array();
        echo json_encode($data);
    }

    public function notiff()
    {
       $data['notif'] = $this->m_notif->gabunganlimit();
       $data['jumlah_notif'] = $this->m_notif->gabungan()->num_rows();
       echo json_encode($data);
    }

    public function hapus($id_notif)
    {
        $where = array ('id_notif' => $id_notif);
    $this->m_notif->hapus_data($where, 'notif');
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil dihapus</div>');
    redirect('admin/Dashboard');
    }
}

