<?php
	
	class Profile extends CI_Controller{

		function __construct(){
			parent::__construct();
						check_auth();

		}

		function index(){

			$data['content'] = "profile/profile";
			// print_r($_SESSION);
			// exit;
			$this->load->view('dashboard',$data);
		}

		function edit_password(){
			$password_lama = $this->input->post('password_lama');

			$a = $this->gen->retrieve_one('user',array('username' => $_SESSION['username'],'password' => md5($password_lama)));
			if(count($a) == 0){

				$this->session->set_flashdata('item','<div class="alert alert-danger"> Password Lama anda salah </div>');
				redirect('profile');

			}else{


				$password_baru = $this->input->post('password_baru');

				$dt = array('password' => md5($password_baru));
				$a = $this->db->update('user',$dt,array('username' => $_SESSION['username']));
				if($a){
					$this->session->set_flashdata('item','<div class="alert alert-info"> Password anda berhasil dirubah </div>');
					redirect('profile');
				}

			}
		}

	}