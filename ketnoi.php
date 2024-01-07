<?php
    $kn=mysqli_connect("localhost","root","") or die ("Không thể kết nối đến server".mysqli_error());
    $csdl=mysqli_select_db($kn, "quanlysanbong") or die ("Không thể chọn được csdl quanlysanbong".mysqli_error());
    mysqli_query($kn, "SET NAMES 'utf8'");
?>