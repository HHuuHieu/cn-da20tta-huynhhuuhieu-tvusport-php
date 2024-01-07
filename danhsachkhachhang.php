<?php
    include("session.php");
    include("header_admin.php");
?>
<?php    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlysanbong";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Lấy danh sách tất cả tài khoản khách hàng
    $sql = "SELECT * FROM tai_khoan";
    $result = $conn->query($sql);

    ?>
    <style>
        /* Thêm các CSS cần thiết cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
            background-color: #FFFFFF;
            color: black;
        }

        th {
            background-color: #ee1e46;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        
    </style>
    
    <?php

    if ($result->num_rows > 0) {
        ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 mx-auto text-center">
                        <h1 class="text-white">Thông tin khách hàng</h1>
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
                                <h2>Danh sách thông tin tài khoản khách hàng</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tên đăng nhập</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['hoten_user']; ?></td>
                                                <td><?php echo $row['email_user']; ?></td>
                                                <td><?php echo $row['phone_user']; ?></td>
                                                <td><button class="btn-delete" data-id="<?php echo $row['id']; ?>">Xóa</button></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                            <!-- content -->
                            <div class="text-center widget-vs-contents mb-4">
                            </br>
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
    } else {
        ?>
        <div class="container">
            <p>Không có người dùng nào.</p>
        </div>
        <?php
    }

    // Đóng kết nối
    $conn->close();
?>
 <script>
    $(document).ready(function () {
        $(".btn-delete").on("click", function () {
            var userId = $(this).data("id");
            if (confirm("Bạn có chắc chắn muốn xóa người dùng này không?")) {
                $.ajax({
                    type: "POST",
                    url: "xoathongtin.php",
                    data: { id: userId },
                    success: function (response) {
                        // Reload lại trang sau khi xóa thành công
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>



<?php
    include("footer_admin.php");
?>
