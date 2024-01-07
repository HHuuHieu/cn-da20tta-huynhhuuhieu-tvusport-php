<title>Khách hàng</title>
<?php
    include("session.php");
    include("header_admin.php");
?>
<style>
    /* Reset some default styles */
body, h1, h2, h3, p {
    margin: 0;
    padding: 0;
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

/* Add your additional styles for other sections as needed */
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

/* Add your additional styles for form elements as needed */
#btn-add {
    /* Add styles for the "Thêm" button */
    background-color: #ee1e46;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.mytable {
    /* Add styles for your table */
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.mytable th, .mytable td {
    border: 1px solid #fff; /* Table cell border color */
    padding: 10px;
    text-align: left;
}

.mytable th {
    background-color:#ee1e46; /* Table header background color */
    color: #fff; /* Table header text color */
}

.mytable tr:nth-child(even) {
    background-color: #f2f2f2; /* Alternate row background color */
}

.mytable tr:hover {
    background-color: #ddd; /* Hovered row background color */
}

/* Customize your form input styles */
#ten-moi, #sdt-moi {
    width: 200px;
    padding: 5px;
    margin-bottom: 10px;
}

/* Add any additional styles you need */


    </style>
  <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
            <h1 class="text-white">Khách hàng thân thiết</h1>
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
              Tên: <input type='text' id='ten-moi' /> Số điện thoại: <input id='sdt-moi' type='text' /> <button id='btn-add'>Thêm</button>
                <br />
                <br />
                <div id='tblKhachHang'></div>
				<br/>
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
	$(document).ready(function() {
		
		taoDsKhachHang();
		function taoDsKhachHang() {
			$.ajax({
				url: "/CN/soccer/api/dskhachhang.php",
				type: "GET",
				cache: false,
				data: {
					action: "view"
				},
				success: function(json) {
					var data = $.parseJSON(json);
					var html = "";
					html += "<table class='mytable'>";
					html += "<thead><tr><th>#</th><th>Tên KH</th><th>Số điện thoại</th><th>Sửa</th></tr></thead>";
					for (var i = 0; i < data.length; i++) {
						html += "<tr>";
						html += "<td>" + (i + 1) + "</td><td>" + data[i].ten + "</td><td>" + data[i].sdt + "</td><td><center><button class='btn-edit' ma_kh='" + data[i].id + "' order='" + (i + 1) + "'>Sửa</button></center></td>";
						html += "</tr>";
					}
					html += "</table>";
					$("#tblKhachHang").html(html);

					$(".btn-edit").click(function() {
						$(this).attr("disabled", "disabled");
						var order = $(this).attr("order");
						var ma_kh = $(this).attr("ma_kh");
						var row = $(".mytable tr")[order];
				
						var ten = $(row).find("td")[1];
						var ten_value = $(ten).text();
						$(ten).html("<input style='background:yellow;' id='ten-" + order + "' type='text' value='" + ten_value + "' /><br /><span class='thongbao'>" + THONG_BAO + "</span>");
						$("#ten-" + order).focus();

						var sdt = $(row).find("td")[2];
						var sdt_value = $(sdt).text();
						$(sdt).html("<input style='background:yellow;' id='sdt-" + order + "' type='text' value='" + sdt_value + "' />");

						$("#ten-" + order + ", #sdt-" + order).keyup(function(e) {
							if (e.keyCode == 27) {	// ESC
								$(ten).find(".thongbao").remove();
								$(ten).html(ten_value);
								$(sdt).html(sdt_value);
								$($(".btn-edit")[order - 1]).removeAttr("disabled");
							}
							if (e.keyCode == 13) {	// ENTER
								var ten_moi = $("#ten-" + order).val();
								var sdt_moi = $("#sdt-" + order).val();
								if ((ten_moi != ten_value || sdt_moi != sdt_value) && kiemtraten(ten_moi) && kiemtrasdt(sdt_moi)) {
									suaKhachHang(ma_kh, ten_moi, sdt_moi);
									$(ten).html(ten_moi);
									$(sdt).html(sdt_moi);
									$(ten).find(".thongbao").remove();
									$($(".btn-edit")[order - 1]).removeAttr("disabled");
								}
							}
						});
						checkInputs();
					});
					checkInputs();
				},
				error: function() {
					thongbaoloi("Khong the lay danh sach khach hang!!!");
				}
			});
		}

		function suaKhachHang(ma_kh, ten_moi, sdt_moi) {
			$.ajax({
				url: "/CN/soccer/api/dskhachhang.php",
				type: "POST",
				cache: false,
				data: {
					action: "edit",
					ma_kh: ma_kh,
					ten_moi : ten_moi,
					sdt_moi : sdt_moi
				},
				success: function(msg) {
					if (msg.includes("đã tồn tại")) {
						thongbaoloi(msg);
						tailaitrang();
					} else {
						thongbaotot(msg);
						tailaitrang();
					}
				},
				error: function() {
					alert("Khong the cap nhat khach hang " + ma_kh + "!!!");
				}
				
			});
		}
		
		function themKhachHang(ten, sdt) {
			$.ajax({
				url: "/CN/soccer/api/dskhachhang.php",
				type: "POST",
				cache: false,
				data: {
					action: "add",
					ten : ten,
					sdt : sdt
				},
				success: function(msg) {
					if (msg.includes("đã tồn tại")) {
						thongbaoloi(msg);
					} else {
						thongbaotot(msg);
						tailaitrang();
					}
				},
				error: function() {
					alert("Khong the them khach hang moi!!!");
				}
			});
		}

		$("#btn-add").click(function() {
			var ten_moi = $("#ten-moi").val();
			var sdt_moi = $("#sdt-moi").val();
			if (kiemtraten(ten_moi) && kiemtrasdt(sdt_moi)) {
				themKhachHang(ten_moi, sdt_moi);
				$("#ten-moi").val("");
				$("#sdt-moi").val("");
			}
		});
		
	});
</script>
<?php
    include("footer_admin.php");
?>	