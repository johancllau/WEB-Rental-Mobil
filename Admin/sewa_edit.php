<?php
$idsewa = $_GET["idsewa"];
include "../koneksi.php";
$sql = "select * from sewa where idsewa = '$idsewa'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die ("Gagal query. . .");

$data = mysqli_fetch_array($hasil);
$plat = $data["noplat"];
$namamobil = $data["namamob"];
$namacust = $data["namacust"];
$alamat = $data["alamat"];
$tanggal = $data["tanggal"];
$durasi = $data["durasi"];
$notelp = $data["notelp"];
$foto = $data["foto"];
?>
<title>Form Edit Data Sewa</title>
<body bgcolor="#37988e">
<h2 align="center">.:: ISI DATA PENYEWA ::.</h2><br><hr><br>
<center>
<form action="sewa_simpan.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="idsewa" value="<?php echo $idsewa;?>"/>
<table border="0" cellpadding="5" cellspacing="10">
<tr>
	<td>No Plat</td>
	<td><input type="text" name="plat" value="<?php echo $plat;?>" /></td>
</tr>
<tr>
	<td>Nama Mobil</td>
	<td><input type="text" name="namamob" value="<?php echo $namamobil;?>"/></td>
</tr>
<tr>
	<td>Nama Penyewa</td>
	<td><input type="text" name="namacust" value="<?php echo $namacust;?>"/></td>
</tr>
<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" value="<?php echo $alamat;?>"/></td>
</tr>
<tr>
	<td>Tanggal</td>
	<td><select name="tglsewa">
		<?php
			$bulan = date("M");
			$tahun = date("Y");
			for ($hari=1; $hari<=31 ; $hari++) {
				$htgl = str_pad($hari,2,"0",STR_PAD_LEFT);
				echo "<option value='$htgl/$bulan/$tahun'>$tanggal</option>";
			}
			?>
		</select></td>
</tr>
<tr>
	<td>Durasi Sewa</td>
	<td><input type="text" name="harga" value="<?php echo $durasi;?>"/></td>
</tr>
<tr>
	<td>No. Telp</td>
	<td><input type="text" name="harga" value="<?php echo $notelp;?>"/></td>
</tr>
</tr>
<tr>
	<td>Foto</td>
	<td>
	<input type="file" name="foto">
	<input type="hidden" name="foto_lama" value="<?php echo $foto;?>"/><br/>
	<img src="<?php echo "thumb/t_".$foto;?>" width="100px"/>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses"/>
	<input type="button" value="Cancel" onclick="self.history.back()" />
	</td>
</tr>
</table>
</form>
</center>
</body>