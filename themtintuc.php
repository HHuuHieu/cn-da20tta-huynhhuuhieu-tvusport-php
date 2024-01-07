<?php
include("session.php");
include("header_admin.php");

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost:3306', 'root', '', 'quanlysanbong');
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ form
    $tieu_de = $_POST['tieu_de'];
    $mo_ta = $_POST['mo_ta'];
    $noi_dung = $_POST['noi_dung'];
    $ngay_dang = date('Y-m-d'); // Ngày hiện tại

    // Xử lý upload ảnh
    $anh_dai_dien = ''; 
    if ($_FILES['anh_dai_dien']['error'] == 0) {
        $upload_dir = 'images/'; // Thư mục lưu trữ ảnh
        $image_name = $_FILES['anh_dai_dien']['name'];
        $image_path = $upload_dir . $image_name;

        // Di chuyển ảnh vào thư mục lưu trữ
        move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $image_path);

        // Lưu đường dẫn vào biến
        $anh_dai_dien = $image_path;
    }

    // Insert dữ liệu vào cơ sở dữ liệu
    $insert_query = "INSERT INTO tin_tuc (tieu_de, mo_ta, noi_dung, ngay_dang, anh_dai_dien) VALUES ('$tieu_de', '$mo_ta', '$noi_dung', '$ngay_dang', '$anh_dai_dien')";
    if ($conn->query($insert_query) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Thêm tin tức thành công!</div>';
        echo '<script>window.location.href = "dstintuc.php";</script>'; // Chuyển hướng bằng JavaScript
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Thêm tin tức thất bại: ' . $conn->error . '</div>';
    }

    // Đóng kết nối
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Import file CSS riêng -->
</head>

<body>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mx-auto text-center">
                    <h1 class="text-white">Thêm tin tức</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container site-section blog-section">
        <div class="row">
            <div class="col-12 title-section">
                <h2 class="heading">Thêm Tin Tức</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tieu_de">Tiêu đề:</label>
                        <input type="text" class="form-control" id="tieu_de" name="tieu_de" required>
                    </div>
                    <div class="form-group">
                        <label for="mo_ta">Mô tả:</label>
                        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noi_dung">Nội dung:</label>
                        <textarea class="form-control" id="noi_dung" name="noi_dung" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="anh_dai_dien">Ảnh đại diện:</label>
                        <input type="file" class="form-control-file" id="anh_dai_dien" name="anh_dai_dien">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer_admin.php") ?>

</body>

</html>
