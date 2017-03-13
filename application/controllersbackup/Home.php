<?php 

	class Home extends CI_Controller {

		function __construct(){
			parent::__construct();
			check_auth();
		}

		function index(){

$a  = "SELECT * FROM hasil_optimasi ORDER BY keluar DESC";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$data['report'] = $c;
				// $data['content'] = 'report/report';


			$data = array(
				'content' => "home/home",
				'report' => $c,
				);

			$this->load->view('dashboard',$data);
		}

	}