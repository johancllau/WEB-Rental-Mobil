<!DOCTYPE html>
<html>
<head>
    <title>Katalog Mobil</title>
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
        <li><a href="datapenyewa.php">Data Penyewa</a></li>
        <li><a href="#">Katalog Mobil</a></li>
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
	$sql = "select * from mobil where noplat like '%".$noplat."%' order by idmobil desc";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<h2>Daftar Mobil</h2><br><hr>
<a href="inputdatamobil.php" >INPUT MOBIL</a><br>
&nbsp; &nbsp; &nbsp;
<table border="1" align="center">
	<tr>
		<th width="100">No Plat</th>
		<th width="100">Merk</th>
		<th width="100">Nama</th>
		<th width="100">Warna</th>
		<th width="100">Harga Sewa (per hari)</th>
		<th width="100">Foto</th>
		<th width="100">Status</th>
		<th width="100">Operasi</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil))
		{
			echo " <tr>" ;
			echo " 	<td>".$row['noplat']." </td> ";
			echo "	<td>".$row['merk']." </td> ";
			echo "	<td>".$row['nama']." </td> ";
			echo " 	<td>".$row['warna']." </td> ";
			echo "	<td>".$row['harga']." </td> ";
			echo "	<td> <a href='pict/{$row['foto']}'/>
					<img src='thumb/t_{$row['foto']}' width='100'/></td> ";
			echo "	<td>".$row['status']." </td> ";
			echo "	<td> ";
			echo "	<a href='mobil_edit.php?idmobil=" .$row['idmobil']."'>EDIT</a>";
			echo "	&nbsp;";
			echo "  <a href='mobil_hapus.php?idmobil=" .$row['idmobil']."'>HAPUS</a>";
			echo "	</td>";
			echo " </tr>" ;
		}
	?>
</table>
</body>
</html>