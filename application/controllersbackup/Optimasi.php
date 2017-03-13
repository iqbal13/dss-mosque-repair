<?php 

	class Optimasi extends CI_Controller {

		function __construct(){
			parent::__construct();

		}

		function index(){
			$this->optimasi();

		}

		function best_neightbor($cpos,$dt){

	if($cpos == 0){
		$left_neightbor = $cpos +1;
		$right_neightbor = $cpos + 1;
	}else{ 
	$left_neightbor = $cpos - 1;
	$right_neightbor = $cpos + 1;
}

	if(!isset($dt[$left_neightbor])){
		$dt[$left_neightbor] = $dt[$right_neightbor];
	}else if(!isset($dt[$right_neightbor])){
		$dt[$right_neightbor] = $dt[$left_neightbor];
	}

	if($dt[$left_neightbor] >= $dt[$right_neightbor]){
		$best_neightbor = $left_neightbor;
	}else{
		$best_neightbor = $right_neightbor;
	}
	return $best_neightbor;
}


		function do_optimasi(){
			if(isset($_SESSION['percobaan'])){
				$_SESSION['percobaan'] = $_SESSION['percobaan'] + 1;
			}else{
				$_SESSION['percobaan'] = 1;
			}

			echo "<h1> INI ANELING KE ".$_SESSION['percobaan']."</h1>";


			if($_SESSION['percobaan'] >= 10){

				echo "<a class='btn btn-primary' href='".base_url()."report/do_report'> Report </a>'";
				// $_SESSION['percobaan'] = 1;
			}
			$data = $this->gen->retrieve_many('masjid');

			$param = array("p1" => "0.15", "p2" => "0.14",  "p3" => "0.13" , "p4" => "0.13", "p5" => "0.12" , "p6" => "0.09", "p7" => "0.06", "p8" => "0.06", "p9" => "0.05", "p10" => "0.05","p11" => "0.02");
			$di = $this->session->userdata('di');
			$dx = array();
			foreach($di as $d){
				array_push($dx,$d['di']);
			}
			$temp = 100;
			$opt = 40;
			$cpos = array_rand($dx);
			//echo "<h1> Nilai awal adalah ".$dx[$cpos]." Di posisi ".$cpos."</h1>";
			while($temp > $opt){

				$best_neightbor = $this->best_neightbor($cpos,$dx);
				// echo "ini adalah temperatur ".$temp." Dengan nilai ".$dx[$cpos]."di posisi ".$cpos." Dan best neightbor = ".$dx[$best_neightbor]."<br>";

				if($dx[$best_neightbor] >= $dx[$cpos]){

					$cpos = $best_neightbor;

				}else{ 

					$delta = $dx[$best_neightbor]  - $dx[$cpos];
			$rand = mt_rand(0,100) / 100;
			$np = exp($delta / $temp);
			// echo " Delta nya adalah <b>".$delta."</b> Nilai Perbandingan :  <b>".$np."</b> Random angka : <b>".$rand."</b> ";
			if($np > $rand){
				//echo " Ya lebih besar  <br>";
				$cpos = $best_neightbor; 
			}else{
				//echo " Tidak Berubah  <br>";
				$cpos = $cpos;
			}


			}


				$temp  = $temp - 10;

			}


			$masjid = $this->gen->retrieve_one('masjid',array('kode_masjid' => $_SESSION['di'][$cpos]['kode_masjid']));

			$aj = $this->gen->retrieve_one('hasil_optimasi',array('kode_masjid' => $_SESSION['di'][$cpos]['kode_masjid']));
			if(count($aj) == 0){
			$dta = array(
				'keluar' => 1,
				'kode_masjid' => $_SESSION['di'][$cpos]['kode_masjid'],
				'nilai' => $dx[$cpos]);
						$this->db->insert('hasil_optimasi',$dta);

		}else{
			$keluar = $aj['keluar'] + 1;
			$dta = array('keluar' => $keluar);
			$this->db->update('hasil_optimasi',$dta,array('kode_masjid' => $_SESSION['di'][$cpos]['kode_masjid']));
		}



			echo "<br><br>Hasil aneling adalah ".$dx[$cpos]." Yaitu masjid <b>".$masjid['nama_masjid']."</b>";

			if($_SESSION['percobaan'] >= 10){
				echo "<script>$('#optimasiwoy').hide()</script>";
			}else{
				echo "<script>$('#optimasiwoy').show()</script>";
			}


			

	// array_walk($data, function(&$val) use (&$param,&$pmax){

	// 			if($val['jenis_masjid'] == 1){
	// 				$val['p8']  = 60;
	// 			}else{
	// 				$val['p8'] =  40;
	// 			}
				
	// 			if($val['kegiatan_masjid'] == 1){
	// 				$val['p7'] = 60;
	// 			}else if($val['kegiatan_masjid'] == 2){
	// 				$val['p7'] = 40;
	// 			}else if($val['kegiatan_masjid'] == 3){
	// 				$val['p7'] = 100;
	// 			}else{
	// 				$val['p7'] = 0;
	// 			}

	// 			if($val['tipe_kerusakan'] == 1){
	// 				$val['p3'] = 70;
	// 			}else if($val['tipe_kerusakan'] == 2){
	// 				$val['p3'] = 20;
	// 			}else{
	// 				$val['p3'] = 10;
	// 			}

	// 			if($val['status_tanah'] == 1){
	// 				$val['p10'] = "50";
	// 			}else if($val['status_tanah'] == 2){
	// 				$val['p10'] = "30";
	// 			}else if($val['status_tanah'] == 3){
	// 				$val['p10'] = "20";
	// 			}



	// 			$val['v1'] = $val['biaya'];
	// 			$val['v2'] = $val['kapasitas_jamaah'];  
	// 			$val['v3'] = $val['p3'];
	// 			$val['v4'] = $val['lama_kerusakan']; 
	// 			$val['v5'] = $val['intensitasperbaikan'];
	// 			$val['v6'] = $val['jarak'];
	// 			$val['v7'] = $val['p7'];
	// 			$val['v8'] = $val['p8'];
	// 			$val['v9'] = $val['luas_bangunan']; 
	// 			$val['v10'] = $val['p10'];
	// 			$val['v11'] = $val['lama_berdiri'];

	// 			for($x=1;$x<=11;$x++){
	// 				array_push($pmax['p'.$x],$val['v'.$x]);
	// 			}


	// 		}
	// 		);


		}


		function optimasi(){
			unset($_SESSION['percobaan']);
			unset($_SESSION['di']);
			$a = "DELETE FROM hasil_optimasi";
			$b = $this->db->query($a);
			$data = $this->gen->retrieve_many('masjid');

			// foreach($c as $key => $val){
			// 	echo " Ini val ".$val. " ini key ".$key."<br>";
			// }

			$param = array("p1" => "0.15", "p2" => "0.14",  "p3" => "0.13" , "p4" => "0.13", "p5" => "0.12" , "p6" => "0.09", "p7" => "0.06", "p8" => "0.06", "p9" => "0.05", "p10" => "0.05","p11" => "0.02");

			$subp1 = array("s1" => 60, "s2" => 40);
			$tipep1 = array("t1" => 10, "t2" => 20, "t3" => 70);
			for($x=1;$x<=11;$x++){
				$pmax['p'.$x] = array();
			}
			// $data['param'] = $param;
			$content = "optimasi/p1";
				
			array_walk($data, function(&$val) use (&$param,&$pmax){

				if($val['jenis_masjid'] == 1){
					$val['p8']  = 60;
				}else{
					$val['p8'] =  40;
				}
				
				if($val['kegiatan_masjid'] == 1){
					$val['p7'] = 60;
				}else if($val['kegiatan_masjid'] == 2){
					$val['p7'] = 40;
				}else if($val['kegiatan_masjid'] == 3){
					$val['p7'] = 100;
				}else{
					$val['p7'] = 0;
				}

				if($val['tipe_kerusakan'] == 1){
					$val['p3'] = 70;
				}else if($val['tipe_kerusakan'] == 2){
					$val['p3'] = 20;
				}else{
					$val['p3'] = 10;
				}

				if($val['status_tanah'] == 1){
					$val['p10'] = "50";
				}else if($val['status_tanah'] == 2){
					$val['p10'] = "30";
				}else if($val['status_tanah'] == 3){
					$val['p10'] = "20";
				}



				$val['v1'] = $val['biaya'];
				$val['v2'] = $val['kapasitas_jamaah'];  
				$val['v3'] = $val['p3'];
				$val['v4'] = $val['lama_kerusakan']; 
				$val['v5'] = $val['intensitasperbaikan'];
				$val['v6'] = $val['jarak'];
				$val['v7'] = $val['p7'];
				$val['v8'] = $val['p8'];
				$val['v9'] = $val['luas_bangunan']; 
				$val['v10'] = $val['p10'];
				$val['v11'] = $val['lama_berdiri'];

				for($x=1;$x<=11;$x++){
					array_push($pmax['p'.$x],$val['v'.$x]);
				}


			}
			);

			$di = array();
			array_walk($data, function(&$val) use (&$param,&$pmax,&$di){

				$val['v1'] = round(min($pmax['p1']) / $val['v1'],2) * $param['p1'];
				$val['v2'] = round($val['v2'] / max($pmax['p2']),2) * $param['p2'];
				$val['v3'] = round($val['v3'] / max($pmax['p3']),2) * $param['p3'] ; 
				$val['v4'] =  round($val['v4'] / max($pmax['p4']),2) * $param['p4']; 
				$val['v5'] =  round(min($pmax['p5']) / $val['v5'],2) * $param['p5']; 
				$val['v6'] =  round($val['v6'] / max($pmax['p6']),2) * $param['p6']; 
				$val['v7'] =  round($val['v7'] / max($pmax['p7']),2) * $param['p7'];
				$val['v8'] =  round($val['v8'] / max($pmax['p8']),2) * $param['p8'];
				$val['v9'] =  round($val['v9'] / max($pmax['p9']),2) * $param['p9'];
				$val['v10'] =  round($val['v10'] / max($pmax['p10']),2) * $param['p10'];
				$val['v11'] =  round($val['v11'] / max($pmax['p11']),2) * $param['p11'];
				$val['di'] = round(($val['v1'] + $val['v2'] + $val['v3'] + $val['v4'] + $val['v5'] + $val['v6'] + $val['v7'] + $val['v8'] + $val['v9'] + $val['v10'] + $val['v11']) / 11,3);

				$val['dii'] = array("di" => $val['di'] , "kode_masjid" => $val['kode_masjid']);

				array_push($di,$val['dii']);


			});

		//	print_r($di);

			$this->session->set_userdata("di",$di);

	// 		echo "<pre>";
	// 		print_r($_SESSION);

	// exit;
			

		
			// echo "<pre>";
			// print_r($data);
			// exit;


			$load = array(
				'maxmin' => $pmax,
				'param' => $param,
				'data' => $data,
				'content' => $content);

			//exit;
			$this->load->view('dashboard',$load);


				//$this->load->view('dashboard',$data);

		}

		function fuzzy($a){

			$c = $this->gen->retrieve_many('masjid');


			

		}





	}