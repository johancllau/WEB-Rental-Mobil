<!DOCTYPE html>
<html>
<head>
    <title>Data Penyewa</title>
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
        <li><a href="inputdatasewa.php">Input Data Sewa</a></li>
        <li><a href="#">Data Penyewa</a></li>
        <li><a href="katalog_mobil_admin.php">Katalog Mobil</a></li>
        <div class="topnav-right">
            <li><a href="../logout.php">Log out</a></li>
        </div>
    </ul>
</nav>
<?php
	$noplat = "";
	if(isset($_POST["plat"]))
		$noplat = $_POST["plat"];
	include "../koneksi.php";
	$sql = "select * from sewa where noplat like '%".$noplat."%' order by idsewa desc";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<h2>DATA PENYEWA</h2><br><hr>
<a href="inputdatasewa.php">INPUT SEWA</a><br>
&nbsp; &nbsp; &nbsp;
<table border="1" align="center" >
	<tr>
		<th width="100">No Plat</th>
		<th width="100">Nama Mobil</th>
		<th width="100">Nama Penyewa</th>
		<th width="100">Alamat</th>
		<th width="100">Tanggal Sewa</th>
		<th width="100">Durasi</th>
		<th width="100">No. Telp</th>
		<th width="100">Foto</th>
		<th width="100">Operasi</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil))
		{
			echo " <tr>" ;
			echo " 	<td>".$row['noplat']." </td> ";
			echo "	<td>".$row['namamob']." </td> ";
			echo "	<td>".$row['namacust']." </td> ";
			echo " 	<td>".$row['alamat']." </td> ";
			echo "	<td>".$row['tanggal']." </td> ";
			echo "	<td>".$row['durasi']." hari</td> ";
			echo "	<td>".$row['notelp']." </td> ";
			echo "	<td> <a href='../user/pict/{$row['foto']}'/>
					<img src='../user/thumb/t_{$row['foto']}' width='100'/></td> ";
			echo "	<td> ";
			echo "	<a href='sewa_edit.php?idsewa=" .$row['idsewa']."'>EDIT</a>";
			echo "	&nbsp;";
			echo "  <a href='sewa_hapus.php?idsewa=" .$row['idsewa']."'>HAPUS</a>";
			echo "	</td>";
			echo " </tr>" ;
		}
	?>
</table>
</body>
</html>