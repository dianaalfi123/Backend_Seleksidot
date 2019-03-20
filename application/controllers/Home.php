<?php

defined('BASEPATH') OR exit('No direct srcipt access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'dashboard';
			$this->load->view('template', $data);
		}else{
			$this->load->view('login');
		}
	}
	public function do_login(){
	
		if($this->home_model->check_user() == true){
					redirect('home/index');
				}else{
					$this->session->set_flashdata('notif', 'username anda salah!!!');
					redirect('home');
				}
	}

	
public function logout(){
	$this->session->sess_destroy();
	redirect('home');
}


	public function admin(){
		if ($this->session->userdata('logged_in') == false) {
			$data['main_view'] = 'admin';
			$data['admin'] = $this->home_model->get_admin();
			$this->load->view('template2', $data);
	
		}else{
			$this->load->view('home/index');
		}
	}

	public function adminlist(){
		if ($this->session->userdata('logged_in') == true) {
			$data['main_view'] = 'adminlist';
			$data['adminlist'] = $this->home_model->get_admin();
			$this->load->view('template', $data);
	
		}else{
			$this->load->view('home/index');
		}
	}

	
	public function tambah_admin(){
		if($this->session->userdata('logged_in')== false)	{
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					);
				if ($this->home_model->add_admin($data) == TRUE) {
					$this->session->set_flashdata('notif1','Anda Berhasil Registrasi');
					redirect('home/index');

				}else{
					$this->session->set_flashdata('notif2', 'Registrasi gagal');
					redirect('home/admin');
				}
			}else{
				redirect('home/index');
			}
		
	}



	public function ubah_admin(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->update_admin() ==TRUE) {
				$this->session->set_flashdata('notif1', 'Update Berhasil');
				redirect('home/adminlist');
			}else{
				$this->session->set_flashdata('notif2', 'Update gagal');
				redirect('home/adminlist');
			}
		}else{
			redirect('home/index');
		}
	}

//about baju
	public function baju_up(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'baju';
	
			$data['kategori'] = $this->home_model->select_kategori();
			$data['baju'] = $this->home_model->select_kat_baju();
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}

//about kategori	
	public function kategori(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'kategori';
			$data['kategori'] = $this->home_model->select_kategori();	
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}

//get

	public function get_admin_id($id_admins){
		if ($this->session->userdata('logged_in')==TRUE) {
			$admin = $this->home_model->get_admin_id($id_admins);
			echo json_encode($admin);
		}else{
			redirect('home/admin');
		}
	}
	public function get_baju_id($id_bajus){
		if ($this->session->userdata('logged_in')==TRUE) {
			$baju= $this->home_model->get_baju_id($id_bajus);
			echo json_encode($baju);
		}else{
			redirect('home/index');
		}
	}

	public function get_kategori_id($id_kategoris){
		if ($this->session->userdata('logged_in') == TRUE) {
			$kategori = $this->home_model->get_kategori_id($id_kategoris);
			echo json_encode($kategori);
			# code...
		}else{
			redirect('home/index');
		}
	}

//manipulasi baju
	public function tambah_baju(){
	if ($this->session->userdata('logged_in') == TRUE) {
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'baju' => $this->input->post('baju'),
			'stok' => $this->input->post('stok')
			 );
		if ($this->home_model->add_baju($data) == true) {
			$this->session->set_flashdata('notif', 'Add Berhasil');
			redirect('home/baju_up');
		}else{
			$this->session->set_flashdata('notif', 'Add gagal');
			redirect('home/baju_up');
		}
			# code...
		}else{
				redirect('home/index');
		}
	}

	public function ubah_baju(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->update_baju() ==TRUE) {
				$this->session->set_flashdata('notif', 'Update Berhasil');
				redirect('home/baju_up');
			}else{
				$this->session->set_flashdata('notif', 'Update gagal');
				redirect('home/baju_up');
			}
		}else{
			redirect('home/index');
		}
	}

	public function hapus_baju(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->delete_baju($id_bajus)==TRUE) {
				$this->session->set_flashdata('notif', 'Delete Berhasil');
				redirect('home/baju_up');
			}else{
				$this->session->set_flashdata('notif', 'Delete Gagal');
				redirect('home/baju_up');
			}
		}else{
			redirect('home/index');
		}
	}

//manipulasi kategori
	public function tambah_kategori(){
	if ($this->session->userdata('logged_in') == TRUE) {
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->poSt('nama_kategori')
			 );
		if ($this->home_model->add_kategori($data) == true) {
			$this->session->set_flashdata('notif', 'Add Berhasil');
			redirect('home/kategori');
		}else{
			$this->session->set_flashdata('notif', 'Add gagal');
			redirect('home/kategori');
		}
			# code...
		}else{
				redirect('home/index');
		}
	}

	public function ubah_kategori(){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->home_model->update_kategori() == true) {
				$this->session->set_flashdata('notif', 'Update Berhasil');
				redirect('home/kategori');
			}else{$this->session->set_flashdata('notif', 'Update gagal');
			redirect('home/kategori');

			}
			# code...
		}else{
			redirect('home/index');
		}
	}

	public function hapus_kategori($id_kategoris){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->home_model->delete_kategori($id_kategoris) == true) {
				$this->session->set_flashdata('notif', 'Delete Berhasil');
				redirect('home/kategori');

			}else{
				$this->session->set_flashdata('notif', 'Delete Gagal');
				redirect('home/kategori');
			}
		}else{
			redirect('home/index');
		}
	}

	
}

?>