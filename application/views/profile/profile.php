<div class="col-md-6">
<h3> Edit Password Anda </h3>

<form method="POST" action="<?=base_url();?>profile/edit_password">
<div class="form-group">
<label> Password Lama </label>
<input type="password" name="password_lama" class="form-control" required="required">
</div>
<div class="form-group">
<label> Password Baru </label>
<input type="password" name="password_baru" class="form-control" required="required">
</div>
<button type="submit" name="btnsubmit" class="btn btn-primary"> Ubah Password </button>
</form>

</div>
<div class="clearfix"> </div>