<?php
	class Report extends CI_Controller {

		function __construct(){
			parent::__construct();
		}



		function index(){
			//$this->do_report();
			print(HASILWEI);
			echo $hasil;

		}

		function wal(){
			echo "disini";
		}

		function do_report(){			print(HASILWEI);

			if($_SESSION['percobaan'] == 10){


				$a  = "SELECT * FROM hasil_optimasi ORDER BY keluar DESC";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$data['report'] = $c;
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


				redirect('optimasi');
			}


		}
	}