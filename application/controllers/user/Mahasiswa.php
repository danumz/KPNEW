<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Mahasiswa extends CI_Controller
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
                $data['title'] = 'Input Form';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $data['tu'] = $this->mahasiswa_m->tampildata();


                $this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'required|trim', [

                        'required' => 'Nama harus di isi!'
                ]);

                $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim', [

                        'required' => 'Tempat Lahir harus di isi!'
                ]);
                $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required|trim', [

                        'required' => 'Tanggal Lahir harus di isi!'
                ]);
                $this->form_validation->set_rules('NPM', 'NPM', 'required|trim', [

                        'required' => 'NPM harus di isi!'
                ]);
                $this->form_validation->set_rules('semester', 'Semester', 'required|trim', [

                        'required' => 'Semester harus di isi!'
                ]);
                $this->form_validation->set_rules('kebutuhan', 'Kebutuhan', 'required|trim', [

                        'required' => 'Kebutuhan harus di isi!'
                ]);
                $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|trim', [

                        'required' => 'Keperluan harus di isi!'
                ]);

                if ($this->form_validation->run() == false) {
                        // print_r($ini);
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/user_topbar', $data);


                        $this->load->view('user/f_mahasiswa', $data);
                        $this->load->view('templates/footer');
                } else {

                        $last = $this->mahasiswa_m->lastid();
                        $id_mhs = $last + 1;

                        $data = [
                                'id_mhs' => $id_mhs,
                                'user_id' => $this->session->userdata('id_user'),
                                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                                'tempat_lahir' => $this->input->post('tempat_lahir'),
                                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                                'NPM' => $this->input->post('NPM'),
                                'semester' => $this->input->post('semester'),
                                'kebutuhan' => $this->input->post('kebutuhan'),
                                'keperluan' => $this->input->post('keperluan'),
                                'tgl_input' => date('Y-m-d H:i:s'),
                                'tgl_selesai' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 2, date('Y')))

                        ];

                        $datanotif = array(
                                'nama' => $this->input->post('nama_mahasiswa'),
                                'pesan' => $this->input->post('kebutuhan'),
                                'user_id' => $this->session->userdata('id_user'),
                                'mhs_id' => $id_mhs
                        );

                        $this->db->insert('form_mahasiswa', $data);
                        $this->db->insert('notif', $datanotif);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" class="text-center">Permintaan berhasil dikirim</div>');
                        redirect('user/H_mhs');
                }
        }
}
