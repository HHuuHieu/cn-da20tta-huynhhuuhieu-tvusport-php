<?php 
session_start();
if(!isset($_SESSION["tk_admin"]))

{
echo "<script language=javascript>
alert('Bạn không có quyền trên trang này!');
window.location='login.php';   
 </script>";
}
?>   