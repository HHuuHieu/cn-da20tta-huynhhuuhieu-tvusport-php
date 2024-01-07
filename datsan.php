
<?php
	include("session.php");
	include("header_user.php");
?>
  <link rel="stylesheet" href="css/style_ds.css">
<style>
  #formDatSan{
    position: absolute;
    margin: auto;
    top: center;
    right: 0;
    bottom: 0;
    left: 0;
    width: 550px;
    height: 550px;
    z-index: 100;
    background: #eee;
    padding: 10px;
    border: 0px solid #000;
    box-shadow: 5px 5px 20px #000;
    display: none;
    border-radius: 10px;
}
  .xoa, .thanhtoan, .xoatddatsan, .xoatdtt, .a, .b, .c{
    display:none;
  }
  .container2 {
    display: flex;
    align-items: center;
    justify-content: center;
    
}
  </style>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
            <h1 class="text-white">Đặt sân</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section bg-dark">
      <div class="container2">
        <div class="row mb-5">
            <div class="widget-next-match">
              <div class="widget-title">
                <h3>TVU Sport</h3>
              </div>
              <div class="widget-body mb-3">
                <div class="widget-vs">
                  <b>CHỌN NGÀY: </b>
                  <input type="text" id="datepicker"/><br/>
                  <br/>
                  <b>DANH SÁCH ĐẶT SÂN NGÀY <span id='tieudeds'></span></b><br/>
                  <br />
                    <div id='ds_datsan'></div><br/>
                      <br/>	
                      <b>LỊCH ĐẶT SÂN NGÀY <span id='tieudetime'></span></b><br/>
                      <br/>
                      <div id="time_table"></div><br/>
                        <div id='grayscreen'></div>
                        <div>  
                        <div id='formDatSan'>
                              <b style='font-size: 18px;'>ĐẶT SÂN</b><br/>
                              <br />
                                <table>
                                  <tr>
                                    <td>Sân:</td>
                                    <td><span id='datsan_tensan' style='font-weight:bold;color:red;'></span></td>
                                  </tr>
                                  <tr>
                                    <td>Khách hàng:</td>
                                    <td><select id='datsan_kh' class='chosen'></select></td>
                                  </tr>
                              <tr>
                                <td><input type="checkbox" id='chbThemKhach' /> Thêm thông tin</td>
                                  <td>
                                    <div id='datsan_themkhach' class='disabled'>
                                      <table>
                                       <tr>
                                          <td>Tên</td>
                                          <td><input type='text' id='datsan_them_ten' /></td>
                                       </tr>
                                        <tr>
                                          <td>Số điện thoại</td>
                                          <td><input type='text' id='datsan_them_sdt' /></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td><button id='datsan_btnthemkh'>Thêm</button></td>
                                        </tr>
                                      </table>
                                    </div>
                                  </td>
                                </td>
                                </tr>
                              <tr>
                                <td>Ngày đặt:</td>
                                <td><b><span id='datsan_ngaydat'></span></b></td>
                              </tr>
                              <tr>
                                <td>Bắt đầu:</td>
                                <td>
                                  Giờ: 
                                  <select id="datsan_batdau_gio">
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                  </select>
                                  Phút:
                                  <select id="datsan_batdau_phut">
                                    <option value="0">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Kết thúc:</td>
                                <td>
                                  Giờ: 
                                  <select id='datsan_ketthuc_gio'>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                  </select>
                                  Phút:
                                  <select id="datsan_ketthuc_phut">
                                    <option value="0">00</option>
                                    <option value="15" selected>15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Tổng thời gian (phút):</td>
                                <td><span id='datsan_phut'></span></td>
                              </tr>
                              <tr>
                                  <td>Đơn giá (/phút):</td>
                                  <td><input id='datsan_dongia' size='5' value='3000' readonly/>đ</td>
                              </tr>

                              <tr>
                                <td>Tổng tiền:</td>
                                <td><span id='datsan_tongtien' style='color:red;font-weight:bold;'>0đ</span></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><br />
                                  <button id='datsan_ok'>Đồng ý</button>
                                  <button id='datsan_cancel'>Hủy</button>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
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
      </div> <!-- .site-section --> 
    </div>
</div>
			
<script>
$(document).ready(function() {
	
	xemDsDatSan(getToday());

	$("#datepicker").daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 2019,
		maxYear: parseInt(moment().format('YYYY'), 10)
	}, function(start, end, label) {
		xemDsDatSan(start.format("YYYY-MM-DD"));
	});
	
	function taoDatSan(ma_kh, ma_san, bat_dau, ket_thuc, don_gia) {
		$.ajax({
			url: "/CN/soccer/api/taodatsan.php",
			type: "POST",
			cache: false,
			data: {
				ma_kh : ma_kh,
				ma_san : ma_san,
				bat_dau : bat_dau,
				ket_thuc : ket_thuc,
				don_gia : don_gia
			},
			success: function(msg) {
				if (msg.includes("trùng")) {
					thongbaoloi("Không thể tạo đặt sân", msg);
				} else {
					thongbaotot(msg);
				}
				xemDsDatSan(getCurrentFormattedDate());
			},
			error: function() {
				thongbaoloi("Lỗi hệ thống!!");
			}
		});
	}
	
	$("#datsan_ok").click(function() {
		// insert into database
		var ma_kh = $("#datsan_kh").val();
		var ma_san = $("#datsan_tensan").attr("ma_san");
		var ngay_dat = $("#datsan_ngaydat").text();
		var bat_dau_gio = $("#datsan_batdau_gio").val();
		var bat_dau_phut = $("#datsan_batdau_phut").val();
		var ket_thuc_gio = $("#datsan_ketthuc_gio").val();
		var ket_thuc_phut = $("#datsan_ketthuc_phut").val();
		var bat_dau = ngay_dat + " " + bat_dau_gio + ":" + bat_dau_phut + ":" + "00";
		var ket_thuc = ngay_dat + " " + ket_thuc_gio + ":" + ket_thuc_phut + ":" + "00";
		if ($("#datsan_dongia").val().trim() == "") {
			$("#datsan_dongia").val("0");
		}
		var don_gia = $("#datsan_dongia").val();
		if (parseInt(don_gia) < 3000) {
			thongbaoloi("Đơn giá không được nhỏ hơn 3000đ/phút!!!");
			return;
		}
		taoDatSan(ma_kh, ma_san, bat_dau, ket_thuc, don_gia);
		$("#formDatSan").css("display","none");
		$("#grayscreen").css("display","none");
	});
	
	$("#datsan_cancel").click(function() {
		$("#formDatSan").css("display","none");
		$("#grayscreen").css("display","none");
		$("#datsan_them_ten").val("");
		$("#datsan_them_sdt").val("");
	});

	$("#datsan_btnthemkh").click(function() {
		var ten = $("#datsan_them_ten").val();
		var sdt = $("#datsan_them_sdt").val();
		if (kiemtraten(ten) && kiemtrasdt(sdt)) {
			themKhachHang(ten, sdt);
		}
	});
	
	$("#chbThemKhach").change(function() {
		if($(this).is(":checked")) {
			$("#datsan_themkhach").removeClass("disabled");
		} else {
			$("#datsan_themkhach").addClass("disabled");
		}
	});
	
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
				$("#datsan_them_ten").val("");
				$("#datsan_them_sdt").val("");
				getDsKhachHang();
			}
		},
		error: function() {
			alert("Khong the them khach hang moi!!!");
		}
	});
}
});
</script>

<?php
include("footer_user.php");
?>