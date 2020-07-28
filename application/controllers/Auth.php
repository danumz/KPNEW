<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

	}

	public function index()
	{
		// $this->form_validation->set_rules('email','Email','required|trim');
		// $this->form_validation->set_rules('password','Passwod','required|trim');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email', [

				'required' => 'Email harus di isi!'
		]);

		$this->form_validation->set_rules('password','Password','trim|required', [
				'required' => 'Kata sandi harus di isi!'

		]);



		if ($this->form_validation->run() == false) {
				
		$data['title'] = 'Halaman Login';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		}else {

			$this->_login();
		}

	}

		private function _login ()
		{
		
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();
            
			// maka usernya ada
			if($user) {


			// jika usernya aktif
				if($user['aktif'] == 1) {

					// cek password
					if(password_verify($password, $user['password'])) {

						$data = [
								'id_user' => $user['id_user'],
								'email' => $user['email'],
								'NPM' => $user['NPM'],
								'NIK' => $user['NIK'],
								'role_id' => $user['role_id']

						];

					$this->session->set_userdata($data);

					if($user['role_id'] == 1) {
						redirect('admin/form_mahasiswa');
					}elseif ($user['role_id'] == 2) {
						redirect('user/H_mhs');
					}else {
						redirect('user/H_dosen');
					}
					

						} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">kata sandi salah!</div>');
					redirect('auth');
					}
					
				}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">email belum di aktvasi!</div>');
				redirect('auth');

				}

			} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
				redirect('auth');
			}


}

public function selamat()
{
        $data['title'] = 'Intro';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/selamat');
		$this->load->view('templates/auth_footer');

}


public function user()
{
		$data['title'] = 'Pilihan';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/user');
		$this->load->view('templates/auth_footer');

}

	public function register()
	{	
		// if ($this->session->userdata('email')) {
		// 	redirect('user');
		// }

		$this->form_validation->set_rules('nama','Nama','required|trim', [
				'required' => 'Nama Lengkap harus diisi!'
				
		]);

		
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[user.email]', [

				'required' => 'Email harus diisi!',
				'is_unique' => 'Email sudah ada!'
		]);

		$this->form_validation->set_rules('NPM','NPM','required|trim|min_length[12]|is_unique[user.NPM]', [

				'required' => 'NPM harus diisi!',
				'is_unique' => 'NPM sudah ada!',
				'min_length' => 'NPM harus 12 digit!'
		]);

		

		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[

				'required'   => 'Kata sandi harus diisi!',
				'matches'    => 'Kata sandi tidak cocok!',
				'min_length' => 'Kata sandi terlalu pendek!'
		]);

		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


		if($this->form_validation->run() == false) {
		$data['title'] = 'Register';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/register');
		$this->load->view('templates/auth_footer');

		} else {
			$email = $this->input->post('email',true);
			$data = [
			'nama' => htmlspecialchars($this->input->post('nama',true)),
			'email' => htmlspecialchars($email),
			'NPM' => htmlspecialchars($this->input->post('NPM',true)),
			'NIK' => htmlspecialchars($this->input->post('NIK',true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'aktif' => 0,
			'dibuat' => time()
			];

			// siapkan token

			$token = base64_encode(random_bytes(32));
			$user_token = [
					'email' =>  $email,
					'token' => $token,
					'dibuat' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);


			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">selamat akun anda telah terdaftar. silahkan aktivasi</div>');
			redirect('auth');
		}

	}

		public function register_dosen()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim', [
				'required' => 'Nama Lengkap harus diisi!',
				// 'is_unique' => 'Nama sudah ada!'
		]);
		
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[user.email]', [

				'required' => 'Email harus diisi!',
				'is_unique' => 'Email sudah ada!'
		]);

			

		$this->form_validation->set_rules('NIK','NIK','required|trim|min_length[9]|is_unique[user.NIK]', [

				'required' => 'NIK harus diisi!',
				'is_unique' => 'NIK sudah ada!',
				'min_length' => 'NIK harus 9 digit!'
		]);

	

		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[

				'required'   => 'Kata sandi harus diisi!',
				'matches'    => 'Kata sandi tidak cocok!',
				'min_length' => 'Kata sandi terlalu pendek!'
		]);

		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


		if($this->form_validation->run() == false) {
		$data['title'] = 'Registrasi Dosen';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/register_dosen');
		$this->load->view('templates/auth_footer');

		} else {

			$email = $this->input->post('email',true);
			$data = [
			'nama' => htmlspecialchars($this->input->post('nama',true)),
			'email' => htmlspecialchars($email),
			'NPM' => htmlspecialchars($this->input->post('NPM',true)),
			'NIK' => htmlspecialchars($this->input->post('NIK',true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 3,
			'aktif' => 0,
			'dibuat' => time()
			];
			
			// siapkan token

			$token = base64_encode(random_bytes(32));
			$user_token = [
					'email' =>  $email,
					'token' => $token,
					'dibuat' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);


			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">selamat akun anda telah terdaftar. silahkan aktivasi</div>');
			redirect('auth');
		}

	}

			public function register_admin()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim|is_unique[user.nama]', [
				'required' => 'Nama Lengkap harus diisi!',
				'is_unique' => 'Nama sudah ada!'
		]);
		
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[user.email]', [

				'required' => 'Email harus diisi!',
				'is_unique' => 'Email sudah ada!'
		]);
		

		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[

				'required'   => 'Kata sandi harus diisi!',
				'matches'    => 'Kata sandi tidak cocok!',
				'min_length' => 'Kata sandi terlalu pendek!'
		]);

		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


		if($this->form_validation->run() == false) {
		$data['title'] = 'Registrasi Admin';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/register_admin');
		$this->load->view('templates/auth_footer');

		} else {
			
			$email = $this->input->post('email',true);
			$data = [
			'nama' => htmlspecialchars($this->input->post('nama',true)),
			'email' => htmlspecialchars($email),
			'NPM' => htmlspecialchars($this->input->post('NPM',true)),
			'NIK' => htmlspecialchars($this->input->post('NIK',true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 1,
			'aktif' => 0,
			'dibuat' => time()
			];

			
			// siapkan token

			$token = base64_encode(random_bytes(32));
			$user_token = [
					'email' =>  $email,
					'token' => $token,
					'dibuat' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);


			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">selamat akun anda telah terdaftar. silahkan aktivasi</div>');
			redirect('auth');
		}

	}


	private function _sendEmail($token, $type)
	{
		$config = [

			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'oolive697@gmail.com',
			'smtp_pass' => '123456oliv',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('oolive697@gmail.com','Prodi TI');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			
		$this->email->subject('Verifikasi Akun');
		$this->email->message('klik link untuk verifikasi akun anda : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktif</a>');
		}


		if($this->email->send()) {
			return true;

		}else{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {

				if(time() - $user_token['dibuat'] < (60 * 60 *24 )) {
					$this->db->set('aktif', 1);
					$this->db->where('email',$email);
					$this->db->update('user');

					$this->db->delete('user_token',['email' => $email]);


					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$email.' akun berhasil di aktivasi! silahkan masuk</div>');
			redirect('auth');


				}else{


					$this->db->delete('user',['email' => $email]);
					$this->db->delete('user_token',['email' => $email]);
					

					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">akun anda gagal diverifikasi! token kadaluarsa</div>');
			redirect('auth');

				}

			}else{

				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">akun anda gagal diverifikasi! token salah</div>');
			redirect('auth');

			}

		}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">akun anda gagal diverifikasi! email salah</div>');
			redirect('auth');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
			redirect('auth');
	}
public function blocked()
	{
		$this->load->view('auth/blocked');
	}


}




























