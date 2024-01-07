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
    
    // Xử lý form cập nhật thông tin
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["capnhat"])) {
        $hoTenMoi = $_POST["hotenmoi"];
        $emailMoi = $_POST["emailmoi"];
        $soDienThoaiMoi = $_POST["sodienthoaimoi"];

        // Cập nhật thông tin mới
        $sqlUpdate = "UPDATE tai_khoan SET hoten_user = '$hoTenMoi', email_user = '$emailMoi', phone_user = '$soDienThoaiMoi' WHERE username = '$taiKhoan'";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<p class='container text-success'>Cập nhật thông tin thành công!</p>";
            // Cập nhật lại session nếu thông tin cập nhật thành công
            $_SESSION['hoten_user'] = $hoTenMoi;
            $_SESSION['email_user'] = $emailMoi;
            $_SESSION['phone_user'] = $soDienThoaiMoi;

            // Kiểm tra nếu ô kiểm mật khẩu mới được chọn
            if (isset($_POST["capnhatmatkhau"])) {
                $matKhauCu = $_POST["matkhaucu"];
                $matKhauMoi = $_POST["matkhaumoi"];

                // Kiểm tra mật khẩu cũ
                if (!empty($matKhauCu) && !empty($matKhauMoi)) {
                    if ($row['password'] == $matKhauCu) {
                        // Cập nhật mật khẩu mới
                        $sqlUpdatePass = "UPDATE tai_khoan SET password = '$matKhauMoi' WHERE username = '$taiKhoan'";
                        if ($conn->query($sqlUpdatePass) === TRUE) {
                            echo "<p class='container text-success'>Cập nhật mật khẩu thành công!</p>";
                        } else {
                            echo "<p class='container text-danger'>Lỗi khi cập nhật mật khẩu: " . $conn->error . "</p>";
                        }
                    } else {
                        echo "<p class='container text-danger'>Mật khẩu cũ không đúng!</p>";
                    }
                }
            }

            // Chuyển hướng về trang thông tin tài khoản
            header("location: thongtintaikhoan.php");
            die();
        } else {
            echo "<p class='container text-danger'>Lỗi khi cập nhật thông tin: " . $conn->error . "</p>";
        }
    }
}

?>
<style>
    body, h1, h2, h3, p {
        margin: 0;
        padding: 0;
    }
    #checkbox{
        margin-left:20px;
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

    #matkhaugroup,
    #matkhaumoigroup {
        display: none; /* Hide password fields by default */
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

<!-- HTML của trang -->

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mx-auto text-center">
                <h1 class="text-white">Cập nhật thông tin</h1>
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
                    <br>
                    <!-- content -->
                    <div class="container">
                        <h2>Cập Nhật Thông Tin Tài Khoản</h2>
                        <br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="hotenmoi">Họ tên:</label>
                                <input type="text" class="form-control" id="hotenmoi" name="hotenmoi" value="<?php echo $row['hoten_user']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="emailmoi">Email:</label>
                                <input type="email" class="form-control" id="emailmoi" name="emailmoi" value="<?php echo $row['email_user']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sodienthoaimoi">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="sodienthoaimoi" name="sodienthoaimoi" value="<?php echo $row['phone_user']; ?>" required>
                            </div>
                            <div id="checkbox"class="form-group">
                                <input type="checkbox" class="form-check-input" id="capnhatmatkhau" name="capnhatmatkhau" onclick="toggleMatKhauFields()">
                                <label class="form-check-label" for="capnhatmatkhau">Đổi mật khẩu</label>
                            </div>
                            <div class="form-group" id="matkhaugroup" style="display: none;">
                                <label for="matkhaucu">Mật khẩu cũ:</label>
                                <input type="password" class="form-control" id="matkhaucu" name="matkhaucu">
                            </div>
                            <div class="form-group" id="matkhaumoigroup" style="display: none;">
                                <label for="matkhaumoi">Mật khẩu mới:</label>
                                <input type="password" class="form-control" id="matkhaumoi" name="matkhaumoi">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="capnhat">Cập Nhật Thông Tin</button>
                            </div>
                        </form>
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

<script>
    function toggleMatKhauFields() {
        var matKhauGroup = document.getElementById("matkhaugroup");
        var matKhauMoiGroup = document.getElementById("matkhaumoigroup");

        if (document.getElementById("capnhatmatkhau").checked) {
            matKhauGroup.style.display = "block";
            matKhauMoiGroup.style.display = "block";
        } else {
            matKhauGroup.style.display = "none";
            matKhauMoiGroup.style.display = "none";
        }
    }
</script>

<?php
// Đóng kết nối
$conn->close();

include("footer_admin.php");
?>
