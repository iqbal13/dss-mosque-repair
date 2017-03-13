
<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modules/exporting.js"></script>

<div class="col-md-12">
<div class="col-md-6">
<div class="jumbotron" style="background:"> 
<h3 class="text-center">

<?php $parameter = $this->gen->retrieve_many('parameter');
echo count($parameter); ?> Parameter </h3>
</div>

</div>


<div class="col-md-6">
<div class="jumbotron" style="background:"> 
<h3 class="text-center">
<?=count($masjid); ?> Masjid </h3>
</div>

</div>
</div>
<div class="clearfix"> </div>

<div class="col-md-6">
<div class="grafik" style="height:400px;"></div>
</div>
<div class="col-md-6">

<?php if(@$_SESSION['percobaan']){ ?>
<a href="<?=base_url();?>optimasi/reset" class="btn btn-danger"> Reset Data </a>
<div class="grafik2" style="width:100%; height:400px;"></div>
<?php 
$masjid = array();
$nilai = array();
$keluar = array();
// echo "<pre>";
// print_r($report);


  // foreach($_SESSION['hasil']['kode_masjid'] as $k =>  $m){

  //   $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $m));
  //   array_push($masjid,"Masjid : ".$ma['nama_masjid']);
  //   array_push($nilai,$_SESSION['hasil']['keluar'][$k]);

  // }





 foreach($report as $m){ 
  $ma = $this->gen->retrieve_one('masjid',array('kode_masjid' => $m['kode_masjid']));
  array_push($masjid,$ma['nama_masjid']);
  array_push($nilai,$m['keluar']);
 }

// echo json_encode($masjid);
// echo "<br>";
// echo json_encode($nilai);
  ?>
  <div class="col-md-12">
<table class="table table-striped">
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
<th> <a href="<?=base_url();?>masjid/detail/<?=$val['kode_masjid'];?>"><?=$masjida['nama_masjid'];?> </a>  </th>
<th> <?=$val['nilai'];?> </th>
<th> <?=$val['keluar'];?> </th>
</tr>

<?php } ?>

</table>

</div>
<?php  } else {
  echo "<h1> Belum ada Percobaan optimasi </h1>";

   } ?>

</div>
<script type="text/javascript">
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
  text: 'Hasil Optimasi Menggunakan Simulated Annealing Sebanyak  <?php echo $_SESSION['percobaan']; ?> Kali '
 },
 subtitle: {
  text: ''
 },
 xAxis: {
  categories: <?php echo json_encode($masjid); ?>,
  labels: {
   rotation: 0,
   align: 'right',
   style: {
    fontSize: '12px',
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
<script type="text/javascript">
$('.grafik').highcharts({
 chart: {
  type: 'pie',
  marginTop: 80
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
 },
 title: {
  text: 'Parameter Value'
 },
 subtitle: {
  text: 'DSS For Mosque Repair'
 },
 xAxis: {
  categories: ['JUMLAH SISWA SD TRITUNGGAL'],
  labels: {
   style: {
    fontSize: '10px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: true
 },
 plotOptions: {
   pie: {
     allowPointSelect: true,
     cursor: 'pointer',
     dataLabels: {
       enabled: false
     },
     showInLegend: true
   }
 },
 series: [{
   'name':'Parameter Value',
   'data':[
     ['Biaya',1500],
     ['Kapasitas Jamaah', 1400],
     ['Tipe Kerusakan',1300],
     ['Lama Kerusakan',1300],
     ['Intensitas Perbaikan',1200], 
     ['Jarak ke masjid terdekat' , 900],
     ['kegiatan masjid', 600],
     ['Jenis Masjid', 600],
     ['luas bangunan' , 500],
     ['lama berdiri' , 500],
     ['Status Tanah', 200]
   ]
 }]
});
</script>
</body>
</html>
