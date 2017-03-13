<div class="col-md-12">

<h3> Manajemen User </h3>
<hr>
<a class="btn btn-primary" href="<?=base_url();?>manajemenuser/tambah"> Tambah User </a>
<table class="table table-striped" id="datauser">
<thead>
	<tr>
	<th> No </th>
	<th> Username </th>
	<th> Password </th>
	<th> Aksi </th>
	</tr>
</thead>

<tbody>
<?php foreach($user as $k => $val){ ?>
<tr>	
	<td> <?=$k+1;?> </td>
	<td> <?=$val['username'];?> </td>
	<td> ****** </td>
	<td> <a href="<?=base_url();?>manajemenuser/edit/<?=$val['id_user'];?>" class="btn btn-primary"> Edit </a>
	<a href="<?=base_url();?>manajemenuser/hapus/<?=$val['id_user'];?>" class="btn btn-danger"> Hapus </a>
	 </td>
</tr>

<?php } ?>


</tbody>

</table>


</div>