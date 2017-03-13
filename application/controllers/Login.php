<?php

	class Login extends CI_Controller {

			function __construt(){
				parent::__construt();
				if($this->session->userdata('username') != ""){
					redirect('home');
				}
			}

			function index(){

				$data = array();
				$this->load->view('login',$data);

			}


			function logout(){
				$this->session->sess_destroy();
				$this->db->empty_table('hasil_optimasi');
				$this->db->empty_table('new_hasilopt');
				$this->db->empty_table('waktu_opt');
				$this->session->set_flashdata('item','<div class="alert alert-info"> Logout Berhasil .Anda telah keluar dari sistem </div>');
				redirect('login');
			}

			function proses(){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$password = md5($password);

				$a = $this->gen->retrieve_one('user',array('username' => $username, 'password' => $password));

				if(count($a) != 0){

					$data = array(
						'username' => $username,
						'login' => 1,
						'id_level' => $a['id_level']);
					$this->session->set_userdata($data);
					$this->session->set_flashdata('item','<div class="alert alert-info"> Login Berhasil !!! Selamat datang '.$username.'</div>');

					redirect('home');

				}else{
					$this->session->set_flashdata('item','<div class="alert alert-danger"> Login Gagal !!! Silahkan masukkan Username dan Password dengan benar </div>');
					redirect('login');
				}
			}
	}

