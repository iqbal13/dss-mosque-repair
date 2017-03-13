<div class="col-md-12">
<h3> Tambah User </h3>
<hr>
<div class="col-md-6">
<form method="POST" action="<?=base_url();?>manajemenuser/prosestambah">
<div class="form-group">
<label> Username </label>
<input type="text" name="username" class="form-control">
</div>
<div class="form-group">
<label> Password </label>
<input type="text" name="username" class="form-control">
</div>
<div class="form-group">
<label> Level </label>
<select class="form-control" name="id_level">
<?php foreach($level as $l){ ?>
<option value="<?=$l['id_level'];?>"> <?=$l['nama_level'];?> </option>
<?php } ?>
</select>
</div>

<button class="btn btn-primary" type="submit"> Simpan </button>
</form>
</div>

</div>