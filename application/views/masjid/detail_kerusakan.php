<form method="POST" action="<?php echo base_url('masjid/tambahdetail');?>">
<div class="col-md-6">
<input type="hidden" name="kode_masjid" value="<?php echo $masjid['kode_masjid'];?>">
<div class="form-group">
<label> Nama Masjid </label>
<input type="text" name="nama_masjid" value="<?php echo $masjid['nama_masjid'];?>" class="form-control"> 
</div>

<div class="form-group">
<label> Jenis Masjid </label>
<select class="form-control">
<?php if($masjid['jenis_masjid'] == 1 OR $masjid['jenis_masjid'] == ""){ ?>
<option value="1"> Masjid </option>
<option value="2"> Mushalla </option>
<?php 
} else { ?>
<option value="2"> Mushalla </option>
<option value="1"> Masjid </option>

<?php } ?>
</select>

</div>

<div class="form-group">
<label> Lama Berdiri </label>
<input type="text" class="form-control" name="lama_berdiri" value="<?php if($masjid['tahun_berdiri'] == ""){ echo "";	 } else { echo $masjid['tahun_berdiri']; } ?>">
</div>

<div class="form-group">


</div>

<div class="form-group">
<label> Luas Bangunan </label>
<input type="text" class="form-control" name="luas_bangunan" value="<?php if($masjid['luas_bangunan'] == "") { echo ""; } else { echo $masjid['luas_bangunan']; } ?>">
</div>

<div class="form-group">
<label> Lama Kerusakan </label>
<input type="text" class="form-control" name="lama_kerusakan" value="<?php if($masjid['lama_kerusakan'] == "") { echo ""; } else { echo $masjid['lama_kerusakan']; } ?>">
</div>

<div class="form-group">
<label> Intensitas Perbaikan </label>
<input type="text" class="form-control" name="intensitas_perbaikan" value="<?php if($masjid['intensitasperbaikan'] == ""){ echo ""; } else { echo $masjid['intensitasperbaikan'];  } ?>">
</div>


</div>

<div class="col-md-6">
<div class="form-group">
<label> Tipe Kerusakan </label>
<select class="form-control" name="tipe_kerusakan"> 
<option value="1"> Rusak Ringan </option>
<option value="2"> Rusak Sedang </option>
<option value="3"> Rusak Berat </option>
</select>
</div>



<div class="form-group">
<label>Kapasitas Jamaah </label>
<input type="text" name="kapasitas_jamaah" value="" class="form-control">
</div>


<div class="form-group">
<label> Status Tanah </label>
<select class="form-control" name="status_tanah">
<option value="1"> Wakaf </option>
<option value="2"> SHM </option>
<option value="3"> GIRIK </option>
</select>

</div>

<div class="form-group">
<label> Biaya </label>
<input type="text" name="biaya" class="form-control">
</div>

<div class="form-group">
<label> Kegiatan Masjid </label>
<input type="text" name="kegiatan_masjid" class="form-control">
</div>

<div class="form-group">
<label> Jarak Ke masjid/musolah terdekat </label>
<input type="text" name="jarak" class="form-control">
</div>
<a class="btn btn-danger pull-right" href="<?php echo base_url('masjid');?>"> Back </a>
<button class="btn btn-info pull-right" type="submit"> Simpan </button>

</div>

</form>