<title>Form Hapus Data Sewa</title>
<?php
	$idsewa = $_GET['idsewa'];
	include "../koneksi.php";
	$sql = "select * from sewa WHERE idsewa = '$idsewa' ";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil){
		die ("Gagal query...");
	}
	
	$data = mysqli_fetch_array($hasil);
	$noplat = $data["noplat"];
	$namamobil = $data["namamob"];
	$namacust = $data["namacust"];
	$alamat = $data["alamat"];
	$tanggal = $data["tanggal"];
	$durasi = $data["durasi"];
	$notelp = $data["notelp"];
	$foto = $data["foto"];
	
	echo "<body bgcolor='#37988e'><h2>Konfirmasi Hapus</h2>";
	echo "No. Plat : ".$noplat."<br/>";
	echo "Nama Mobil : ".$namamobil."<br/>";
	echo "Nama Penyewa : ".$namacust."<br/>";
	echo "Alamat : ".$alamat."<br/>";
	echo "Tanggal sewa : ".$tanggal."<br/>";
	echo "Durasi : ".$durasi."<br/>";
	echo "No. Telp : ".$notelp."<br/>";
	echo "Foto : <img src='thumb/t_".$foto."' /><br/><br/>";
	echo "APAKAH DATA INI AKAN DI HAPUS? <br/>";
	echo "<a href='sewa_hapus.php?idsewa=$idsewa&hapus=1'> YA </a>";
	echo "&nbsp; &nbsp;" ;
	echo "<a href='datapenyewa.php'> TIDAK </a> <br/><br/>";
	
	if(isset($_GET['hapus']))
	{
		$sql = "delete from sewa where idsewa = '$idsewa'";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil)
		{
			echo "Gagal Hapus Data Penyewa : $namacust ..<br/>";
			echo "<a href='datapenyewa.php'> Kembali Ke Daftar Penyewa </a>";
		}
		else
		{
			$gbr = "pict/$foto";
			if(file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t_$foto";
			if(file_exists($gbr)) unlink($gbr);
			header('location:datapenyewa.php');
		}
	}
?>