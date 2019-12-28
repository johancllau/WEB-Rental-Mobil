







                    <img src='../admin/thumb/t_{$row['foto']}' width='100'/></td> ";
                <input type="radio" name="cari" value="merk">Merk</td>
            <li><a href="../logout.php">Log out</a></li>
            <td><input type="radio" name="cari" value="kapasitas">Kapasitas
            <td><input type="text" name=""></td>
            <td><input type="text" name="hargaawal" id="hargaawal" placeholder="harga mulai"></input>s/d<input type="text" name="hargaakhir" placeholder="harga akhir"></td>
            <td><label for="hargaawal">Mulai dari : </label></td>
            echo "  &nbsp;&nbsp;";
            echo "  </td>";
            echo "  <a href='formsewa.php?idmobil=".$row['idmobil']."'>SEWA</a>";
            echo "  <td> ";
            echo "  <td> <a href='../admin/pict/{$row['foto']}'/>
            echo "  <td>".$row['harga']." </td> ";
            echo "  <td>".$row['merk']." </td> ";
            echo "  <td>".$row['nama']." </td> ";
            echo "  <td>".$row['noplat']." </td> ";
            echo "  <td>".$row['status']." </td> ";
            echo "  <td>".$row['warna']." </td> ";
            echo " </tr>" ;
            echo " <tr>" ;
        $no = 0;
        $noplat = $_POST["plat"];
        </div>
        </tr>
        </tr>
        </tr>
        <div class="topnav-right">
        <li><a href="#">Catalog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="home_user.php">Home</a></li>
        <th width="100">Foto</th>
        <th width="100">Harga Sewa (per hari)</th>
        <th width="100">Merk</th>
        <th width="100">Nama</th>
        <th width="100">No Plat</th>
        <th width="100">Operasi</th>
        <th width="100">Status</th>
        <th width="100">Warna</th>
        <tr>
        <tr>
        <tr>
        background:#37988e;
        background:#d68d9a;
        color: #fff;
        color:#000;
        die("Gagal query..".mysqli_error($kon));
        display: block;
        display: inline-table;
        float: right;
        float:left;
        font-family: arial;
        list-style: none;
        margin:0; 
        margin:auto;
        padding: 0 20px;
        padding: 25px;
        padding:0;
        position: relative;
        text-align: center;
        text-decoration: none;
        while ($row = mysqli_fetch_assoc($hasil))
        width: 100%;
        width: 100%;
        {
        }
     }
    $hasil = mysqli_query($kon, $sql);
    $noplat = "";
    $sql = "select * from mobil where noplat like '%".$noplat."%' order by idmobil desc";
    * {
    .topnav-right{
    </style>
    </table>
    </tr>
    </ul>
    <?php
    <nav>
    <style>
    <table align="center">
    <title>Katalog Mobil</title>
    <tr>
    <ul>
    ?>
    if(!$hasil)
    if(isset($_POST["plat"]))
    include "../koneksi.php";
    nav ul li a{
    nav ul li:hover a{
    nav ul li:hover{
    nav ul li{
    nav ul {
    nav {
    }
    }
    }
    }
    }
    }
    } 
<!DOCTYPE html>
</body>
</center>
</div>
</form>
</head>
</html>
</nav>
</table>
<?php
<body>
<center>
<div align="center">
<form action="#" method="post" >
<h1 align="center">Daftar Mobil</h1><br><hr><br>
<head>
<hr>
<html>
<table border="1" align="center">
?>