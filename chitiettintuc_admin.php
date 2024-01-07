<?php
include("header_admin.php");

// Kiểm tra xem có tham số id được truyền không
if (isset($_GET['id'])) {
    // Lấy id từ tham số truyền vào
    $id = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost:3306', 'root', '', 'quanlysanbong');
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn lấy chi tiết tin tức theo id
    $result = $conn->query("SELECT * FROM tin_tuc WHERE id = $id");

    // Hiển thị chi tiết tin tức
    if ($row = $result->fetch_assoc()) {
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chi Tiết Tin Tức</title>
            <link rel="stylesheet" href="css/styles.css"> <!-- Import file CSS riêng -->
        </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .hero {
            background-image: url('images/bg_3.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
        }

        .hero h1 {
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .site-section {
            padding: 50px 0;
        }

        .blog-post {
            margin-bottom: 40px;
        }

        .blog-post img {
            max-width: 100%;
            height: 800px;
        }

        .blog-post-content {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .blog-post h2 {
            color: #333;
        }

        .blog-post p {
            color: #666;
        }

        .blog-post-date {
            color: #999;
        }

        .title-section h2 {
            margin-bottom: 40px;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
        <body>

            <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mx-auto text-center">
                            <h1 class="text-white">Tin tức</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container site-section blog-section">
                <div class="row">
                    <div class="col-12 title-section">
                        <h2 class="heading">Chi Tiết Tin Tức</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post">
                            <img src="<?php echo $row['anh_dai_dien']; ?>" alt="Ảnh đại diện">
                            <div class="blog-post-content">
                                <h2><?php echo $row['tieu_de']; ?></h2>
                                <p><strong></strong> <?php echo $row['noi_dung']; ?></p>
                                <p class="blog-post-date"><strong>Ngày đăng:</strong> <?php echo $row['ngay_dang']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>

        </html>

<?php
    } else {
        echo 'Không có tin tức để hiển thị.';
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo 'Không có tin tức để hiển thị.';
}

include("footer_admin.php");
?>
