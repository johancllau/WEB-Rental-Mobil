<title>Form Hapus Data Mobil</title>
<?php
	$idmobil = $_GET['idmobil'];
	include "../koneksi.php";
	$sql = "select * from mobil WHERE idmobil = '$idmobil' ";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil){
		die ("Gagal query...");
	}
	
	$data = mysqli_fetch_array($hasil);
	$noplat = $data["noplat"];
	$merk = $data["merk"];
	$nama = $data["nama"];
	$warna = $data["warna"];
	$harga = $data["harga"];
	$status = $data["status"];
	$foto = $data["foto"];

	echo "<body bgcolor='#37988e'><h2>Konfirmasi Hapus</h2>";
	echo "No. Plat   : ".$noplat."<br/>";
	echo "Merk       : ".$merk."<br/>";
	echo "Nama       : ".$nama."<br/>";
	echo "Warna      : ".$warna."<br/>";
	echo "Harga Sewa : ".$harga."<br/>";
	echo "Status     : ".$status."<br/>";
	echo "Foto       : <img src='thumb/t_".$foto."' /><br/><br/>";
	echo "APAKAH DATA INI AKAN DI HAPUS? <br/>";
	echo "<a href='mobil_hapus.php?idmobil=$idmobil&hapus=1'> YA </a>";
	echo "&nbsp; &nbsp;" ;
	echo "<a href='katalog_mobil_admin.php'> TIDAK </a> <br/><br/>";
	
	if(isset($_GET['hapus']))
	{
		$sql = "delete from mobil where idmobil = '$idmobil'";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil)
		{
			echo "Gagal Hapus Mobil : $nama ..<br/>";
			echo "<a href='katalogmobil.php'> Kembali Ke Daftar Mobil </a>";
		}
		else
		{
			$gbr = "pict/$foto";
			if(file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t_$foto";
			if(file_exists($gbr)) unlink($gbr);
			header('location:katalog_mobil_admin.php');
		}
	}
?>