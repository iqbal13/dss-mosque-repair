<?php 

	class Masjid extends CI_Controller {

		function __construct(){
			parent::__construct();
			check_auth();
		}

		function index(){

			$data['content'] = "masjid/list";

			$data['masjid'] = $this->gen->retrieve_many('masjid');

			$data['js_under'] = "masjid/js_under";
			$this->load->view('dashboard',$data);

		}

		function edit($id){

			$data['content'] = "masjid/edit";

			$data['masjid'] = $this->gen->retrieve_one('masjid',array('kode_masjid' => $id));
			$data['jenis'] = $this->gen->retrieve_many('jenis_masjid');
			$data['kegiatan'] = $this->gen->retrieve_many('kegiatan_masjid');
			$this->load->view('dashboard',$data);

		}

		function proses_edit(){


			$kode_masjid = $this->input->post('kode_masjid');

			$nama_masjid = $this->input->post('nama_masjid');
			$jenis_masjid = $this->input->post('jenis_masjid');
			$alamat = $this->input->post('alamat');
			$lama_berdiri = $this->input->post('lama_berdiri');
			$tipe_kerusakan = $this->input->post('tipe_kerusakan');
			$lama_kerusakan = $this->input->post('lama_kerusakan');
			$intensitasperbaikan = $this->input->post('intensitasperbaikan');
			$status_tanah = $this->input->post('status_tanah');
			$kapasitas_jamaah = $this->input->post('kapasitas_jamaah');
			$biaya = $this->input->post('biaya');;
			$kegiatan_masjid = $this->input->post('kegiatan_masjid');
			$luas_bangunan = $this->input->post('luas_bangunan');
			$jarak = $this->input->post('jarak');

			$dt = array(
				'nama_masjid' => $nama_masjid,
				'jenis_masjid' => $jenis_masjid,
				'alamat' => $alamat,
				'lama_berdiri' => $lama_berdiri,
				'tipe_kerusakan' => $tipe_kerusakan,
				'lama_kerusakan' => $lama_kerusakan,
				'intensitasperbaikan' => $intensitasperbaikan,
				'status_tanah' => $status_tanah,
				'kapasitas_jamaah' => $kapasitas_jamaah,
				'biaya' => $biaya,
				'kegiatan_masjid' => $kegiatan_masjid,
				'luas_bangunan' => $luas_bangunan,
				'jarak' => $jarak);

			$a = $this->db->update('masjid',$dt,array('kode_masjid' => $kode_masjid));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data Masjid Berhasil diubah </div>');
				redirect('masjid');
			}

		}

		function hapus($id){

			$kode_masjid = $id;

			$del = $this->db->delete('masjid',array('kode_masjid' => $kode_masjid));
			if($del){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data masjid berhasil dihapus </div>');
				redirect('masjid');
			}

		}


		function tambah(){
			$data['content'] = "masjid/tambah";

			$data['jenis'] = $this->gen->retrieve_many('jenis_masjid');

			$this->load->view('dashboard',$data);

		}

		function proses_input(){
			if($_POST){
				$p = $this->db->insert('masjid',$_POST);
				if($p){
					$this->session->set_flashdata('item','<div class="alert alert-info"> Data Masjid Berhasil Ditambahkan </div>');
					redirect('masjid');
				}
			}
		}

		function detail($id){
			$masjid = $this->gen->retrieve_one('masjid',array('kode_masjid' => $id));
			$data['masjid'] = $masjid;
			$data['jenis'] = $this->gen->retrieve_one('jenis_masjid',array('kode_jenis' => $masjid['jenis_masjid']));
			$data['tipe'] = $this->gen->retrieve_one('tipe_kerusakan',array('id' => $masjid['tipe_kerusakan']));
			$data['tanah'] =  $this->gen->retrieve_one('status_tanah',array('id' => $masjid['status_tanah']));
			$data['content'] = "masjid/detail";

			$this->load->view('dashboard',$data);

		}

		function input($id_data = ""){

			$data['content'] = "masjid/input";

			$data['jenis'] = $this->gen->retrieve_many('jenis_masjid');


			if($id_data != ""){
				$data['masjid'] = $this->gen->retrieve_one('masjid',array('kode_masjid' => $id_data));
			}

			$this->load->view('dashboard',$data);
		}


		function proses(){

			if($_POST){
				$p = $this->db->insert('masjid',$_POST);
				if($p){
					$this->session->set_flashdata('item','<div class="alert alert-info"> Data Masjid Berhasil Ditambahkan </div>');
					redirect('masjid');
				}
			}


		}

		// function detail($id){

		// 	$data['masjid'] = $this->gen->retrieve_one('masjid',array('kode_masjid' => $id));

		// 	$data['content'] = "masjid/detail_kerusakan";

		// 	$this->load->view('dashboard',$data);


		// }

		function tambahdetail(){

			print_r($_POST);
			// Array ( [kode_masjid] => 1 [nama_masjid] => Masjid A [lama_berdiri] => 10 [luas_bangunan] => 10 [lama_kerusakan] => 30 [intensitas_perbaikan] => 10 [tipe_kerusakan] => 1 [kapasitas_jamaah] => 500 [status_tanah] => 1 [biaya] => 100000 [kegiatan_masjid] => 3 [jarak] => 100 ) ;

			$dt = array(
				'lama_berdiri' => $_POST['lama_berdiri'],
				'luas_bangunan' => $_POST['luas_bangunan'],
				'lama_kerusakan' => $_POST['lama_kerusakan'],
				'intensitasperbaikan' => $_POST['intensitas_perbaikan'],
				'tipe_kerusakan' => $_POST['tipe_kerusakan'],
				'tingkat_jumlahjamaah' => $_POST['kapasitas_jamaah'],
				'biaya' => $_POST['biaya'],
				'status_tanah' => $_POST['status_tanah'],
				'kegiatan_masjid' => $_POST['kegiatan_masjid'],
				'jarak' => $_POST['jarak']);

			$a = $this->db->update('masjid',$dt,array('kode_masjid' => $_POST['kode_masjid']));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data Berhasil diubah </div>');
				redirect('masjid');
			}

		}
	}