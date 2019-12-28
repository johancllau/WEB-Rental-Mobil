<?php
   include "koneksi.php";
   if (isset($_POST['daftar']) and !empty($_POST['daftar'])) {

   	$nama = $_POST['name'];
      $email = $_POST['email'];
   	$username = $_POST['username'];
   	$pass = $_POST['password'];
   	$jk = $_POST['jk'];
   	$notelp = $_POST['notelp'];

   	$falidate_date = true;
      if (isset($nama) and !empty($nama)) {
         if (strlen(trim($nama)) == 0) {
            $falidate_date = false;
            echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Name Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
         }
      }
   	if (isset($email) and !empty($email)) {
   		if (strlen(trim($email)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>E-mail Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($username) and !empty($username)) {
   		if (strlen(trim($username)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Username Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($pass) and !empty($pass)) {
   		if (strlen(trim($pass)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Password Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($jk) and !empty($jk)) {
   		if (strlen(trim($jk)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>Gender Harus Di Pilih<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	if (isset($notelp) and !empty($notelp)) {
   		if (strlen(trim($notelp)) == 0) {
   			$falidate_date = false;
   			echo "<body bgcolor='#37988e'>";
            echo "<H3 align='center'>No.Telp Tidak Boleh kosong<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
                  </table></body>";
   		}
   	}
   	$sql = "INSERT INTO user VALUES (
   			'".$username."','".$pass."','".$nama."','".$email."','".$jk."','".$notelp."',0);";
   	$hasil = mysqli_query($kon, $sql);
   	if (!$hasil) {
   		die("Gagal Input Data");
   	}
   	else {
         echo "<body bgcolor='#37988e'>";
   		echo "<H2 align='center'>Pendaftaran Berhasil</H2>";
   		echo "<table align='center'> 
   				<tr><td><a href='form_login.html'>click disini untuk login!!</td></tr></table></body>";
   	}
   }
 ?>