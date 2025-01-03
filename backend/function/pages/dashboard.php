<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
  // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thống kê</title>
  <?php include_once(__DIR__ . '/../../../layouts/styles.php'); ?>
</head>

<body>
  <?php
  include_once __DIR__ . '/../../../layouts/header.php'
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <?php
        include_once __DIR__ . '/../../layouts/sidebar.php';
        ?>
      </div>
      <div class="col-9">
        <main role="main" class="col-md-12 ml-sm-auto px-4 mb-2">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Thống kê</h1>
          </div>
          <div class="container-fluid">
            <div class="row">
              <!-- Tổng số mặt hàng -->
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-primary mb-2">
                  <div class="card-body pb-0">
                    <div class="text-value" id="baocao_sanpham">
                      <h1>0</h1>
                    </div>
                    <div>Tổng số mặt hàng</div>
                  </div>
                </div>
                <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
              </div> 
              <!-- Tổng số mặt hàng -->
              
              <!-- Tổng số khách hàng -->
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-success mb-2">
                  <div class="card-body pb-0">
                    <div class="text-value" id="baocao_khachhang">
                      <h1>0</h1>
                    </div>
                    <div>Tổng số khách hàng</div>
                  </div>
                </div>
                <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ liệu</button>
              </div> 
              <!-- Tổng số khách hàng -->

              <!-- Tổng số đơn hàng -->
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-warning mb-2">
                  <div class="card-body pb-0">
                    <div class="text-value" id="baocao_dondathang">
                      <h1>0</h1>
                    </div>
                    <div>Tổng số đơn hàng</div>
                  </div>
                </div>
                <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDonHang">Refresh dữ liệu</button>
              </div> 
              <!-- Tổng số đơn hàng -->

              <div id="ketqua"></div>
            </div><!-- row -->
            <div class="row">
              <!-- Biểu đồ thống kê loại sản phẩm -->
              <div class="col-sm-6 col-lg-6">
                <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
                <!-- <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button> -->
              </div><!-- col -->

            </div><!-- row -->
          </div>
        </main>
      </div>
    </div>
  </div>

    <!-- footer -->
    <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
    <!-- end footer -->


    <script src="/kdbd.com/vendor/Chart.js/Chart.min.js"></script>
    <script>
      $(document).ready(function() {
        // ----------------- Tổng số mặt hàng --------------------------
        function getDuLieuBaoCaoTongSoMatHang() {
          $.ajax('/kdbd.com/backend/api/baocao_sanpham.php', {
            success: function(data) {
              var dataObj = JSON.parse(data);
              var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
              $('#baocao_sanpham').html(htmlString);
            },
            error: function() {
              var htmlString = `<h1>Không thể xử lý</h1>`;
              $('#baocao_sanpham').html(htmlString);
            }
          });
        }
        $('#refreshBaoCaoSanPham').click(function(event) {
          event.preventDefault();
          getDuLieuBaoCaoTongSoMatHang();
        });

        // ----------------- Tổng số khách hàng --------------------------
        function getDuLieuBaoCaoTongSoKhachHang() {
          $.ajax('/kdbd.com/backend/api/baocao_khachhang.php', {
            success: function(data) {
              var dataObj = JSON.parse(data);
              var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
              $('#baocao_khachhang').html(htmlString);
            },
            error: function() {
              var htmlString = `<h1>Không thể xử lý</h1>`;
              $('#baocao_khachhang').html(htmlString);
            }
          });
        }
        $('#refreshBaoCaoKhachHang').click(function(event) {
          event.preventDefault();
          getDuLieuBaoCaoTongSoKhachHang();
        });

        // ----------------- Tổng số đơn hàng --------------------------
        function getDuLieuBaoCaoTongSoDonHang() {
          $.ajax('/kdbd.com/backend/api/baocao_dondathang.php', {
            success: function(data) {
              var dataObj = JSON.parse(data);
              var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
              $('#baocao_dondathang').html(htmlString);
            },
            error: function() {
              var htmlString = `<h1>Không thể xử lý</h1>`;
              $('#baocao_dondathang').html(htmlString);
            }
          });
        }
        $('#refreshBaoCaoDonHang').click(function(event) {
          event.preventDefault();
          getDuLieuBaoCaoTongSoDonHang();
        });


        // ------------------ Vẽ biểu đồ thống kê Loại sản phẩm -----------------
        // Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
        var $objChartThongKeLoaiSanPham;
        var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
          "2d");

        function renderChartThongKeLoaiSanPham() {
          $.ajax({
            url: '/kdbd.com/backend/api/baocao_loaisanpham.php',
            type: "GET",
            success: function(response) {
              var data = JSON.parse(response);
              var myLabels = [];
              var myData = [];
              $(data).each(function() {
                myLabels.push((this.TenLoaiSanPham));
                myData.push(this.SoLuong);
              });
              myData.push(0); // tạo dòng số liệu 0
              if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                $objChartThongKeLoaiSanPham.destroy();
              }
              $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "bar",
                data: {
                  labels: myLabels,
                  datasets: [{
                    data: myData,
                    borderColor: "#9ad0f5",
                    backgroundColor: "#9ad0f5",
                    borderWidth: 1
                  }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                  legend: {
                    display: false
                  },
                  title: {
                    display: true,
                    text: "Thống kê Loại sản phẩm"
                  },
                  responsive: true
                }
              });
            }
          });
        };
        $('#refreshThongKeLoaiSanPham').click(function(event) {
          event.preventDefault();
          renderChartThongKeLoaiSanPham();
        });

        // Mới mở web (khi trang web load xong)
        // thì sẽ gọi lập tức một số hàm AJAX gọi API lấy dữ liệu
        getDuLieuBaoCaoTongSoMatHang();
        getDuLieuBaoCaoTongSoKhachHang();
        getDuLieuBaoCaoTongSoDonHang();
        renderChartThongKeLoaiSanPham();

      });
    </script>
</body>

</html>