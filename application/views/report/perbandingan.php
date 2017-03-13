  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/plugins/datatables.bootstrap.min.css"/>
<div class="col-md-12">
<h3 class="text-center">  Decision Support Model for Mosque Renovation and Rehabilitation </h3>

<hr>
<div class="col-md-6">
<div class="grafik" style="width:100%;"></div>
<?php
$masjid = array();
$nilai = array();
$keluar = array();


  foreach($aneling as $k => $val){

    $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $val['kode_masjid']));
    array_push($masjid,"Masjid : ".$ma['nama_masjid']);
    array_push($nilai,$val['keluar']);
  }



    //cek_bro($_SESSION['hasil']);




 // foreach($_SESSION['hasil'] as $ke => $m){ 
	// $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $m[$ke]));
	// array_push($masjid," Masjid : ".$ma['nama_masjid']);
	// array_push($nilai,$m['keluar'][$k]);
 // }

// echo json_encode($masjid);
// echo "<br>";
// echo json_encode($nilai);
 ?>
  <div class="col-md-12">
<table class="table table-striped" id="datamasjid">
<thead>
<tr>
<th> No </th>
<th> Nama Masjid </th>
<th> Nilai DI </th>
<th> Keluar </th>
</tr>
</thead>
<?php foreach($aneling as $k => $val){
	$masjida = $this->gen->retrieve_one('masjid',array('kode_masjid' => $val['kode_masjid']));
	?>
<tr>
<th> <?=$k+1;?> </th>
<th><a href="<?php echo base_url();?>masjid/detail/<?=$masjida['kode_masjid'];?>"> <?=$masjida['nama_masjid'];?>  </a> </th>
<th> <?=$val['nilai'];?> </th>
<th> <?=$val['keluar'];?> </th>
</tr>

<?php } ?>

</table>
<br>
<?php
$wkt = $this->gen->retrieve_one('waktu_opt',array('tipe_opt' => 1)); ?>
<h3> waktu yang dikeluarkan adalah  <?=$wkt['waktu'];?> Seconds </h3>
</div>

</div>

<div class="col-md-6">



<div class="grafik2" style="width:100%;"></div>
<?php
$masjid2 = array();
$nilai2 = array();
$keluar2 = array();


  foreach($climbing as $k => $val){

    $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $val['kode_masjid']));
    array_push($masjid2,"Masjid : ".$ma['nama_masjid']);
    array_push($nilai2,$val['keluar']);
  }
 ?>
  <div class="col-md-12">
<table class="table table-striped" id="datamasjid2">
<thead>
<tr>
<th> No </th>
<th> Nama Masjid </th>
<th> Nilai DI </th>
<th> Keluar </th>
</tr>
</thead>
<?php foreach($climbing as $k => $val){
  $masjida = $this->gen->retrieve_one('masjid',array('kode_masjid' => $val['kode_masjid']));
  ?>
<tr>
<th> <?=$k+1;?> </th>
<th><a href="<?php echo base_url();?>masjid/detail/<?=$masjida['kode_masjid'];?>"> <?=$masjida['nama_masjid'];?>  </a> </th>
<th> <?=$val['nilai'];?> </th>
<th> <?=$val['keluar'];?> </th>
</tr>

<?php } ?>

</table>
<br>
<?php
$wkt2 = $this->gen->retrieve_one('waktu_opt',array('tipe_opt' => 2)); ?>
<h3> waktu yang dikeluarkan adalah  <?=$wkt2['waktu'];?> Seconds </h3>
</div>


</div>


<div class="col-md-12">
<center>
<a class="btn btn-danger btn-3x" href="<?=base_url();?>optimasi/reset"> RESET DATA </a>
</center>
</div>

</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modules/exporting.js"></script>

<script src="<?=base_url();?>assets/js/plugins/jquery.datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/plugins/datatables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $("#datamasjid").DataTable();
   $("#datamasjid2").DataTable();
});

$('.grafik').highcharts({
 chart: {
  type: 'column',
  marginTop: 80
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  shared: true,
  crosshairs: true,
  headerFormat: '<b>{point.key}</b>< br />'
 },
 title: {
  text: 'Hasil Optimasi Menggunakan Simulated Annealing Sebanyak  <?php echo $_SESSION['percobaan'] / 2; ?> Kali '
 },
 subtitle: {
  text: ''
 },
 xAxis: {
  categories: <?php echo json_encode($masjid); ?>,
  labels: {
   rotation: 0,
   align: 'center',
   style: {
    fontSize: '18px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: false
 },
 series: [{
  "name":"Keluar Sebanyak ",
  "data":<?php echo json_encode($nilai,JSON_NUMERIC_CHECK); ?>
  }]
});



$('.grafik2').highcharts({
 chart: {
  type: 'column',
  marginTop: 80
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  shared: true,
  crosshairs: true,
  headerFormat: '<b>{point.key}</b>< br />'
 },
 title: {
  text: 'Hasil Optimasi Menggunakan Hill Climbing Sebanyak  <?php echo $_SESSION['percobaan'] / 2; ?> Kali '
 },
 subtitle: {
  text: ''
 },
 xAxis: {
  categories: <?php echo json_encode($masjid); ?>,
  labels: {
   rotation: 0,
   align: 'center',
   style: {
    fontSize: '18px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: false
 },
 series: [{
  "name":"Keluar Sebanyak ",
  "data":<?php echo json_encode($nilai,JSON_NUMERIC_CHECK); ?>
  }]
});

</script>