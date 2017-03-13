<div class="col-md-12">
<h3> Tambah User </h3>
<hr>
<div class="col-md-6">
<form method="POST" action="<?=base_url();?>manajemenuser/prosesedit">
<input type="hidden" name="id_user" value="<?=$user['id_user'];?>">
<div class="form-group">
<label> Username </label>
<input type="text" name="username" class="form-control" value="<?=$user['username'];?>">
</div>
<div class="form-group">
<label> Password Baru </label>
<input type="password" name="password" class="form-control" id="password" value="" readonly="readonly">
</div>
<div class="form-group">
<input type="checkbox" id="ubahuser" name="ubahpassword" value="1"> Ubah Password 
</div>
<div class="form-group">
<label> Level </label>
<select class="form-control" name="id_level">
<?php foreach($level as $l){ 
	if($user['id_level'] == $l['id_level']){
		$selected = "selected='selected'";
	}else{
		$selected = "";
	}
	?>
<option value="<?=$l['id_level'];?>" <?=$selected;?>> <?=$l['nama_level'];?> </option>
<?php } ?>
</select>
</div>

<button class="btn btn-primary" type="submit"> Simpan </button>
</form>
</div>

</div>

<script>
$("#ubahuser").click(function(){
	$(this).hide();
	$("#password").removeAttr('readonly');

})

</script>