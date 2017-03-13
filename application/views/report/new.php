  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/plugins/datatables.bootstrap.min.css"/>

<div class="grafik" style="width:100%;"></div>
<?php
$masjid = array();
$nilai = array();
$keluar = array();
// echo "<pre>";
// print_r($report);
  
  // $baz = asort($_SESSION['hasil']['keluar']);

  // foreach($_SESSION['hasil']['kode_masjid'] as $k =>  $m){

  //   $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $m));
  //   array_push($masjid,"Masjid : ".$ma['nama_masjid']);
  //   array_push($nilai,$_SESSION['hasil']['keluar'][$k]);

  // }


  foreach($report as $k => $val){

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
<?php foreach($report as $k => $val){
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
<a class="btn btn-danger" href="<?=base_url();?>optimasi/reset"> RESET DATA </a>

</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modules/exporting.js"></script>

<script src="<?=base_url();?>assets/js/plugins/jquery.datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/plugins/datatables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $("#datamasjid").DataTable();

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
  text: 'Hasil Optimasi Menggunakan Simulated Annealing Sebanyak  <?php echo $_SESSION['percobaan']; ?> Kali '
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