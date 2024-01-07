<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <?php
        include ("ketnoi.php");
            $tdn=$_POST["tendn"];
            $mk=$_POST["matkhau"];
            $cfmk= $_POST["nhaplaimatkhau"];
            $ht=$_POST["hoten"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            #confirmpassword
            if ($mk != $cfmk) {
                echo "<script language=javascript>
                        alert('Mật khẩu và xác nhận mật khẩu không khớp.'); 
                        window.location='signup.php';
                      </script>";
            } else {
            /*Kiểm tra tên người dùng này có hợp lệ không*/
            $sql_check_user_username="select * from tai_khoan where username='".$tdn."'";
            $result_check_username = mysqli_query($kn, $sql_check_user_username) or die(mysqli_error($kn));
            // $kq_1=mysqli_query($kn,$sql_1) or die ("Không thể truy xuất bảng tai_khoan".mysqli_error()); 
            if(mysqli_num_rows($result_check_username)>0){
                echo "<script language=javascript>
                        alert('Đã có tên đăng nhập này. Bạn hãy chọn tên đăng nhập khác!'); window.location='signup.php';
                    </script>";
            }/*hết phần kiểm tra*/
       
            /*PHẦN INSERT*/
            // $sql_2="insert into tai_khoan values('".$tdn."','".$mk."','".$ht."','".$email."','".$phone."')";
            $sql_2 = "INSERT INTO tai_khoan (username, password, hoten_user, email_user, phone_user) 
                      VALUES ('$tdn', '$mk', '$ht', '$email', '$phone')";

            $kq_2=mysqli_query($kn,$sql_2) or die ("Không thể thêm người dùng này".mysqli_error());
            $_SESSION["tai_khoan"]=$tdn; echo "<script language=javascript>
            alert('Đăng ký thành công'); window.location='login.php';
            </script>";
        }
    ?>
</body>
</html>
