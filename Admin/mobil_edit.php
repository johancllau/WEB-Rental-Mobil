<?php
$idmobil = $_GET["idmobil"];
include "../koneksi.php";
$sql = "select * from mobil where idmobil = '$idmobil'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die ("Gagal query. . .");

$data = mysqli_fetch_array($hasil);
$plat = $data["noplat"];
$merk = $data["merk"];
$nama = $data["nama"];
$warna = $data["warna"];
$harga = $data["harga"];
$foto = $data["foto"];
?>
<title>Form Edit Data Mobil</title>
<body bgcolor="#37988e">
<h2 align="center">.:: Edit Data Mobil ::.</h2><br><hr><br>
<center>
<form action="mobil_simpan.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="idmobil" value="<?php echo $idmobil;?>"/>
<table border="0" cellpadding="5" cellspacing="15">
<tr>
	<td>No Plat</td>
	<td><input type="text" name="plat" value="<?php echo $plat;?>" /></td>
</tr>
<tr>
	<td>Merk</td>
	<td><input type="text" name="merk" value="<?php echo $merk;?>"/></td>
</tr>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" value="<?php echo $nama;?>"/></td>
</tr>
<tr>
	<td>Warna</td>
	<td><input type="text" name="warna" value="<?php echo $warna;?>"/></td>
</tr>
<tr>
	<td>Harga Sewa</td>
	<td><input type="text" name="harga" value="<?php echo $harga;?>"/></td>
</tr>
<tr>
	<td>Status</td>
	<td>
	<select name="status">
		<option value="Ready">Ready</option>
		<option value="Disewa">Disewa</option>
	</select></td>
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
