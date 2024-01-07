<?php
include("session.php");
include("header_admin.php");

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost:3306', 'root', '', 'quanlysanbong');
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn dữ liệu tin tức dựa trên id
    $query = "SELECT id, tieu_de, mo_ta, noi_dung, ngay_dang, anh_dai_dien FROM tin_tuc WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra nếu form được submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $tieu_de = $_POST['tieu_de'];
            $mo_ta = $_POST['mo_ta'];
            $noi_dung = $_POST['noi_dung'];

            // Xử lý upload ảnh mới
            $anh_dai_dien = $row['anh_dai_dien'];
            if ($_FILES['anh_dai_dien']['name']) {
                $upload_dir = 'images/';
                $upload_file = $upload_dir . basename($_FILES['anh_dai_dien']['name']);
                move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $upload_file);
                $anh_dai_dien = $upload_file;
            }

            // Update dữ liệu vào cơ sở dữ liệu
            $update_query = "UPDATE tin_tuc SET tieu_de = '$tieu_de', mo_ta = '$mo_ta', noi_dung = '$noi_dung', anh_dai_dien = '$anh_dai_dien' WHERE id = $id";
            if ($conn->query($update_query) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Cập nhật tin tức thành công!</div>';
                echo '<script>window.location.href = "dstintuc.php";</script>'; // Chuyển hướng bằng JavaScript
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Cập nhật tin tức thất bại: ' . $conn->error . '</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Không tìm thấy tin tức.</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Thiếu thông tin tin tức.</div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tin Tức</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Import file CSS riêng -->
</head>

<body>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mx-auto text-center">
                    <h1 class="text-white">Sửa tin tức</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container site-section blog-section">
        <div class="row">
            <div class="col-12 title-section">
                <h2 class="heading">Sửa Tin Tức</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tieu_de">Tiêu đề:</label>
                        <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="<?php echo $row['tieu_de']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mo_ta">Mô tả:</label>
                        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3" required><?php echo $row['mo_ta']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noi_dung">Nội dung:</label>
                        <textarea class="form-control" id="noi_dung" name="noi_dung" rows="5" required><?php echo $row['noi_dung']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="anh_dai_dien">Ảnh đại diện:</label>
                        <input type="file" class="form-control-file" id="anh_dai_dien" name="anh_dai_dien">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật Tin Tức</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer_admin.php") ?>

</body>

</html>
