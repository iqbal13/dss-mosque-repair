<?php 

	class Home extends CI_Controller {

		function __construct(){
			parent::__construct();
			check_auth();
		}

		function index(){
		$a  = "SELECT * FROM new_hasilopt ORDER BY keluar DESC limit 3";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$data['report'] = $c;
				// $data['content'] = 'report/report';


			$data = array(
				'content' => "home/home",
				'report' => $c,
				);
						$data['masjid'] = $this->gen->retrieve_many('masjid');

			$this->load->view('dashboard',$data);
		}

	}