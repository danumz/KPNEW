 <?php
    defined('BASEPATH') or exit('No direct script access allowed');



    class Form_mahasiswa extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            is_logged_in();
            $this->load->library('form_validation');
            $this->load->model('m_mhs');
        }


        public function index()
        {
            $data['title'] = 'Form Mahasiswa';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['form_mahasiswa'] = $this->m_mhs->getwhere('status', 0, 'Form_mahasiswa')->result();
            $data['dd'] = $this->m_mhs->getwhere('status', 0, 'form_mahasiswa')->num_rows();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_mahasiswa', $data);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            $nama_mahasiswa = $this->input->post('nama_mahasiswa');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $NPM = $this->input->post('NPM');
            $semester = $this->input->post('semester');
            $kebutuhan = $this->input->post('kebutuhan');
            $keperluan = $this->input->post('keperluan');
            $tgl_input = $this->input->post('tgl_input');
            $tgl_selesai = $this->input->post('tgl_selesai');

            $data = array(
                'nama_mahasiswa' => $nama_mahasiswa,
                'tempat_lahir'   => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'NPM'            => $NPM,
                'semester'       => $semester,
                'kebutuhan'      => $kebutuhan,
                'keperluan'      => $keperluan,
                'tgl_input'      => $tgl_input,
                'tgl_selesai'    => $tgl_selesai,

            );
            // $this->db->insert('verifikasi', array('NPM'=>$this->session->userdata('NPM')));
            $this->db->insert('notif', array('id_user' => $this->session->userdata('id_user')));
            $this->m_mhs->input_data($data, 'form_mahasiswa');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil ditambah</div>');
            redirect('admin/Form_mahasiswa');
        }

        public function hapus($id_mhs)
        {
            $where = array('id_mhs' => $id_mhs);
            $this->m_mhs->hapus_data($where, 'form_mahasiswa');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil dihapus</div>');
            redirect('admin/Form_mahasiswa');
        }




        public function update()
        {
            $id_mhs        = $this->input->post('id_mhs');
            $nama_mahasiswa = $this->input->post('nama_mahasiswa');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $NPM            = $this->input->post('NPM');
            $semester       = $this->input->post('semester');
            $kebutuhan      = $this->input->post('kebutuhan');
            $keperluan      = $this->input->post('keperluan');
            $tgl_input      = $this->input->post('tgl_input');
            $tgl_selesai    = $this->input->post('tgl_selesai');

            $data = array(
                'nama_mahasiswa' => $nama_mahasiswa,
                'tempat_lahir'   => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'NPM'            => $NPM,
                'semester'       => $semester,
                'kebutuhan'      => $kebutuhan,
                'keperluan'      => $keperluan,
                'tgl_input'      => $tgl_input,
                'tgl_selesai'    => $tgl_selesai,

            );
            $where = array(
                'id_mhs' => $id_mhs
            );

            $this->m_mhs->update_data($where, $data, 'form_mahasiswa');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate</div>');
            redirect('admin/Form_mahasiswa');
        }

        public function detail($id_mhs)
        {
            $this->load->model('m_mhs');
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $detail = $this->m_mhs->detail_data($id_mhs);
            $data['title'] = 'Detail Data Mahasiswa';
            $data['detail'] = $detail;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);

            $this->load->view('admin/data_mahasiswa', $data);
            $this->load->view('templates/footer');
        }

        public function mhs_selesai($id, $status)
        {
            $data['title'] = 'Data Selesai';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $update   = array(
                'status' => $status,

            );
            $this->m_mhs->update('id_mhs', $id, $update, 'form_mahasiswa');
            $this->m_mhs->update('mhs_id', $id, $update, 'notif');
            echo json_encode('success');
            // redirect('admin/form_mahasiswa');
        }
        public function mhs_selesai_file($id)
        {
            $namaFile = $_FILES['formData']['name'];

            $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
            if ($ext == 'pdf' || $ext == 'PDF') {

                $namaSementara = $_FILES['formData']['tmp_name'];

                // tentukan lokasi file akan dipindahkan
                $dirUpload = "./assets/files/";

                // pindahkan file
                $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

                // $this->db->where('id_mdt', $id_mdt);
                // $update = $this->db->update('data_dukung_mutasi_daerah', [$filenames=>$namaFile]);
                $update   = array(
                    'file' => $namaFile
                );
                // $where = array ('id_mhs' => $id_mhs);
                // $this->m_mhs->selesai($where, 'form_mahasiswa');
                //      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Sudah Selesai</div>');
                $this->m_mhs->update('id_mhs', $id, $update, 'form_mahasiswa');
            } else {

                echo json_encode(2);
            }
        }
        public function search()
        {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Pencarian';
            $keyword = $this->input->post('keyword');
            $data['form_mahasiswa'] = $this->m_mhs->get_keyword($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_mahasiswa', $data);
            $this->load->view('templates/footer');
        }

        public function cektotal()
        {
            $data = $this->m_mhs->getwhere('status', 0, 'form_mahasiswa')->num_rows();
            // print_r($data); 
            echo json_encode($data);
        }

        public function cekseluruh()
        {
            $data = $this->m_mhs->getwhere('status', 0, 'form_mahasiswa')->row_array();
            // print_r($data); 
            echo json_encode($data);
        }
    }
