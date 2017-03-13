<div class="col-md-12">
<h3 class="text-center"> Input data masjid </h3>

<div class="col-md-6">

<form method="POST" action="<?=base_url();?>masjid/proses_input">
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

<div class="form-group">
<label> Lama Berdiri (Tahun) </label>
<input type="text" name="lama_berdiri" class="form-control"> 
</div>

<div class="form-group">
<label> Jenis Kerusakan </label>
<select clas="form-control" name="tipe_kerusakan">
<option value="3"> Rusak Ringan </option>
<option value="2"> Rusak Sedang </option>
<option value="1"> Rusak Berat </option>
</select>
</div>

<div class="form-group">
<label> Lama Kerusakan (Bulan) </label>
<input type="text" name="lama_kerusakan" class="form-control">

</div>

<div class="form-group">
<label> Intensitas Perbaikan </label>
<input type="text" name="intensitasperbaikan" class="form-control">

</div>

</div>

<div class="col-md-6">


<div class="form-group">
<label> Status Tanah </label>
<select class="form-control" name="status_tanah">
<option value="1"> Wakaf </option>
<option value="2"> SHM </option>
<option value="3"> Girik</option>
</select>
</div>

<div class="form-group">
<label> Kapasitas Jamaah </label>
<input type="text" name="kapasitas_jamaah" class="form-control">
</div>

<div class="form-group">
<label> Biaya (Perkiraan) </label>
<input type="text" name="biaya" class="form-control">
</div>

<div class="form-group">
<label> Kegiatan Masjid (Selain Sholat 5 Waktu) </label>
<select name="kegiatan_masjid">
<option value="4"> Tidak Ada </option>
<option value="1"> Pengajian </option>
<option value="2"> Majelis Ta' Lim </option>
<option value="3"> Keduanya </option>
</select>

</div>


<div class="form-group">
<label> Luas Bangunan </label>
<input type="text" name="luas_bangunan" class="form-control">
</div>

<div class="form-group">
<label> Jarak Ke masjid terdekat </label>
<input type="text" name="jarak" class="form-control">
</div>


<button class="btn btn-primary pull-right" type="submit"> Simpan </button>

</div>


</div>

</form>
