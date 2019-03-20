<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  
  public function check_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');	

		
		$query = $this->db->where('username', $username)
						->where('password', $password)
						->get('admin');

		if ($query->num_rows() > 0) {

			$data_login = $query->row();

			$data = array(
				'id_admin' => $data_login->id_admin,
				'nama' => $data_login->nama,
			    'username' => $data_login->username,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);

			return TRUE;
		}else {
			return FALSE;
		}
	}
	
//ambil database
	public function get_admin()
	{
		return $this->db->get('admin')
						->result();
	}
	public function get_baju(){
		return $this->db->get('baju')
						->result();
	}

	public function select_kategori(){
		return $this->db->get('kategori_baju')
						->result();
	}

	public function select_kat_baju(){
		return $this->db->join('kategori_baju', 'kategori_baju.id_kategori = baju.id_kategori')
				 ->get('baju')
				 ->result();
	}


//get
	public function get_admin_id($id_admins){
		return $this->db->where('id_admin', $id_admins)
						->get('admin')
						->row();
	}
	public function get_baju_id($bajus){
		return $this->db->where('id_baju', $bajus)
						->get('baju')
						->row();
	}
	public function get_kategori_id($id_kategoris){
		return $this->db->where('id_kategori', $id_kategoris)
						->get('kategori_baju')
						->row();

	}


//admin

	public function add_admin($data){
		$this->db->insert('admin', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function update_admin($admins){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password'=>$this->input->post('password')
			 );
		$this->db->where('id_admin', $this->input->post('id_admin'))
				 ->update('admin',$data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

//baju
	public function add_baju($data){
		$this->db->insert('baju', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

		public function update_baju(){
		$data = array(
			'id_kategori' => $this->input->post('id_kategori') ,
			'baju'=>$this->input->post('baju'),
			
			'stok'=>$this->input->post('stok')
			);
		$this->db->where('id_baju', $this->input->post('id_baju'))
				 ->update('baju',$data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	


	public function delete_baju(){
		$this->db->where('id_baju', $this->input->post('hapus_id_baju'))
				 ->delete('baju');
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

//manipulasi kat
	public function add_kategori($data){
		$this->db->insert('kategori_baju', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_kategori(){
		$data = array(
			'id_kategori' => $this->input->post('id_kategori') ,
			'nama_kategori' => $this->input->post('nama_kategori') );
			 $this->db->where('id_kategori', $this->input->post('id_kategori'))
					  ->update('kategori_baju', $data);
					  if ($this->db->affected_rows()>0) {
					  	return TRUE;
					  	
					  }else{
					  	return FALSE;
					  }
				
			}


			public function delete_kategori($id_kategoris){
				$this->db->where('id_kategori', $id_kategoris)
						 ->delete('kategori_baju');
				if ($this->db->affected_rows() > 0) {
					return TRUE;
				}else{
					return FALSE;
				}
			}

}

?>
