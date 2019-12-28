<?php
include "koneksi.php";
	$username = $_POST['username'];
	$pas = $_POST['password'];

	$validate_data = true;

	if (strlen(trim($username))==0) {
		echo "<body bgcolor='#37988e'>";
		echo "<H3 align='center'>Username Tidak Boleh kosong<H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
		die();
	}
	if (strlen(trim($pas)) == 0) {
		echo "<body bgcolor='#37988e'>";
		echo "<H3 align='center'>Password Tidak Boleh Kosong</H3>";
		echo "<table border='0' align='center'>
			<tr>
				<td><input type='button' value='kembali' onClick='self.history.back()'></td>
			</tr>
		</table></body>";
		$validate_data=false;
	}

	if ($validate_data) {
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$pas'";
		$query = mysqli_query($kon, $sql);
		if(mysqli_num_rows($query)>0) {
			$row = mysqli_fetch_assoc($query);
			if($row['status'] == 1){
				$_SESSION['admin']=$username;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai Admin!"); document.location="admin/homeadmin.php";</script>';
			}
			elseif ($row['status'] == 0 ) {
				$_SESSION['user']=$username;
				echo '<script language="javascript">alert("Anda berhasil Login Sebagai User!"); document.location="user/home_user.php";</script>';
			}
			else {
				echo "<body bgcolor='#37988e'><H3 align='center'>Username dan Password Tidak Sesuai</H3>";
				echo "<table border='0' align='center'>
						<tr>
							<td><input type='button' value='kembali' onClick='self.history.back()'></td>
						</tr>
					  </table></body>";
			}
		}
		else {
			echo "<body bgcolor='#37988e'><H3 align='center'>Username dan Password Tidak Sesuai</H3>";
			echo "<table border='0' align='center'>
					<tr>
						<td><input type='button' value='kembali' onClick='self.history.back()'></td>
					</tr>
				 </table></body>";
		}
	}
	mysqli_close($kon);
    ob_end_flush();
?>