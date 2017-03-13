<?php 

//print_r($masjid);

?>
<div class="col-md-6">
<h3> Detail <?php echo $masjid['nama_masjid'];?> </h3>
<p>
<table class="table table-striped">
<tr>
<td> Nama Masjid  </td> <td> : </td> <td> <?=$masjid['nama_masjid'];?> </td>
</tr>
<tr>
<td> Jenis Masjid </td> <td> : </td> <td> <?=$jenis['nama_jenis'];?> </td>
</tr>
<tr>
<td> Alamat </td> <td>  : </td> <td> <?=$masjid['alamat']; ?> </td>
</tr>
<tr>
<td> Tipe Kerusakan </td> <td> : </td> <td> <?=$tipe['nama_tipe']; ?> </td>
</tr>
<tr>
<td> Lama Kerusakan </td> <td> : </td> <td> <?=$masjid['lama_kerusakan'];?> Bulan </td>
</tr>
<tr>
<td> Intensitas Perbaikan </td> <td> : </td> <td> <?=$masjid['intensitasperbaikan'];?> </td>
</tr>
<tr>
<td> Kapasitas Jamaah </td> <td> : </td> <td> <?=$masjid['kapasitas_jamaah'];?> </td>
</tr>
<tr>
<td> Status Tanah </td> <td> : </td> <td> <?=$tanah['nama_tanah'];?> </td>
</tr>
<tr>
<td> Luas Bangunan </td> <td> : </td> <td> <?=$masjid['luas_bangunan'];?> M2 </td>
</tr>
<tr>
<td> Lama Berdiri </td> <td> : </td> <td> <?=$masjid['lama_berdiri'];?> Tahun </td>
</tr>
<tr>
<td> Jarak Ke masjid terdekat </td> <td> : </td> <td> <?=$masjid['jarak'];?> M </td>
</tr>
<tr>
<td> Biaya </td> <td> : </td> <td> Rp. <?=$masjid['biaya'];?> </td>
</tr>
<tr>
<td> Kegiatan Masjid </td> <td> : </td> <td> <?php if($masjid['kegiatan_masjid'] == 1){
	echo "Pengajian";
}else if($masjid['kegiatan_masjid'] == 2){
	echo "Majelis Ta'Lim ";
}else if($masjid['kegiatan_masjid'] == 3){
	echo "Pengajian dan Majelis Ta'Lim";
}else {
	echo "Tidak ada";
}
?>
</td>
</tr>
</table>
</p>
</div>