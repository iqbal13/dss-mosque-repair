<div class="col-md-12" style="min-height:2000px;">
<h3 class="text-center"> DSS </h3>
<!-- <?php print_r($maxmin); ?>
 --><table class="table table-striped table-bordered">
<thead>
<tr>
<th> No </th>
<th> Nama Masjid </th>
<th> Alamat </th>
<?php for($x=1;$x<=11;$x++){ ?>
<th> P<?=$x;?> </th>
<?php } ?>
<!-- <th> DI </th>
 --></tr>

</thead>
<?php
 foreach($data as $key => $val){ ?>
<tr>
<td> <?=$key+1;?>  </td>
<td> <?=$val['nama_masjid'];?> </td>
<td> <?=$val['alamat']; ?> </td>
<?php for($x=1;$x<=11;$x++){ ?>
<td> <?=$val['v'.$x];?> </td>
<?php } ?>
<!-- <td> <?=$val['di'];?> </td>
 --></tr>
<?php } ?>
</table>

<button type="button"  class="btn btn-primary" id="optimasiwoy"> Optimasi </button>
<div id="loading_optimasi"> </div>
<div id="hasil_optimasi"> </div>

</div>

<script>

$(document).ready(function(){

	$("#optimasiwoy").click(function(){

		$.ajax({
			type:"POST",
			data:"do=optimasi",
			url:"<?php echo base_url()?>optimasi/do_optimasi",
			beforeSend:function(){
				$("#loading_optimasi").show();
				$("#loading_optimasi").html("<img src='<?php echo base_url();?>assets/ajax-loader.gif'> Proses Optimasi sedang berjalan ");

			},success:function(dt){
				$("#loading_optimasi").hide();
				$("#hasil_optimasi").html(dt);
			}
		})


	});


});
</script>