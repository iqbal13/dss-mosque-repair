<?php

	class Optimasi extends CI_Controller {

		function __construct(){
			parent::__construct();
			check_auth();
		}

		function getmaxmin(){
			$data = $this->gen->retrieve_many('masjid');
			for($x=1;$x<=11;$x++){
				$pmax['p'.$x] = array();
			}
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

	
			array_walk($data, function(&$val) use (&$param,&$pmax,&$di){

				$val['v1'] = round(min($pmax['p1']) / $val['v1'],2);
				$val['v2'] = round($val['v2'] / max($pmax['p2']),2);
				$val['v3'] = round($val['v3'] / max($pmax['p3']),2);
				$val['v4'] =  round($val['v4'] / max($pmax['p4']),2);
				$val['v5'] =  round(min($pmax['p5']) / $val['v5'],2);
				$val['v6'] =  round($val['v6'] / max($pmax['p6']),2); 
				$val['v7'] =  round($val['v7'] / max($pmax['p7']),2);
				$val['v8'] =  round($val['v8'] / max($pmax['p8']),2);
				$val['v9'] =  round($val['v9'] / max($pmax['p9']),2);
				$val['v10'] =  round($val['v10'] / max($pmax['p10']),2); 
				$val['v11'] =  round($val['v11'] / max($pmax['p11']),2); 
			

			});

			return $data;
		}

		function newopt(){
			$this->benchmark->mark('code_start');
			$_SESSION['percobaan'] = $_POST['nilai'];
			$nilai = $_POST['nilai'];
			
			$data = $this->getmaxmin();
			$param = $this->gen->retrieve_many('parameter');

			$hasil = array();
			for($x=1;$x<=$nilai;$x++){
				$nili = $this->fix_optimasi($data,$x,$param);

			}

$this->benchmark->mark('code_end');

echo  "OPTIMASI sebanyak <b> ".$_SESSION['percobaan']." </b> kali  Berlangsung Selama : <i> ".$this->benchmark->elapsed_time('code_start', 'code_end')." </i> Seconds <br>";
		echo "<a class='btn btn-primary' href='".base_url()."report/do_report'> Report </a>'";
		echo "<a class='btn btn-danger' href='".base_url()."optimasi/reset'> Reset </a>'";
		}

		function beforeoptimasi(){
			$data['masjid'] = $this->gen->retrieve_many('masjid');
			$data['content'] = "optimasi/before";


			$this->load->view('dashboard',$data);
		}

		function reset(){
			unset($_SESSION['percobaan']);
			$a = "DELETE FROM hasil_optimasi";
			$b = $this->db->query($a);
			if($b){
				redirect('masjid');
			}
		}

		function tes(){
			$px = $this->gen->retrieve_many('parameter');
			
			$param = array();
			for($x=1;$x<=count($px)-1;$x++){
				array_push($param,$p." ".$x);
			}

			print_r($param);

			// foreach($px as $key => $ppp){
			// 	$pxz = array($ppp['nilai']);
			// 	array_push($param,$pxz);
			// }


		cek_bro($param);
}

		// function index($percobaan = 1,$data = array(),$param){
		// 	$this->fix_optimasi($data,$percobaan,$param);			

		// }

		//fungsi optimasi 

		function fix_optimasi($data = array(),$percobaan,$param){

			//buat ngemudahin laporan
			// if(isset($_SESSION['percobaan'])){
			//  	$_SESSION['percobaan'] = $_SESSION['percobaan'] + 1;
		 // }else{
			// 	$percobaan = 1;
			//  }

			if(isset($percobaan)){
				$percobaan = $percobaan + 1;
			}else{
				$percobaan = 1;
			}

			// echo "<h1> INI ANELING KE ".$_SESSION['percobaan']."</h1>";
			// if($percobaan >= $_SESSION['percobaan']){
			// echo "<a class='btn btn-primary' href='".base_url()."report/do_report'> Report </a>'";
			// 				// $_SESSION['percobaan'] = 1;
			// }

			// $param = array();
			// foreach($px as $key => $ppp){
			// 	$pxz = array($ppp['nilai']);
			// 	array_push($param,$pxz);
			// }


			//mencari nilai awal random data
			$a = array_rand($data);

			$cpos = $a;
			$nilaiawal = $this->get_nilai($a,$data,$param);
			$dicpos = $nilaiawal;

			//nentuin temperatur awal
			$temp = 100;

			//temperatur optimal

			$opt = 60;

			//echo "DI awal  adalah :".$dicpos." ada di posisi ".$cpos;

			while($temp > $opt){
				//mencari best neightbor
				$best_neightbor = $this->best_neightbor($cpos,$data,$param);
				$di = explode("-",$best_neightbor);
				

				if($di[0] >= $dicpos){
				
					$na = $cpos;
					$cpos = $di[1];
			//		echo "<br> Nilai DI best neightbor adalah <b>".$di[0]."</b> dan berada di posisi ".$di[1]." Sebelumnya berada di posisi ".$na." dengan nilai DI ".$dicpos;
					$dicpos = $di[0];

				}else{
			//		echo "<br> Nilai DI Best Neightbor nya adalah ".$di[0]." Tidak Lebih besar dibanding ".$dicpos;
					$delta = $di[0]  - $dicpos;
					$rand = mt_rand(0,100) / 100;
					$np = exp($delta / $temp);
			//		 echo " | Delta nya adalah <b>".$delta."</b> Nilai Perbandingan :  <b>".$np."</b> Random angka : <b>".$rand."</b> ";
				
					if($np > $rand){
			//		echo " Ya lebih besar dan berubah <b> Sekarang sebelumnya berada di posisi ".$cpos;
						$cpos = $di[1]; 
			//			echo " Sekarang berada di <b>".$cpos."<br>";
						$dicpos = $di[0];
					}else{
			//			echo " Tidak Berubah  <br>";
						$cpos = $cpos;
					}
			}
				//looping				
				$temp = $temp - 10;

			}

			//return $cpos;

			//setelah dapet hasil
			//$hasil = $this->get_nilai($cpos,$data,$param);

			//echo "<h1>";
			//echo "Nilai optimasi adalah :".$dicpos." yaitu masjid ".$data[$cpos]['nama_masjid'];

				$aj = $this->gen->retrieve_one('hasil_optimasi',array('kode_masjid' => $data[$cpos]['kode_masjid']));

if(count($aj) == 0){
			$dta = array(
				'keluar' => 1,
				'kode_masjid' => $data[$cpos]['kode_masjid'],
				'nilai' => $dicpos);
						$this->db->insert('hasil_optimasi',$dta);

		}else{
			$keluar = $aj['keluar'] + 1;
			$dta = array('keluar' => $keluar);
			$this->db->update('hasil_optimasi',$dta,array('kode_masjid' => $data[$cpos]['kode_masjid']));
		}


			if($percobaan >= $_SESSION['percobaan']){
				echo "<script>$('#optimasiwoy').hide()</script>";
			}else{
				echo "<script>$('#optimasiwoy').show()</script>";
			}

		}


		function get_nilai($val,$data,$param){

			// print_r($param);
			// exit;

			$nilaike1 = $data[$val]['v1'] * $param[0]['nilai'];
			$nilaike2 = $data[$val]['v2'] * $param[1]['nilai'];
			$nilaike3 = $data[$val]['v3'] * $param[2]['nilai'];
			$nilaike4 = $data[$val]['v4'] * $param[3]['nilai'];
			$nilaike5 = $data[$val]['v5'] * $param[4]['nilai'];
			$nilaike6 = $data[$val]['v6'] * $param[5]['nilai'];
			$nilaike7 = $data[$val]['v7'] * $param[6]['nilai'];
			$nilaike8 = $data[$val]['v8'] * $param[7]['nilai'];
			$nilaike9 = $data[$val]['v9'] * $param[8]['nilai'];
			$nilaike10 = $data[$val]['v10'] * $param[9]['nilai'];
			$nilaike11 = $data[$val]['v11'] * $param[10]['nilai'];

			$di = $nilaike1 + $nilaike2 + $nilaike3 + $nilaike4 + $nilaike5 + $nilaike6 + $nilaike7 + $nilaike8 +$nilaike9 + $nilaike10 + $nilaike11;
			
			return $di;
		}

		function best_neightbor($cpos,$dt,$param){
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


	$nilaikiri = $this->get_nilai($left_neightbor,$dt,$param);
	$nilaikanan = $this->get_nilai($right_neightbor,$dt,$param);

if($nilaikiri >= $nilaikanan){
		$best_neightbor = $left_neightbor;
		$nilai = $nilaikiri;
	}else{
		$best_neightbor = $right_neightbor;
		$nilai= $nilaikanan;
	}
	return $nilai."-".$best_neightbor;

}



		function besta_neightbor($cpos,$dt){

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
	return $dt[$best_neightbor];
}


		function get_pv($data){

		}

	}