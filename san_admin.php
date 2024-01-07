<title>Doanh Thu</title>
<?php
    include("session.php");
    include("header_admin.php");
?>
<style>
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
    color: #fff;
}

.container {
    width: 100%;
    margin: 0 auto;
}

.site-section {
    background-color: #343a40;
    color: #fff;
    padding: 40px 0;
}

.widget-title h3 {
    color: #fff;
}

.widget-next-match {
}

#ten_san, #btnThem {
    padding: 10px;
    margin-bottom: 10px;
}

.mytable {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.mytable th, .mytable td {
    border: 1px solid #fff;
    padding: 10px;
    text-align: left;
}

.mytable th {
    background-color:#ee1e46;
    color: #fff;
}

.mytable tr:nth-child(even) {
    background-color: #f2f2f2;
}

.mytable tr:hover {
    background-color: #ddd;
}

    </style>
  <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
            <h1 class="text-white">Quản lý sân bãi</h1>
           
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
			  <br/>
              <!-- content -->
                  Tên sân: <input type='text' id='ten_san'/> <button id='btnThem'>Thêm sân bóng</button><br />
                <br />
                <div id='listsanbong'></div>
				<br />
                <!-- endcontent -->
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
	
	checkInputs();
	$.ajax({
		url: "/CN/soccer/api/sanbong.php",
		type: "POST",
		data: {
			action: "view"
		},
		cache: false,
		success: function(json) {
			var html = "";
			var data = $.parseJSON(json);
			html += "<table class='mytable'>";
			html += "<thead><tr><th>#</th><th>Tên sân bóng</th><th>Đổi tên</th><th>Xóa</th></tr></thead>";
			for (var i = 0; i < data.length; i++) {
				html += "<tr>";
				html += "<td>" + (i + 1) + "</td>";
				html += "<td>" + data[i].ten_san + "</td>";
				html += "<td><button class='btnDoiten' ma_san='" + data[i].ma_san + "' order='" + (i + 1) + "'>Đổi tên</button></td>";
				html += "<td><button class='btnXoa' ma_san='" + data[i].ma_san + "' order='" + (i + 1) + "'>Xóa</button></td>";
				html += "</tr>";
			}
			html += "</table>";
			$("#listsanbong").html(html);
			
			
			$("#btnThem").click(function() {
				var ten_moi = $("#ten_san").val();
				if (kiemtratensan(ten_moi)) {
					themSan(ten_moi);
				}
			});

			$(".btnDoiten").click(function() {
				$(this).attr("disabled", "disabled");
				var ma_san = $(this).attr("ma_san");
				var order = $(this).attr("order");
				var row = $(".mytable tr")[order];
				var ten = $(row).find("td")[1];
				var ten_value = $(ten).text();
				$(ten).html("<input style='background:yellow;' type='text' value='" + ten_value + "' id='ten-" + order + "'/><br /><span class='thongbao'>" + THONG_BAO + "</span>");
				$("#ten-" + order).focus();
				checkInputs();
				
				$("#ten-" + order).keyup(function(e) {
					if (e.keyCode == 27) {	// ESC
						$(ten).find(".thongbao").remove();
						$(ten).html(ten_value);
						$($(".btnDoiten")[order - 1]).removeAttr("disabled");
					}
					if (e.keyCode == 13) {	// ENTER
						var ten_moi = $("#ten-" + order).val();
						if (ten_moi != ten_value && kiemtratensan(ten_moi)) {
							$(ten).html(ten_moi);
							suaSan(ma_san, ten_moi);
							$(ten).find(".thongbao").remove();
							$($(".btnDoiten")[order - 1]).removeAttr("disabled");
						}
					}
				});

			});
			
			$(".btnXoa").click(function() {
				var ma_san = $(this).attr("ma_san");
				//var order = $(this).attr("order");
				//var row = $(".mytable tr")[order];
				//var ten = $(row).find("td")[1];
				//var ten_value = $(ten).text();
				var xac_nhan = confirm("Xóa sân này sẽ xóa tất cả các đặt sân liên quan. Bạn có chắc muốn xóa không?");
				if (xac_nhan) {
					xoaSan(ma_san);
				}
			});
			
			
		}
	});
	
	function themSan(ten_moi) {
		$.ajax({
			url: "/CN/soccer/api/sanbong.php",
			type: "POST",
			cache: false,
			data: {
				action: "add",
				ten_moi: ten_moi
			},
			success: function(msg) {
				if (msg.includes("tồn tại")) {
					thongbaoloi(msg);
				} else {
					thongbaotot(msg);
					tailaitrang();
				}
				
			}
		});
	}
	
	function suaSan(ma_san, ten_moi) {
		$.ajax({
			url: "/CN/soccer/api/sanbong.php",
			type: "POST",
			cache: false,
			data: {
				action: "edit",
				ma_san: ma_san,
				ten_moi: ten_moi
			},
			success: function(msg) {
				if (msg.includes("tồn tại")) {
					thongbaoloi(msg);
					tailaitrang();
				} else {
					thongbaotot(msg);
					tailaitrang();
				}
			}
		});
	}
	
	function xoaSan(ma_san) {
		$.ajax({
			url: "/CN/soccer/api/sanbong.php",
			type: "POST",
			cache: false,
			data: {
				action: "del",
				ma_san: ma_san
			},
			success: function(msg) {
				thongbaotot(msg);
				tailaitrang();
			}
		});
	}
});
</script>
<?php
    include("footer_admin.php");
?>