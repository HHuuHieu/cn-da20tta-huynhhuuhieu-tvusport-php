<?php 
    session_start(); 
?>

    <?php
        include("ketnoi.php");
        $user=$_POST["tendn"];//nhận giá trị từ ô nhập liệu Tên đăng nhập của file dangnhap.php
        $pass=$_POST["matkhau"];//nhận giá trị từ ô nhập liệu Mật khẩu của file dangnhap.php
        $sql="select * from tai_khoan where username='".$user ."' and password ='". $pass."'"; // câu lệnh SQL-> kiểm tra tên đăng nhập và mật khẩu có trùng với tài khoản nguoi_dung trong csdl không
        $kq=mysqli_query($kn,$sql) or die ("Không thể mở bảng admin".mysqli_error());// thực thi câu lệnh SQL 
            if (mysqli_fetch_array($kq))
            {
                $_SESSION["tai_khoan"]=$user; echo ("<script language=javascript> alert('Đăng nhập thành công'); window.location='tintuc.php';
                </script> ");
            }
            else
            {
                $sql2 = "select *from tk_admin where username_ad = '".$user."' and password_ad = '".$pass."'";
                $kq2=mysqli_query($kn,$sql2);
                if(mysqli_num_rows($kq2)==1)
                {
                    $_SESSION["tk_admin"]=$user; echo ("<script language=javascript> alert('Đăng nhập thành công'); window.location='tintuc_admin.php';
                    </script> ");
                }
                else
                {
                    echo ("<script language=javascript> alert('Sai tên đăng nhập hoặc mật khẩu'); window.location='login.php';</script> ");
                }
            } 
           
    ?>

