
<!doctype html>
<html lang="en">
  <head>
  	<title>TVU Sport - Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style_lg.css">
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
	<script src="lib/jquery-3.4.1.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/toast/jquery.toast.min.css" />
	<script src="lib/toast/jquery.toast.min.js"></script>
	<script src="lib/common.js"></script>
	</head>
	
	<body class="img js-fullheight" style="background-image: url(images/bg2.jpg);">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<h3 class="mb-4 text-center">Đăng nhập</h3>
							<div id = "loginForm">
								<form action="xlylogin.php" name= "dangnhap" class="signin-form" method="post">
									<div class="form-group">
										<input type="text" name="tendn" id="ten"class="form-control" placeholder="Tài khoản" required>
									</div>
									<div class="form-group">
										<input type="password" name="matkhau" id="matkhau"class="form-control" placeholder="Mật khẩu" required>
										<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									</div>
									<div class="form-group">
										<button type="submit" name ="dn" id="btnLogin"class="form-control btn btn-primary submit px-3">Đăng nhập</button>
									</div>
									<div class="form-group d-md-flex">
										<div class="w-50">
											<label class="checkbox-wrap checkbox-primary">Ghi nhớ đăng nhập
												<input type="checkbox" checked>
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="w-50 text-md-right">
											<a href="#" style="color: #fff">Quên mật khẩu?</a>
										</div>
									</div>
								</form>
							</div>	
				<p class="w-100 text-center">&mdash; Tạo tài khoản mới &mdash;</p>
					<div class="social d-flex text-center">
					<a href="signup.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Đăng ký</a>
					
					</div>
				</div>
					</div>
				</div>
			</div>
		</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main1.js"></script>
  <script>
$(document).ready(function() {
	checkInputs();
	$("#btnLogin").click(function() {
		
		var u = $("#ten").val().trim();
		var p =  $("#matkhau").val().trim();
		
		if (u == "" || p == "") {
			thongbaoloi("Tên đăng nhập/Mật khẩu không được bỏ trống!!!");
			return;
		}
		
		$.ajax({
			url: "/CN/soccer/api/dangnhap.php",
			type: "POST",
			cache: false,
			data: {
				action: "dangnhap",
				username: u,
				password: p
			},
			success: function(msg) {
				if (msg == "Đăng nhập thành công") {
					location.href = 'tintuc.php';
				} else {
					thongbaoloi(msg);
				}
				
			}
		});
	});
});
</script>
	</body>
</html>

