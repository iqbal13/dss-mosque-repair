<?php

	class Importexcel extends CI_Controller {

		function __construct(){
			parent::__construct();
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
            check_auth();

        }

		function index(){

			$data['content'] = "masjid/importexcel";

			$this->load->view('dashboard',$data);
		}


		function upload(){

			// Jika user telah mengklik tombol Preview

  $fileName = strtotime(date('Y-m-d H:i:s'));
        $config['upload_path'] = './temp/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(!$this->upload->do_upload('file'))
        $this->upload->display_errors();
        $media = $this->upload->data();

        
        $inputFileName = 'temp/'.$media['file_name'];
        // print_r($_FILES);
        // exit;
        try {
               $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 3; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                $nama_masjid = $rowData[0][1];
                $alamat_masjid = $rowData[0][2];
                $jenis_masjid = $rowData[0][3];
                $lama_berdiri = $rowData[0][4];
                $jenis_kerusakan = $rowData[0][5];
                $intensitas_perbaikan = $rowData[0][6];
                $lama_kerusakan = $rowData[0][7];
                $status_tanah = $rowData[0][8];
                $kapasitas_jamaah = $rowData[0][9];
                $biaya = $rowData[0][10];
                $kegiatan = $rowData[0][11];
                $luas_bangunan = $rowData[0][12];
                $jarak = $rowData[0][13];


                $dxx = array(
                	'nama_masjid' => $nama_masjid,
                	'alamat' => $alamat_masjid,
                	'jenis_masjid' => $jenis_masjid,
                	'lama_berdiri' => $lama_berdiri,
                	'tipe_kerusakan' => $jenis_kerusakan,
                	'intensitasperbaikan' => $intensitas_perbaikan,
                	'status_tanah' => $status_tanah,
                	'lama_kerusakan' => $lama_kerusakan,
                	'kapasitas_jamaah' => $kapasitas_jamaah,
                	'biaya' => $biaya,
                	'kegiatan_masjid' => $kegiatan,
                	'luas_bangunan' => $luas_bangunan,
                	'jarak' => $jarak);

                $ff = $this->db->insert('masjid',$dxx);



                //Sesuaikan sama nama kolom tabel di database                                
                //  $data = array(
                //     "idimport"=> $rowData[0][0],
                //     "nama"=> $rowData[0][1],
                //     "alamat"=> $rowData[0][2],
                //     "kontak"=> $rowData[0][3]
                // );
                 
                // //sesuaikan nama dengan nama tabel
                // $insert = $this->db->insert("eimport",$data);
               // delete_files($media['file_path']);
                     
            }
            $this->session->set_flashdata('item','<div class="alert alert-info"> Data Berhasil ditambahkan </div>');
       redirect('masjid');
    }

		

	}