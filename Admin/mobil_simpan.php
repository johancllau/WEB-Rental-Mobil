<?php
	if(isset($_POST['idmobil']))
	{
		$idmobil = $_POST['idmobil'];
		$foto_lama = $_POST['foto_lama'];
		$simpan = "EDIT";
	}
	else
	{
		$simpan = "BARU";
	}
	$noplat = $_POST['plat'];
	$merk = $_POST['merk'];
	$nama = $_POST['nama'];
	$warna = $_POST['warna'];
	$harga = $_POST['harga'];
	$status = $_POST['status'];

	$foto = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$size = $_FILES['foto']['size'];
	$type = $_FILES['foto']['type'];
	$maxsize = 2500000;
	$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");
	$dirFoto = "pict";
	if (!is_dir($dirFoto))
	mkdir($dirFoto);
	$fileTujuanFoto = $dirFoto."/".$foto;
	$dirThumb = "thumb";
	if (!is_dir($dirThumb))
	mkdir($dirThumb);
	$fileTujuanThumb = $dirThumb."/t_".$foto;
	$dataValid="Ya";
	if ($size>0)
	{
		if($size>$maxsize)
		{
			echo "Ukuran File Terlalu Besar<br/>";
			$dataValid = "TIDAK";
		}
		if (!in_array ($type, $typeYgBoleh))
		{
			echo "Type File Tidak dikenal<br/>";
			$dataValid="Tidak";
		}
	}
	if(strlen(trim($nama)) == 0)
	{
		echo"Nama Mobil harus diisi! <br/>";
		$dataValid="TIDAK";
	}
	if(strlen(trim($harga))==0)
	{
		echo"Harga Sewa harus diisi! <br/>";
		$dataValid="TIDAK";
	}
	if(strlen(trim($status))==0)
	{
		echo"Status mobil harus diisi! <br/>";
		$dataValid="TIDAK";
	}
	if($dataValid == "TIDAK")
	{
		echo"Masih ada kesalahan, silahkan perbaiki </br>";
		echo"<input type='button' value='Kembali' onClick='self.history.back()'> ";
		exit;
	}
	include "../koneksi.php";
	
	if($simpan == "EDIT")
	{
		if($size == 0) {
			$foto = $foto_lama;
		}
		$sql = "update mobil set
				noplat	= '$noplat',
				merk	= '$merk',
				nama	= '$nama',
				warna	= '$warna',
				harga	= $harga,
				status	= '$status',
				foto	= '$foto'
				where idmobil = '$idmobil'";
	}
	else
	{
		$sql = "insert into mobil
			(noplat,merk,nama,warna,harga,status,foto)
			values
			('$noplat','$merk','$nama','$warna','$harga','$status','$foto')";
	}

	$hasil = mysqli_query ($kon,$sql);

	if(!$hasil)
	{
		echo"Gagal simpan, silahkan diulangi";
		echo mysqli_error($kon);
		echo"<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	}
	else
	{
		echo"Simpan data berhasil";
	}
	if($size>0)
	{
		if (!move_uploaded_file ($tmpName, $fileTujuanFoto))
		{
			echo "Gagal upload Gambar..<br/>";
			echo "<a href='barang_tampil.php'>Daftar Barang</a>";
			exit;
		}
		else
		{
			buat_thumbnail ($fileTujuanFoto,$fileTujuanThumb);
		}
	}
	echo "<br/>File sudah di upload.<br/>";
	function buat_thumbnail ($file_src,$file_dst)
	{
		list($w_src,$h_src,$type) = getImageSize ($file_src);
		switch($type)
		{
			case 1;
			$img_src = imagecreatefromgif($file_src);
			break;
			case 2;
			$img_src = imagecreatefromjpeg($file_src);
			break;
			case 3;
			$img_src = imagecreatefrompng($file_src);
			break;
		}
		$thumb = 100;
		if($w_src>$h_src)
		{
			$w_dst = $thumb;
			$h_dst = round ($thumb/$w_src*$h_src);
		}
		else
		{
			$w_dst = round($thumb/$h_src*$w_src);
			$h_dst=$thumb;
		}
		$img_dst = imagecreatetruecolor($w_dst,$h_dst);
		imagecopyresampled($img_dst,$img_src,0,0,0,0,$w_dst,$h_dst,$w_src,$h_src);
		imagejpeg($img_dst,$file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
	
?>
<hr/>
	<a href="katalog_mobil_admin.php"/>Katalog Mobil</a>