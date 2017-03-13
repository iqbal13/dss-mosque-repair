  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/plugins/datatables.bootstrap.min.css"/>


<div class="col-md-12" style="min-height:5000px;">
<br />
<a class="btn btn-success" href="<?=base_url();?>importexcel"> Import Excel </a>
<a class="btn btn-primary pull-right" href="<?php echo base_url('masjid/tambah');?>"> Tambah Data Masjid </a>
<div style="margin-bottom: 30px;"> 
<?php //echo // @$this->session->flashdata('item'); 
?>
</div>
<h3 class="text-center"> Data Masjid dan Mushalla </h3>

<table class="table table-striped" id="datamasjid"> 
<thead>
<tr>
<th> No </th>
<th> Nama Masjid </th>
<?php for($x=1;$x<=11;$x++){ ?>
<th> P<?=$x;?> </th>
<?php } ?>
</tr>
</thead>
 <tbody>

<?php foreach($masjid as $k => $val){
	$je = $this->gen->retrieve_one('jenis_masjid',array('kode_jenis' => $val['jenis_masjid']));
	$tip = $this->gen->retrieve_one('tipe_kerusakan',array('id' => $val['tipe_kerusakan']));
	$tanah = $this->gen->retrieve_one('status_tanah',array('id' => $val['status_tanah']));
	if($val['kegiatan_masjid'] == 0) $val['kegiatan_masjid'] = 4;
	$kegiatan = $this->gen->retrieve_one('kegiatan_masjid',array('id' => $val['kegiatan_masjid']));

 ?>
<tr>
<td> <?php echo $k + 1; ?> </td>
<td> <?php echo $val['nama_masjid'];?> </td>
<td> <?=$val['biaya'];?> </td>
<td> <?=$val['kapasitas_jamaah'];?> </td>
<td> <?=$tip['nilai']; ?> </td>
<td> <?=$val['lama_kerusakan'];?> </td>
<td> <?=$val['intensitasperbaikan'];?> </td>
<td> <?=$val['jarak'];?> </td>
<td> <?=$kegiatan['nilai'];?> </td>
<td> <?php echo $je['nilai'];?> </td>
<td> <?=$val['luas_bangunan'];?> </td>
<td> <?=$tanah['nilai']; ?> </td>
<td> <?=$val['lama_berdiri'];?> </td>
</tr>
<?php } ?>
</tbody>
</table>


<?php if(isset($_SESSION['percobaan'])){ ?>

Anda Sudah melakukan <?=$_SESSION['percobaan'];?> kali percobaan,harap reset dahulu sebelum optimasi kembali atau klik halaman button report untuk melihat hasil optimasi anda sebelumnya  <br>
<a type="button" class="btn btn-danger" href="<?php echo base_url();?>optimasi/reset" id="resetoptimasi"> Reset Optimasi </a>
<a type="button" class="btn btn-info" href="<?php echo base_url();?>report"> Report </a>
<?php }else{ ?>

<br><br>
<div class="col-md-6">
<h3> Berapa Kali Optimasi ?  *Simulated Annealing </h3>
<input type="text" name="optimasikali" id="nilaioptimasi" class="form-control">   <br>
<button type="button"  class="btn btn-primary" id="optimasiwoy"> Optimasi </button>
</div>
<div class="clearfix"> </div>
<?php } ?>
<div id="loading_optimasi"> </div>
<div id="hasil_optimasi"> </div>
</div>
<script src="<?=base_url();?>assets/js/plugins/jquery.datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/plugins/datatables.bootstrap.min.js"></script>
<script>

$(document).ready(function(){
	 $("#datamasjid").DataTable();
	$("#optimasiwoy").click(function(){
		var nilaiopt = $("#nilaioptimasi").val();
		$.ajax({
			type:"POST",
			data:"do=optimasi&nilai="+nilaiopt,
			url:"<?php echo base_url()?>optimasi/anelingopt",
			beforeSend:function(){
				$("#nilaioptimasi").hide();
				$("#loading_optimasi").show();
				$("#optimasiwoy").hide();
				$("#loading_optimasi").html("<img src='<?php echo base_url();?>assets/ajax-loader.gif'> Proses Optimasi sedang berjalan ");

			},success:function(dt){
				$("#loading_optimasi").hide();
				$("#optimasiwoy").hide();	
				$("#hasil_optimasi").html(dt);
				
			}
		})


	});


});
</script>