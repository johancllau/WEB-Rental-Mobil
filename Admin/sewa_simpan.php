<?php
if (isset($_POST['idsewa'])) {
	$idmobil = $_POST['idsewa'];
	$foto_lama = $_POST['foto_lama'];
	$simpan = "EDIT";
}else {
	$simpan = "BARU";
}
$noplat =$_POST['plat'];
$namamob =$_POST['namamobil'];
$namasewa =$_POST['namasewa'];
$alamat =$_POST['alamat'];
$tglsewa =$_POST['tglsewa'];
$durasi =$_POST['durasi'];
$notelp =$_POST['notelp'];


$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];

$maxsize = 2500000;
$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");

$dirFoto = "pict";
if(!is_dir($dirFoto))
mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb = "thumb";
if(!is_dir($dirThumb))
mkdir($dirThumb);
$fileTujuanThumb = $dirThumb."/t_".$foto;

if ($size > 0){
	if ($size > $maxsize) {
		echo "Ukuran File Terlalu Besar <br/>";
		$dataValid="TIDAK";
	}
	if (!in_array($type, $typeYgBoleh)) {
		echo "Type File Tidak Dikenal";
		$dataValid="TIDAK";
	}
}


$dataValid="Ya";
if(strlen(trim($noplat))==0){
	echo"No Plat harus diisi! <br/>";
	$dataValid="TIDAK";
}
if(strlen(trim($namasewa))==0){
	echo"Nama Penyewa harus diisi! <br/>";
	$dataValid="TIDAK";
}

if(strlen(trim($namamob))==0){
	echo"Nama Mobil harus diisi! <br/>";
	$dataValid="TIDAK";
}

if(strlen(trim($alamat))==0){
	echo"Alamat Penyewa harus diisi! <br/>";
	$dataValid="TIDAK";
}


if($dataValid == "TIDAK"){
	echo"Masih ada kesalahan, silahkan perbaiki </br>";
	echo"<input type='button' value='Kembali' onClick='self.history.back()'> ";
	exit;
}

include "../koneksi.php";

if ($simpan== "EDIT") {
	if ($size==0) {
		$foto = $foto_lama;
	}
	$sql = "update sewa
			noplat = '$noplat',
			namamob = $namamob,
			namacust = $namasewa,
			alamat = $alamat,
			tanggal = $tglsewa,
			durasi = $durasi,
			notelp = $notelp,
			foto = '$foto'
			where idsewa = $idsewa";
}else{
	$sql = "insert into sewa
			(noplat,namamob,namacust,alamat,tanggal,durasi,notelp,foto)
			values
			('$noplat',$namamob,$namasewa,$alamat,$tglsewa,$durasi,$notelp,'$foto')";
}

$sql = "insert into sewa (noplat,namamob,namacust,alamat,tanggal,durasi,notelp,foto)
values ('$noplat','$namamob','$namasewa','$alamat','$tglsewa','$durasi','$notelp','$foto')";
$hasil = mysqli_query($kon,$sql);

if(!$hasil){
	echo"<body bgcolor='#37988e'><center>Gagal simpan, silahkan diulangi";
	echo mysqli_error($kon);
	echo"<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
	exit;
}

else{
	echo"<body bgcolor='#37988e'><center>Simpan data berhasil";
}

if ($size > 0) {
	if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal Upload Gambar ...";
		echo "<a href='barang_tampil.php'>Daftar Barang</a>";
		exit;
	}else{
		buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
	}
}

function buat_thumbnail($file_src, $file_dst){
	// hapus jika thumbnail sebelumnya sudah ada
	list($w_src,$h_src,$type) = getImageSize($file_src);
	
	switch ($type) {
		case 1 : // gif -> jpg
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2 : // jpeg -> jpg
			$img_src = imagecreatefromjpeg($file_src);
			break;
		case 3 : // png -> jpg
			$img_src = imagecreatefrompng($file_src);
			break;
	}

	$thumb = 100; //max. size untuk thumb
	if($w_src>$h_src){
		$w_dst = $thumb; //landscape
		$h_dst = round($thumb / $w_src * $h_src);
	} else {
		$w_dst = round($thumb / $h_src * $w_src); //potrait
		$h_dst = $thumb;
	}

	$img_dst = imagecreatetruecolor($w_dst,$h_dst) ; //resample
	imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);

	imagejpeg($img_dst,$file_dst); // simpan thumbnail
	// bersihkan memori
	imagedestroy($img_src);
	imagedestroy($img_dst);
}
?>
<hr/>
<a href="datapenyewa.php" />DATA PENYEWA</a>