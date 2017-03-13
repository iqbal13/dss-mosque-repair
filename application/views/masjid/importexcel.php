<div class="col-md-12">
<h3> Form Import Data masjid dengan excel <a href="<?=base_url();?>masjid" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>  </h3>

			<hr>

<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
		
			
			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="<?=base_url();?>importexcel/upload" enctype="multipart/form-data">
				<a href="<?=base_url();?>temp/format.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>
				
				<!-- 
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">
				
				<button type="submit" id="btnpreview" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Upload
				</button>
			</form>
			
			<hr>
			
			<!-- Buat Preview Data -->
		
		</div>

</div>


<script>


</script>