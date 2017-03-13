<?php

	class Manajemenuser extends CI_Controller{


		function __construct(){
			parent::__construct();
			check_auth();
		}

		function index(){

			$data['content'] = "profile/manajemen";
			$data['user'] = $this->gen->retrieve_many('user');

			$this->load->view('dashboard',$data);

		}

		function prosestambah(){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$id_level = $_POST['id_level'];

			$dt = array('username' => $username, 'password' => $password, 'id_level' => $id_level);

			$a = $this->db->insert('user',$dt);
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> User baru berhasil ditambahkan </div>');
				redirect('manajemenuser');
			}
		}

		function hapus($id){
			$a = $this->db->delete('user',array('id_user' => $id));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> User  berhasil Dihapus </div>');
				redirect('manajemenuser');
			}
		}

		function prosesedit(){
			$id_user = $_POST['id_user'];

			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$id_level = $_POST['id_level'];

			$dt = array('username' => $username,'password' => $password, 'id_level' => $id_level);

			$b = $this->db->update('user',$dt,array('id_user' => $id_user));
			if($b){
				$this->session->set_flashdata('item','<div class="alert alert-info"> User  berhasil dirubah </div>');
				redirect('manajemenuser');
			}
		}

		function tambah(){

			$data['content'] = "profile/tambah";
			$data['level'] = $this->gen->retrieve_many('level_user');
			$this->load->view('dashboard',$data);
		}

		function edit(){
			$data['content'] = "profile/edit";
			$id_user = $this->uri->segment(3);
			$data['user'] = $this->gen->retrieve_one('user',array('id_user' => $id_user));
			$data['level'] = $this->gen->retrieve_many('level_user');
			$this->load->view('dashboard',$data);
		}

		
	}