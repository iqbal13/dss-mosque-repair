<?php

	class Report extends CI_Controller {

		function __construct(){
			parent::__construct();
			check_auth();
		}

			function perbandingan(){

			if(isset($_SESSION['percobaan'])){
			
				$a = "SELECT * FROM new_hasilopt WHERE tipe_opt = 1 ORDER BY keluar DESC limit 3";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$a2 = "SELECT * FROM new_hasilopt WHERE tipe_opt =  2 ORDER BY keluar DESC LIMIT 3";
				$b2 = $this->db->query($a2);
				$c2 = $b2->result_array();

				

				$data['climbing'] = $c2;

				$data['aneling'] = $c;
				$data['content'] = "report/perbandingan";

				$this->load->view('dashboard',$data);

			}

		}


		function new_report(){

			if(isset($_SESSION['percobaan'])){
				$tipe = $this->uri->segment(3);
				$a = "SELECT * FROM new_hasilopt WHERE tipe_opt= '$tipe' ORDER BY keluar DESC limit 3";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$data['report'] = $c;
				$data['content'] = "report/new";

				$this->load->view('dashboard',$data);

			}

		}

		function cumtes(){
		
		}

		function index(){
			$this->do_report();
		}

		function do_report(){
			if(isset($_SESSION['percobaan'])){

			

				// $a  = "SELECT * FROM hasil_optimasi ORDER BY keluar DESC";
				// $b = $this->db->query($a);
				// $c = $b->result_array();

				//$data['report'] = $c;
				$data['content'] = 'report/report';

				$this->load->view('dashboard',$data);
				// echo "<table class='table table-striped' border=1>";
				// echo "<th> Nilai </th>";
				// echo "<th> Nama Masjid </th>";
				// echo "<th> Jumlah Keluar </th>";
				// foreach($c as $key => $val){
				// 	$masjid = $this->gen->retrieve_one('masjid',array('kode_masjid' => $val['kode_masjid']));
				// 	echo "<tr>";
				// 	// echo "<td>".$key+1."</td>";
				// 	echo "<td>".$val['nilai']."</td>";
				// 	echo "<td>".$masjid['nama_masjid']."</td>";
				// 	echo "<td>".$val['keluar']."</td>";
				// 	echo "</tr>";
				// }
				// echo "</table>";
				// echo '<a href="'.base_url().'optimasi" class="btn btn-danger"> Reset </a>"';

			} else {

				echo "<script>alert('anda belum melakukan optimasi')</script>";
				redirect('masjid');
			}


		}
	}