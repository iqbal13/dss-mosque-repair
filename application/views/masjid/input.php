<div class="col-md-12">
<h3 class="text-center"> Input data masjid </h3>

<form method="POST" action="<?=base_url();?>masjid/proses">
<div class="form-group">
<label> Nama Masjid </label>
<input type="text" class="form-control" name="nama_masjid" value="">
</div>

<div class="form-group">
<label> Jenis Masjid </label>
<select class="form-control" name="jenis_masjid">
<?php foreach($jenis as $j){ ?>
<option value="<?php echo $j['kode_jenis'];?>"> <?php echo $j['nama_jenis'];?> </option>
<?php } ?>

</select>

</div>

<div class="form-group">
<label> Alamat </label>
<textarea class="form-control" name="alamat"> </textarea>

</div>


<button class="btn btn-primary pull-right" type="submit"> Simpan </button>

</form>

</div>