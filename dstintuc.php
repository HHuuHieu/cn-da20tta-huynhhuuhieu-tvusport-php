<?php
include("session.php");
include("header_admin.php");

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
        height: auto;
    }
    
</style>

<!DOCTYPE html>
<html lang="en">

<body>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="text-white">Quản lý tin tức</h1>
            </div>
        </div>
    </div>
</div>
<div class="container site-section blog-section">
    <div class="row">
        <div class="col-12 title-section">
            <h2 style="color: while" class="heading">Tin tức</h2>
        </div>
    </div>
    <div class="row">
        <?php
        // Lấy danh sách tin tức từ cơ sở dữ liệu
        $query = "SELECT * FROM tin_tuc";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="tin-tuc-item">';
                echo '<h3>' . $row['tieu_de'] . '</h3>';
                echo '<p>' . $row['mo_ta'] . '</p>';
                echo '<a href="suatintuc.php?id=' . $row['id'] . '" class="btn btn-warning">Sửa</a>';
                echo '<a href="xoatintuc.php?id=' . $row['id'] . '" class="btn btn-danger">Xoá</a>';
            }
        } else {
            echo '<p>Không có tin tức nào.</p>';
        }
        ?>
    </div>
</div>

<!-- Nút "Thêm tin tức" nằm ở ngoài div chứa nội dung tin tức -->
<div class="container text-center">
    <a href="themtintuc.php" class="btn btn-danger">Thêm tin tức</a>
    
</div>
</br>
<?php include("footer_admin.php") ?>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
