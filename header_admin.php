<!DOCTYPE html>
<html lang="en">
<head>
<title>TVU Sport</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  

  
  <script src="lib/jquery-3.4.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="lib/time_table/TimeTable.css" />
<script src="lib/time_table/createjs.min.js"></script>
<script src="lib/time_table/TimeTable.js"></script>
<link rel="stylesheet" type="text/css" href="lib/date_picker/daterangepicker.css" />
<script src="lib/date_picker/moment.min.js"></script>
<script src="lib/date_picker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/toast/jquery.toast.min.css" />
<script src="lib/toast/jquery.toast.min.js"></script>
<link rel="stylesheet" type="text/css" href="lib/chosen/chosen.css" />
<script src="lib/chosen/chosen.jquery.js"></script>
<script src="lib/common.js"></script>
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<script>
$(document).ready(function() {
	if (window.location.pathname == "/CN/soccer/tintuc_admin.php") {
		$("#navHome").css("color", "red");
	}
	if (window.location.pathname == "/CN/soccer/khachhang_admin.php") {
		$("#navKH").css("color", "red");
	}
	if (window.location.pathname == "/CN/soccer/doanhthu_admin.php") {
		$("#navDT").css("color", "red");
	}
	if (window.location.pathname == "/CN/soccer/san_admin.php") {
		$("#navSB").css("color", "red");
	}
});
</script>
</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="tintuc_admin.php">
              <img src="images/logo.png" alt="Logo">
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="dstintuc.php" class="nav-link">Q.lý tin tức</a></li>
                <li><a href="datsan_admin.php" class="nav-link">Q.lý đặt sân</a></li> 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Q.lý khách hàng
                  </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a id="navKH" class="dropdown-item" href="danhsachkhachhang.php">Thông tin tài khoản khách hàng</a>
                  <a class="dropdown-item" href="khachhang_admin.php">Thông tin khách hàng</a>
            </div>
            </li>
                <li><a href="doanhthu_admin.php" class="nav-link">Q.lý doanh thu</a></li>
                <li><a href="san_admin.php" class="nav-link">Q.lý sân bãi</a></li>
                <?php
           
                  // Kiểm tra xem người dùng đã đăng nhập chưa
                  if (isset($_SESSION['tk_admin'])) {
                    // Người dùng đã đăng nhập, hiển thị nút "Thoát"
                    echo '<li><a href="logout.php" class="nav-link">Thoát</a></li>';
                  } else {
                    // Người dùng chưa đăng nhập, hiển thị nút "Đăng nhập"
                    echo '<li><a href="login.php" class="nav-link">Đăng nhập</a></li>';
                  }
                ?>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>

    </header>

  