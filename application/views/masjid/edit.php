<div class="col-md-12">
<h3 class="text-center"> Edit data masjid <?=$masjid['nama_masjid'];?> </h3>

<div class="col-md-6">

<form method="POST" action="<?=base_url();?>masjid/proses_edit">
<div class="form-group">
<input type="hidden" name="kode_masjid" value="<?=$masjid['kode_masjid'];?>">
<label> Nama Masjid </label>
<input type="text" class="form-control" name="nama_masjid" value="<?=$masjid['nama_masjid'];?>">
</div>

<div class="form-group">
<label> Jenis Masjid </label>
<select class="form-control" name="jenis_masjid">
<?php foreach($jenis as $j){
if($j['kode_jenis'] == $masjid['jenis_masjid']){
	$selected = "selected='selected'";
}else{
	$selected = "";
}
 ?>
<option value="<?php echo $j['kode_jenis'];?>" <?=$selected;?>> <?php echo $j['nama_jenis'];?> </option>
<?php } ?>

</select>

</div>

<div class="form-group">
<label> Alamat </label>
<textarea class="form-control" name="alamat" value="<?=$masjid['alamat'];?>"> <?=$masjid['alamat'];?></textarea>

</div>

<div class="form-group">
<label> Lama Berdiri (Tahun) </label>
<input type="text" name="lama_berdiri" class="form-control" value="<?=$masjid['lama_berdiri'];?>"> 
</div>

<div class="form-group">
<label> Jenis Kerusakan </label>
<select clas="form-control" name="tipe_kerusakan">
<?php $tipe_kerusakan = $this->gen->retrieve_many('tipe_kerusakan');
foreach($tipe_kerusakan as $tp){ 
if($tp['id'] == $masjid['tipe_kerusakan']){
	$selected = "selected='selected'";
}else{
	$selected = "";
}
?>
<option value="<?=$tp['id'];?>" <?=$selected;?>> <?=$tp['nama_tipe'];?> </option>

<?php 
}
?>
</select>
</div>

<div class="form-group">
<label> Lama Kerusakan (Bulan) </label>
<input type="text" name="lama_kerusakan" class="form-control" value="<?=$masjid['lama_kerusakan'];?>">

</div>

<div class="form-group">
<label> Intensitas Perbaikan </label>
<input type="text" name="intensitasperbaikan" class="form-control" value="<?=$masjid['intensitasperbaikan'];?>">

</div>

</div>

<div class="col-md-6">


<div class="form-group">
<label> Status Tanah </label>
<select class="form-control" name="status_tanah">
<?php $tanah  = $this->gen->retrieve_many('status_tanah'); 
foreach($tanah as $t){
if($t['id'] == $masjid['status_tanah']){
	$selected = "selected='selected'";
}else{
	$selected = "";
 }
 ?>
 <option value="<?=$t['id'];?>" <?=$selected;?>> <?=$t['nama_tanah'];?> </option>
}


<?php } ?>
</select>
</div>

<div class="form-group">
<label> Kapasitas Jamaah </label>
<input type="text" name="kapasitas_jamaah" class="form-control" value="<?=$masjid['kapasitas_jamaah'];?>">
</div>

<div class="form-group">
<label> Biaya (Perkiraan) </label>
<input type="text" name="biaya" class="form-control" value="<?=$masjid['biaya'];?>">
</div>

<div class="form-group">
<label> Kegiatan Masjid (Selain Sholat 5 Waktu) </label>
<select name="kegiatan_masjid">
<?php foreach($kegiatan as $kg){ 
if($kg['id'] == $masjid['kegiatan_masjid']){
	$selected = "selected='selected'";
}else{
	$selected = "";
}
?>
<option value="<?=$kg['id'];?>" <?=$selected;?>> <?=$kg['nama_kegiatan'];?> </option>
<?php 
}
?>
</select>

</div>


<div class="form-group">
<label> Luas Bangunan </label>
<input type="text" name="luas_bangunan" class="form-control" value="<?=$masjid['luas_bangunan'];?>">
</div>

<div class="form-group">
<label> Jarak Ke masjid terdekat </label>
<input type="text" name="jarak" class="form-control" value="<?=$masjid['jarak'];?>">
</div>


<button class="btn btn-primary pull-right" type="submit"> Simpan </button>

</div>


</div>

</form>
