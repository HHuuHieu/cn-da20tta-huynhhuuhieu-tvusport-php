<?php
	include("../config/config.php");
	session_start();
	
	if (isset($_POST['action'])) {
		if ($_POST['action'] == 'dangnhap') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			// Truy vấn cho bảng tai_khoan
			$sql_user = "SELECT id FROM tai_khoan WHERE username='$username' AND password='$password'";
			$rs_user = mysqli_query($db, $sql_user);
			$count_user = mysqli_num_rows($rs_user);
			
			// Truy vấn cho bảng tk_admin
			$sql_admin = "SELECT id_ad FROM tk_admin WHERE username_ad='$username' AND password_ad='$password'";
			$rs_admin = mysqli_query($db, $sql_admin);
			$count_admin = mysqli_num_rows($rs_admin);
			
			if ($count_user == 1) {
				$_SESSION['login_user'] = $username;
				echo "Đăng nhập thành công (tài khoản user)";
			} elseif ($count_admin == 1) {
				$_SESSION['login_user'] = $username;
				echo "Đăng nhập thành công (tài khoản admin)";
			} else {
				echo "Tên đăng nhập hoặc mật khẩu không đúng!";
			}
		}
	}
?>
