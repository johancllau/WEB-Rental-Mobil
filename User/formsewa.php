<?php
include "../koneksi.php";
$idmobil = $_GET["idmobil"];
$sql = "select * from mobil where idmobil = '$idmobil'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die ("Gagal query. . .");
$plat="";
$data = mysqli_fetch_array($hasil);
$plat = $data["noplat"];
$nama = $data["nama"];
?>
<title>Form Sewa Mobil</title>
<body bgcolor="#37988e">
<h2 align="center"> === SEWA MOBIL === </h2>
<form action="sewa_simpan.php" method="post" enctype="multipart/form-data">

<table align="center" cellpadding="10" cellspacing="5">

<tr>
	<td>Nama Penyewa</td>
	<td><input type="text" name="namasewa" /></td>
</tr>
<tr>
	<td>Alamat</td>
	<td><textarea cols="20" rows="5" name="alamat"></textarea></td>
</tr>
<tr>
	<td>Tanggal Sewa</td>
	<td>
		<select name="tglsewa">
		<?php
			$bulan = date("M");
			$tahun = date("Y");
			for ($hari=1; $hari<=31 ; $hari++) {
			$htgl = str_pad($hari,2,"0",STR_PAD_LEFT);
			echo "<option value='$htgl/$bulan/$tahun'>$htgl /$bulan /$tahun</option>";
			echo "";

		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>Durasi Sewa</td>
	<td><input type="text" name="durasi">/hari</td>
</tr>
<tr>
	<td>No. Telp</td>
	<td><input type="text" name="notelp"></td>
</tr>
<tr>
	<td>Foto KTP</td>
	<td><input type="file" name="foto"></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses"/>
	<input type="reset" value="Reset" name="reset"/>
	<input type="button" value="Cancel" onclick="self.history.back()">
	</td>
</tr>
</table>
<br>
<table align="center" cellspacing="5" cellpadding="3">
<tr>
	<td>No Plat</td>
	<td><input type="text" name="plat" readonly value="<?php 
	$idmobil = $_GET["idmobil"];
	// include "../koneksi.php";
	$sql = "select * from mobil where idmobil = '$idmobil'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die ("Gagal query. . .");
	$plat="";
	$data = mysqli_fetch_array($hasil);
	$plat = $data["noplat"];
	echo $plat;?>" /></td>
</tr>
<tr>
	<td>Nama Mobil</td>
	<td><input type="text" name="namamobil" readonly
		 value="<?php 
	$idmobil = $_GET["idmobil"];
	// include "../koneksi.php";
	$sql = "select * from mobil where idmobil = '$idmobil'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die ("Gagal query. . .");
	$nama="";
	$data = mysqli_fetch_array($hasil);
	$nama = $data["nama"];
	echo $nama;?>"/></td>
</tr>
</table>
</form>
</body>