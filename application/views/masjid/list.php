  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/plugins/datatables.bootstrap.min.css"/>
<?php
//cek_bro($_SESSION);
?>
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
<th> Jenis Masjid </th>
<th> Alamat </th>
<th> Detail </th>
<th> Aksi </th>
</tr>
</thead>
 <tbody>

<?php foreach($masjid as $k => $val){
	$je = $this->gen->retrieve_one('jenis_masjid',array('kode_jenis' => $val['jenis_masjid']));
 ?>
<tr>
<td> <?php echo $k + 1; ?> </td>
<td> <?php echo $val['nama_masjid'];?> </td>
<td> <?php echo $je['nama_jenis'];?> </td>
<td> <?php echo $val['alamat']; ?> </td>
<td> <a href="<?php echo base_url();?>masjid/detail/<?php echo $val['kode_masjid'];?>"> <span class="fa fa-info"> </span> Detail </a> </td>
<td> 
<a href="<?=base_url();?>masjid/edit/<?=$val['kode_masjid'];?>"> <span class="fa fa-edit"> </span>  Edit </a>
<a href="<?=base_url();?>masjid/hapus/<?=$val['kode_masjid'];?>" onclick="return confirm('Apakah anda ingin menghapus data masjid ini ? ')"> <span class="fa fa-trash"> </span> Hapus </a> </td>
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
<form id="hahaform">
<h3> Berapa Kali Optimasi ? </h3>

<input type="text" name="optimasikali" id="nilaioptimasi" class="form-control">
<h4> Menggunakan Optimasi </h4>
 <select name="tipe_optimasi" id="tipeoptimasi" class="form-control">
<option value="1" id="sa"> Simulated Annealing </option>
<option value="2" id="hc"> Hill Climbing </option>
</select>
<br>
<button type="button"  class="btn btn-primary" id="optimasiwoy"> Optimasi </button>
</div>
</form>
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
		var tipeoptimasi = $("#tipeoptimasi").val();
		$.ajax({
			type:"POST",
			data:"do=optimasi&nilai="+nilaiopt+"&tipe="+tipeoptimasi,
			url:"<?php echo base_url()?>optimasi/newopt",
			beforeSend:function(){
				$("#reportbtn").hide();
				$("#resetbtn").hide();
				$("#hahaform").hide();
				$("#nilaioptimasi").hide();
				$("#loading_optimasi").show();
				$("#optimasiwoy").hide();
				$("#loading_optimasi").html("<img src='<?php echo base_url();?>assets/ajax-loader.gif'> Proses Optimasi sedang berjalan ");

			},success:function(dt){
				$("#hahaform").show();
				$("#loading_optimasi").hide();
								$("#nilaioptimasi").show();
	
				$("#hasil_optimasi").append(dt);

				$("#optimasiwoy").show();
				
			}
		})


	});


});
</script>