<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Sewa</title>
    <style>
    * {
        margin:0; 
        padding:0;
    }

    nav {
        margin:auto;
        text-align: center;
        width: 100%;
        font-family: arial;
    } 

    nav ul {
        background:#37988e;
        padding: 0 20px;
        list-style: none;
        position: relative;
        display: inline-table;
        width: 100%;
     }

    nav ul li{
        float:left;
    }

    nav ul li:hover{
        background:#d68d9a;
    }

    nav ul li:hover a{
        color:#000;
    }

    nav ul li a{
        display: block;
        padding: 25px;
        color: #fff;
        text-decoration: none;
    }

    .topnav-right{
        float: right;
    }
    </style>

</head>
<body>

<nav>
    <ul>
        <li><a href="homeadmin.php">Home</a></li>
        <li><a href="inputdatamobil.php">Input Data Mobil</a></li>
        <li><a href="#">Input Data Sewa</a></li>
        <li><a href="datapenyewa.php">Data Penyewa</a></li>
        <li><a href="katalog_mobil_admin.php">Katalog Mobil</a></li>
         <div class="topnav-right">
            <li><a href="../logout.php">Log out</a></li>
        </div>
    </ul>
</nav>
<h2 align="center"> * INPUT DATA SEWA * </h2><br><hr><br>
<div align="center">
<form action="sewa_simpan.php" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="10" cellspacing="15">
<tr>
	<td><label for="Plat">Nomor Plat</label></td>
	<td><input type="text" name="plat" id="Plat" /></td>
</tr>
<tr>
	<td><label for="Nama_Mobil">Nama Mobil</label></td>
	<td><input type="text" name="namamobil" id="Nama_Mobil" /></td>
</tr>
<tr>
	<td><label for="Nama_Penyewa">Nama Penyewa</label></td>
	<td><input type="text" name="namasewa" id="Nama_Penyewa" /></td>
</tr>
<tr>
	<td><label for="Alamat">Alamat</label></td>
	<td><textarea cols="20" rows="5" name="alamat" id="Alamat" /></textarea></td>
</tr>
<tr>
	<td><label for="Tgl_Sewa">Tanggal Sewa</label></td>
	<td>
		<select name="tglsewa" id="Tgl_Sewa">
		<?php
			$bulan = date("M");
			$tahun = date("Y");
			for ($hari=1; $hari<=31 ; $hari++) {
			$htgl = str_pad($hari,2,"0",STR_PAD_LEFT);
			echo "<option value='$htgl/$bulan/$tahun'>$htgl /$bulan /$tahun</option>";
		}
		?>
	</select>
	</td>
</tr>
<tr>
	<td><label for="Durasi_Sewa">Durasi Sewa</label></td>
	<td><input type="text" name="durasi" id="Durasi_Sewa"/>hari</td>
</tr>
<tr>
	<td><label for="NoTelp">No.Telp</label></td>
	<td><input type="text" name="notelp" id="NoTelp"/></td>
</tr>
<tr>
	<td><label for="Foto_KTP">Foto KTP</label></td>
	<td><input type="file" name="foto" id="Foto_KTP"/></td>
</tr>

<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses"/>
	<input type="reset" value="Reset" name="reset"/>
	</td>
</tr>
</table>
</form>
</div>
</body>
</html>>
