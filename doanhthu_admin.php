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

    
    #datepicker {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 15px; 
    }

    #tieude {
        color: #fff; 
        font-weight: bold;
        display: block;
        margin-bottom: 15px;
    }

    #ds_datsan {
        margin-top: 15px;
    }

    .mytable {
        width: 100%;
        background-color: #fff; 
        color: #000; 
        margin-top: 20px; 
    }

    .mytable th, .mytable td {
        padding: 10px; 
        text-align: left;
    }

    .mytable th {
        background-color: #ee1e46; 
        color: #fff; 
    }       
</style>
    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
           <h1 class="text-white">Doanh Thu</h1>
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
                
                <h3>TVU Sport</h3>
              </div>
  </br>
              <!-- content -->
                <b>CHỌN NGÀY: </b>
                <input type="text" id="datepicker"/><br/>
                <br />
                <span id='tieude'></span><br />
                <br />
                <div id='ds_datsan'></div><br />
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
    // Khởi tạo ngày mặc định là ngày hiện tại
    var currentDate = moment();
    $('#datepicker').daterangepicker({
        startDate: currentDate,
        endDate: currentDate,
    }, function(start, end, label) {
        g_bat_dau = start.format("YYYY-MM-DD");
        g_ket_thuc = end.format("YYYY-MM-DD");
        $("#tieude").html("<b>Doanh thu từ ngày " + g_bat_dau + " đến " + g_ket_thuc + "</b>");
        xemDoanhThu(g_bat_dau, g_ket_thuc);
    });

    // Gọi hàm xemDoanhThu với ngày mặc định
    xemDoanhThu(currentDate.format("YYYY-MM-DD"), currentDate.format("YYYY-MM-DD"));
});
</script>

<?php
    include("footer_admin.php");
?>