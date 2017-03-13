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
					$val['p10'] = "60";
				}else if($val['status_tanah'] == 2){
					$val['p10'] = "30";
				}else if($val['status_tanah'] == 3){
					$val['p10'] = "10";
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

		function anelingopt(){

			$_SESSION['percobaan'] = $_POST['nilai'];
			$nilai = $_POST['nilai'];
			
			$data = $this->getmaxmin();
			$param = $this->gen->retrieve_many('parameter');

			$hasil = array();
			$gunain = "Simulated Annealing";
			$this->benchmark->mark('code_start');
			$hasil = array("kode_masjid" => array(), "nilai" => array(), "keluar" => array());
			for($x=1;$x<=$nilai;$x++){
				//$nili = $this->fix_optimasi($data,$x,$param);
				//$bn = explode("-",$nili);
				$nili = $this->fix_optimasi($data,$x,$param);
				$bn  = explode("-",$nili);
				if(!in_array($bn[0],$hasil['kode_masjid'])){
					array_push($hasil['kode_masjid'],$bn[0]);
					array_push($hasil['nilai'],$bn[1]);
					array_push($hasil['keluar'],1);
				}else{

					$posisi =	array_search($bn[0],$hasil['kode_masjid']);
					//echo $posisi."<br>";



					$hasil['keluar'][$posisi] = $hasil['keluar'][$posisi] + 1;

				}

				//array_push($hasil['kode_masjid'],$bn[0]);
				//array_push($hasil['nilai'],$bn[1]);
				//array_push($hasil,array("kode_masjid" => $bn[0],"nilai" => $bn[1]));
			}
			//cek_bro($hasil);
			$this->session->set_userdata('hasil',$hasil);
			$this->benchmark->mark('code_end');		
			//cek_bro($hasil);
			//print_r(array_count_values($hasil['kode_masjid']));
			echo  "OPTIMASI sebanyak <b> ".$nilai." </b> kali Menggunakan ".$gunain." Berlangsung Selama : <i> ".$this->benchmark->elapsed_time('code_start', 'code_end')." </i> Seconds <br>";
		echo "<a class='btn btn-primary' href='".base_url()."report/do_report' id='reportbtn'> Report Semua Hasil </a>'";
		echo "<a class='btn btn-primary' href='".base_url()."report/new_report/1' id='reportbtn'> Report 3 Tertinggi </a>'";
		echo "<a class='btn btn-danger' href='".base_url()."optimasi/reset' id='resetbtn'> Reset </a>'";
					foreach($hasil['kode_masjid'] as $k => $v){

						$nilaix = $hasil['nilai'][$k];
						$keluarx = $hasil['keluar'][$k];
						$a = "INSERT INTO new_hasilopt VALUES ('$v','$nilaix','$keluarx',1)";
						$this->db->query($a);
					}


		}

		function newopt(){
			if(@$_SESSION['percobaan'] != ""){
				$_SESSION['percobaan'] = $_SESSION['percobaan'] + $_POST['nilai'];
			}else{
			$_SESSION['percobaan'] = $_POST['nilai'];
			}
			$nilai = $_POST['nilai'];
			
			$data = $this->getmaxmin();
			$param = $this->gen->retrieve_many('parameter');

			$tipeoptimasi = $_POST['tipe'];

			if($tipeoptimasi == 2){
			$hasil = array();
					$hasil = array("kode_masjid" => array(), "nilai" => array(), "keluar" => array());

					$gunain = "Hill Climbing";

					$this->benchmark->mark('code_start');

			for($x=1;$x<=$nilai;$x++){
				//$nili = $this->fix_optimasi($data,$x,$param);
				//$bn = explode("-",$nili);
				$nili = $this->hill_climbing($data,$x,$param);
				$bn  = explode("-",$nili);
				if(!in_array($bn[0],$hasil['kode_masjid'])){
					array_push($hasil['kode_masjid'],$bn[0]);
					array_push($hasil['nilai'],$bn[1]);
					array_push($hasil['keluar'],1);
				}else{

					$posisi =	array_search($bn[0],$hasil['kode_masjid']);
					//echo $posisi."<br>";
					$hasil['keluar'][$posisi] = $hasil['keluar'][$posisi] + 1;

				}
				//array_push($hasil,array("kode_masjid" => $bn[0],"nilai" => $bn[1]));
			}

			$this->benchmark->mark('code_end');



			}else{
			$hasil = array();
					$hasil = array("kode_masjid" => array(), "nilai" => array(), "keluar" => array());

			$gunain = "simulated annelaing";
					$this->benchmark->mark('code_start');


			for($x=1;$x<=$nilai;$x++){
				//$nili = $this->fix_optimasi($data,$x,$param);
				//$bn = explode("-",$nili);
				$nili = $this->fix_optimasi($data,$x,$param);
			$bn  = explode("-",$nili);
				if(!in_array($bn[0],$hasil['kode_masjid'])){
					array_push($hasil['kode_masjid'],$bn[0]);
					array_push($hasil['nilai'],$bn[1]);
					array_push($hasil['keluar'],1);
				}else{

					$posisi =	array_search($bn[0],$hasil['kode_masjid']);
					//echo $posisi."<br>";
					$hasil['keluar'][$posisi] = $hasil['keluar'][$posisi] + 1;

				}

				//array_push($hasil,array("kode_masjid" => $bn[0],"nilai" => $bn[1]));
			}
			$this->benchmark->mark('code_end');


			}

			$this->session->set_userdata('hasil',$hasil);

			//cek_bro($hasil);
			// for($x=1;$x<=$nilai;$x++){
			// 	//$nili = $this->fix_optimasi($data,$x,$param);
			// 	//$bn = explode("-",$nili);
			// 	$nili = $this->hill_climbing($data,$x,$param);

			// 	//array_push($hasil,array("kode_masjid" => $bn[0],"nilai" => $bn[1]));
			// }

			//cek_bro($hasil);



			echo " OPTIMASI sebanyak <b> ".$nilai." </b> kali Menggunakan ".$gunain." Berlangsung Selama : <i> ".$this->benchmark->elapsed_time('code_start', 'code_end')." </i> Seconds <br>";
		echo "<a class='btn btn-primary' href='".base_url()."report/do_report' id='reportbtn'> Report </a>'";
		echo "<a class='btn btn-danger' href='".base_url()."optimasi/reset' id='resetbtn'> Reset </a>'";

		$dt = array('tipe_opt' => $tipeoptimasi, 'waktu' => $this->benchmark->elapsed_time('code_start','code_end'),'percobaan' => $nilai);
		$this->db->insert('waktu_opt',$dt);

		foreach($hasil['kode_masjid'] as $k => $v){

						$nilaix = $hasil['nilai'][$k];
						$keluarx = $hasil['keluar'][$k];
						$a = "INSERT INTO new_hasilopt VALUES ('$v','$nilaix','$keluarx','$tipeoptimasi')";
						$this->db->query($a);
					}



		}

		function beforeoptimasi(){
			$data['masjid'] = $this->gen->retrieve_many('masjid');
			$data['content'] = "optimasi/before";


			$this->load->view('dashboard',$data);
		}

		function reset(){
			unset($_SESSION['hasil']);
			unset($_SESSION['percobaan']);
			$a = "DELETE FROM hasil_optimasi";
			$b = $this->db->query($a);
			$bb = $this->db->query("DELETE FROM new_hasilopt");
			$cc= $this->db->query("DELETE FROM waktu_opt");
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

		function hill_climbing($data = array(),$percobaan,$param){

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


			//echo "DI awal  adalah :".$dicpos." ada di posisi ".$cpos;
			$i = 1;
			while($i <= 10000000000){
				//mencari best neightbor
				$best_neightbor = $this->best_neightbor($cpos,$data,$param);
				$di = explode("-",$best_neightbor);
				


				if($dicpos >= $di[0]){
				
					$cpos = $cpos;
					$dicpos = $dicpos;

					//echo "Nilai sekarang ".$dicpos." ada di posisi ".$cpos." Lebih besar dibanding tetangga ".$di[0]." yang ada di posisi ".$di[1];

					break;

				}else{

					 $dicpos = $di[0];
					$cpos = $di[1];
			}
				//looping				
				$i++;

			}

			return $data[$cpos]['kode_masjid']."-".$dicpos;

			//setelah dapet hasil
			//$hasil = $this->get_nilai($cpos,$data,$param);

			//echo "<h1>";
			//echo "Nilai optimasi adalah :".$dicpos." yaitu masjid ".$data[$cpos]['nama_masjid'];

		// 		$aj = $this->gen->retrieve_one('hasil_optimasi',array('kode_masjid' => $data[$cpos]['kode_masjid']));

		// if(count($aj) == 0){
		// 	$dta = array(
		// 		'keluar' => 1,
		// 		'kode_masjid' => $data[$cpos]['kode_masjid'],
		// 		'nilai' => $dicpos);
		// 				$this->db->insert('hasil_optimasi',$dta);

		// }else{
		// 	$keluar = $aj['keluar'] + 1;
		// 	$dta = array('keluar' => $keluar);
		// 	$this->db->update('hasil_optimasi',$dta,array('kode_masjid' => $data[$cpos]['kode_masjid']));
		// }

			echo "<script>$('#hc').hide()</script>";

			if($percobaan >= $_SESSION['percobaan']){
				echo "<script>$('#optimasiwoy').hide()</script>";
			}else{
				echo "<script>$('#optimasiwoy').show()</script>";
			}

		}
		//optimasi gunain simulated annealing
		function fix_optimasi($data = array(),$percobaan,$param){
			if(isset($percobaan)){
				$percobaan = $percobaan + 1;
			}else{
				$percobaan = 1;
			}

			//mencari nilai awal random data
			$a = array_rand($data);

			$cpos = $a;
			$nilaiawal = $this->get_nilai($a,$data,$param);
			$dicpos = $nilaiawal;
			//nentuin temperatur awal
			$temp = 100;
			//temperatur 
			$opt = 60;
			while($temp >= $opt){
				$best_neightbor = $this->best_neightbor($cpos,$data,$param);
				$di = explode("-",$best_neightbor);
			
				if($di[0] >= $dicpos){
					$cpos = $di[1];
					$dicpos = $di[0];

				}else{
		
					$delta = $di[0]  - $dicpos;
					$rand = mt_rand(0,100) / 100;
					$np = exp(-$delta / $temp);
					if($np > $rand){
						$cpos = $di[1]; 
						$dicpos = $di[0];
					}else{
						$cpos = $cpos;
					}
			}
				//looping				
				$temp = $temp - 10;

			}

			return $data[$cpos]['kode_masjid']."-".$dicpos;

			//setelah dapet hasil
			//$hasil = $this->get_nilai($cpos,$data,$param);

			//echo "<h1>";
			//echo "Nilai optimasi adalah :".$dicpos." yaitu masjid ".$data[$cpos]['nama_masjid'];

		// 		$aj = $this->gen->retrieve_one('hasil_optimasi',array('kode_masjid' => $data[$cpos]['kode_masjid']));

		// if(count($aj) == 0){
		// 	$dta = array(
		// 		'keluar' => 1,
		// 		'kode_masjid' => $data[$cpos]['kode_masjid'],
		// 		'nilai' => $dicpos);
		// 				$this->db->insert('hasil_optimasi',$dta);

		// }else{
		// 	$keluar = $aj['keluar'] + 1;
		// 	$dta = array('keluar' => $keluar);
		// 	$this->db->update('hasil_optimasi',$dta,array('kode_masjid' => $data[$cpos]['kode_masjid']));
		// }

			echo "<script>$('#sa').hide()</script>";
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
			$di = round($di / 11,4);
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