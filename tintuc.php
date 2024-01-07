<?php
    include("session.php");
include("header_user.php");

$servername = "localhost:3306";
$username = "root"; // Thay bằng tên đăng nhập của bạn
$password = ""; // Thay bằng mật khẩu của bạn
$dbname = "quanlysanbong"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

?>
<style>
    .blog-post img {
        max-width: 100%;
        height: 350px;
    }
   
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">World Cup Event</h1>
            <p>World cup là một cuộc thi thể thao toàn cầu trong đó các đơn vị tham gia thường là các đội tuyển quốc tế hoặc cá nhân đại diện cho quốc gia của họ, cạnh tranh cho danh hiệu vô địch thế giới.</p>
            <div id="date-countdown"></div> 
          </div>
        </div>
      </div>
    </div>
    <div class="container site-section blog-section">
        <div class="row">
            <div class="col-12 title-section" >
                <h2 style="color: #343a40" class="heading">Tin tức</h2>
            </div>
        </div>

        <div class="row">
            <?php
            // Truy vấn dữ liệu từ bảng tin_tuc
            $sql = "SELECT id, tieu_de, mo_ta, noi_dung, ngay_dang, anh_dai_dien FROM tin_tuc";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Truy vấn thất bại: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                // Hiển thị dữ liệu
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-6'>";
                    echo "<div class='blog-post' onclick='window.location.href=\"chitiettintuc.php?id=" . $row["id"] . "\"'>";
                    echo "<img src='" . $row["anh_dai_dien"] . "' alt='Ảnh đại diện'>";
                    echo "<div class='blog-post-content'>";
                    echo "<h2>" . $row["tieu_de"] . "</h2>";
                    echo "<p><strong>Mô tả:</strong> " . $row["mo_ta"] . "</p>";
                    echo "<p class='blog-post-date'><strong>Ngày đăng:</strong> " . $row["ngay_dang"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='col-12 text-muted'>Không có tin tức.</p>";
            }
            ?>
        </div>
    </div>

    <?php include("footer_admin.php") ?>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
