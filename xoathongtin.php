<?php
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Xử lý xóa tài khoản
    $userId = $_POST["id"];
    $sql = "DELETE FROM tai_khoan WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa người dùng thành công";
    } else {
        echo "Lỗi khi xóa người dùng: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ";
}
?>
