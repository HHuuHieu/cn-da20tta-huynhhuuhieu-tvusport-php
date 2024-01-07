<?php
    include("session.php");
    include("header_user.php");

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['tai_khoan'])) {
        header("location: login.php");
        die();
    }

    // Lấy thông tin tài khoản từ session
    $taiKhoan = $_SESSION['tai_khoan'];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlysanbong";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Lấy thông tin tài khoản
    $sql = "SELECT * FROM tai_khoan WHERE username = '$taiKhoan'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
?>
<style>
    body, h1, h2, h3, p {
        margin: center;
        padding: 0;
        
    }

    body {
        font-family: 'Lato', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
    }

    .overlay {
        position: relative;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding: 100px 0;
    }

    .hero h1 {
        font-size: 2.5em;
        color: #fff; /* Text color for the hero section */
    }

    .container {
        width: 100%;
        margin: 0 auto;
    }

    .site-section {
        /* Add styles for the dark background section */
        background-color: #343a40;
        color: #fff;
        padding: 40px 0;
    }

    .widget-title h3 {
        color: #fff; /* Widget title text color */
    }

    .widget-next-match {
        /* Add styles for the widget content */
    }

    #datepicker {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 15px; /* Add margin-bottom to space elements */
    }

    #tieude {
        color: #fff; /* Text color for the title */
        font-weight: bold;
        display: block;
        margin-bottom: 15px; /* Add margin-bottom to space elements */
    }

    #ds_datsan {
        margin-top: 15px;
    }

    .mytable {
        width: 100%;
        background-color: #fff; /* Table background color */
        color: #000; /* Table text color */
        margin-top: 20px; /* Add margin-top to space the table from other elements */
    }

    .mytable th, .mytable td {
        padding: 10px; /* Cell padding */
        text-align: left;
    }

    .mytable th {
        background-color: #ee1e46; /* Header background color */
        color: #fff; /* Header text color */
    }       
</style>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
           <h1 class="text-white">Thông tin tài khoản</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-dark">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-12">
            <div class="widget-next-match">
              <div class="widget-title">
                
                <h3 style="text-align:center">TVU Sport</h3>
              </div>
                </br>
              <!-- content -->
              <div class="container">
              <h2>Thông Tin Tài Khoản</h2>
              <br>
              <p><strong>Tên đăng nhập:</strong> <?php echo $row['username']; ?></p>
              <p><strong>Mật khẩu:</strong> ******</p>
              <p><strong>Họ tên:</strong> <?php echo $row['hoten_user']; ?></p>
              <p><strong>Email:</strong> <?php echo $row['email_user']; ?></p>
              <p><strong>Số điện thoại:</strong> <?php echo $row['phone_user']; ?></p>

    <!-- Thêm nút để chuyển hướng đến trang thay đổi thông tin -->
    <a href="capnhatthongtin.php" class="btn btn-primary">Thay Đổi Thông Tin</a>
</div>
                <!-- content -->
              <div class="text-center widget-vs-contents mb-4">
                <h4>World Cup League</h4>
                <p class="mb-5">
                  <span class="d-block">December 20th, 2020</span>
                  <span class="d-block">9:30 AM GMT+0</span>
                  <strong class="text-primary">New Euro Arena</strong>
                </p>
                <div id="date-countdown2" class="pb-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .site-section -->
<?php
    // Đóng kết nối
    $conn->close();

    include("footer_user.php");
?>
