<?php
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $tin_tuc_id = $_GET['id'];

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "quanlysanbong";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Xóa tin tức từ cơ sở dữ liệu
    $delete_query = "DELETE FROM tin_tuc WHERE id = $tin_tuc_id";

    if ($conn->query($delete_query) === TRUE) {
        echo '<script language="javascript">
                alert("Xoá tin tức thành công");
                window.location.assign("dstintuc.php");
              </script>';
    } else {
        echo '<script language="javascript">
                alert("Xoá tin tức thất bại: ' . $conn->error . '");
                window.location.assign("dstintuc.php");
              </script>';
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Nếu không có tham số ID hoặc không phải là phương thức GET, chuyển hướng về trang danh sách tin tức
    header("Location: dstintuc.php");
    exit();
}
?>
