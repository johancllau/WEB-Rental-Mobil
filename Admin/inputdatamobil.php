<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mobil</title>
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
<body >

<nav>
    <ul>
        <li><a href="homeadmin.php">Home</a></li>
        <li><a href="#">Input Data Mobil</a></li>
        <li><a href="inputdatasewa.php">Input Data Sewa</a></li>
        <li><a href="datapenyewa.php">Data Penyewa</a></li>
        <li><a href="katalog_mobil_admin.php">Katalog Mobil</a></li>
         <div class="topnav-right">
            <li><a href="../logout.php">Log out</a></li>
        </div>
    </ul>
</nav>
<h2 align="center"> * INPUT DATA MOBIL * </h2><br><hr><br>
<div align="center">
<form action="mobil_simpan.php" method="post" enctype="multipart/form-data" >
	<table border="0" cellspacing="15" cellpadding="10">
		<tr>
			<td><label for="Plat">Nomor Plat</label></td>
			<td><input type="text" name="plat" id="Plat" /></td>
		</tr>
<tr>
	<td><label for="Merk">Merk</label></td>
	<td><input type="text" name="merk" id="Merk" /></td>
</tr>
<tr>
	<td><label for="Nama">Nama</label></td>
	<td><input type="text" name="nama" id="Nama" /></td>
</tr>
<tr>
	<td><label for="Warna">Warna</label></td>
	<td><input type="text" name="warna" id="Warna" /></td>
</tr>
<tr>
	<td><label for="Harga_Sewa">Harga sewa</label></td>
	<td><input type="text" name="harga" id="Harga_Sewa"/>per hari</td>
</tr>
<tr>
	<td><label for="Foto">Foto</label></td>
	<td><input type="file" name="foto" id="Foto"/></td>
</tr>
<tr>
	<td><label for="Status">Status</label></td>
	<td>
	<select name="status" id="Status">
		<option value="Ready">Ready</option>
		<option value="Disewa">Disewa</option>
	</select></td>
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
</html>