<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
  // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
  session_start();
}
?>
<!-- https://nentang.vn/app/edu/khoa-hoc/thiet-ke-lap-trinh-web-admin/lap-trinh-can-ban-php/lessons/ajax-la-gi-ky-thuat-su-dung-ajax-voi-jquery -->
<!-- https://getbootstrap.com/docs/5.0/components/card/ -->
<!-- https://www.chartjs.org/ -->
<!-- https://www.chartjs.org/docs/latest/charts/bar.html -->
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
        <div class="container-fluid">
          <div class="row">
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">DASHBOARD</h1>
              </div>

              <!-- Block content -->
              <div class="container-fluid">
                <div class="row">
                  <!-- Tổng số mặt hàng -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary mb-2">
                      <div class="card-body pb-0">
                        <div class="text-value" id="baocao_sanpham">
                        </div>
                        <div>Tổng số mặt hàng</div>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
                  </div>
                  <!-- Tổng số mặt hàng -->
                  <!-- Tổng số khách hàng -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-success mb-2">
                      <div class="card-body pb-0">
                        <div class="text-value" id="baocao_khachhang">
                        </div>
                        <div>Tổng số khách hàng</div>
                      </div>
                    </div>
                    <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ liệu</button>
                  </div>
                  <!-- Tổng số khách hàng -->
                  <!-- Tổng số đơn hàng -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-warning mb-2">
                      <div class="card-body pb-0">
                        <div class="text-value" id="baocao_dondathang">
                        </div>
                        <div>Tổng số đơn hàng</div>
                      </div>
                    </div>
                    <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDonHang">Refresh dữ liệu</button>
                  </div>
                  <!-- Tổng số đơn hàng -->
                  <!-- Tổng số loại sản phẩm -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-danger mb-2">
                      <div class="card-body pb-0">
                        <div class="text-value" id="baocao_loaisanpham">
                        </div>
                        <div>Tổng loại sản phẩm</div>
                      </div>
                    </div>
                    <button class="btn btn-danger btn-sm form-control" id="refreshLoaiSanPham">Refresh dữ liệu</button>
                  </div>
                  <!-- Tổng số loại sản phẩm -->
                  <div id="ketqua"></div>
                </div><!-- row -->
                <div class="row">
                  <!-- Biểu đồ thống kê loại sản phẩm -->
                  <div class="col-sm-6 col-lg-6"><canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas></div>
                  <div class="col-sm-6 col-lg-6"><canvas id="chartOfobjChartThongKeSanPham"></canvas></div>
                  <!-- col -->
                  <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeAll">Refresh dữ liệu</button>
                  <!-- End block content -->
            </main>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- footer -->
  <?php
  include_once __DIR__ . '/../../../layouts/footer.php';
  include_once __DIR__ . '/../../../layouts/script.php';
  ?>
  <!-- end footer -->


  <script src="/kdbd.com/vendor/Chartjs/Chart.min.js"></script>
  <script>
    $(document).ready(function() {
      // ----------------- Tổng số mặt hàng --------------------------
      function getDuLieuBaoCaoTongSoMatHang() {
        // nhờ ajax gửi request đến API
        $.ajax('/kdbd.com/admin/api/baocao_sanpham.php', {
          // thành công: Lấy được cục Data -> đưa vào biến dataObj -> dataObj.key là ra dữ liệu
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            // thay thế giao diện vùng #baocao_sanpham bằng chuỗi đã tìm được
            $('#baocao_sanpham').html(htmlString);
          },
          // thất bại
          error: function() {
            var htmlString = `<h1>Không tìm thấy dữ liệu</h1>`;
            // thay thế giao diện vùng #baocao_sanpham thành chuỗi đã tìm được
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
        $.ajax('/kdbd.com/admin/api/baocao_khachhang.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocao_khachhang').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không tìm thấy dữ liệu</h1>`;
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
        $.ajax('/kdbd.com/admin/api/baocao_dondathang.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocao_dondathang').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không tìm thấy dữ liệu</h1>`;
            $('#baocao_dondathang').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoDonHang').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoDonHang();
      });

      // ----------------- Tổng Loai sản phẩm --------------------------
      function getDuLieuBaoCaoTongLoaiSanPham() {
        $.ajax('/kdbd.com/admin/api/baocao_loaisanpham.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            console.log(htmlString);
            $('#baocao_loaisanpham').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không tìm thấy dữ liệu</h1>`;
            $('#baocao_loaisanpham').html(htmlString);
          }
        });
      }
      $('#refreshLoaiSanPham').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongLoaiSanPham();
      });


      // ------------------ Vẽ biểu đồ thống kê Loại sản phẩm -----------------
      // Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
      var $objChartThongKeLoaiSanPham; //xóa biến cũ để vẽ 1 biến mới 
      var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext("2d"); // bản đồ 2D

      var $objChartThongKeSanPham; //xóa biến cũ để vẽ 1 biến mới 
      var $chartOfobjChartThongKeSanPham = document.getElementById("chartOfobjChartThongKeSanPham").getContext("2d"); // bản đồ 2D

      function renderChartThongKeLoaiSanPham() {
        // ajax loại sản phẩm
        $.ajax({
          url: '/kdbd.com/admin/api/baocao_loaisanpham.php',
          type: "GET",
          success: function(data_lsp) {
            var data = JSON.parse(data_lsp);
            var lsp_ten = [];
            var lsp_data = [];
            $(data).each(function() {
              lsp_ten.push((this.TenLoaiSanPham));
              lsp_data.push(this.SoLuong);
            });
            lsp_data.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
              $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
              // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
              type: "bar",
              data: {
                labels: lsp_ten,
                datasets: [{
                  data: lsp_data,
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
        // end ajax loại sản phẩm
      };

      // thống kê sản phẩm
      function renderChartThongKeSanPham() {
        // ajax sản phẩm
        $.ajax({
          url: '/kdbd.com/admin/api/baocao_sanpham.php',
          type: "GET",
          success: function(data_sp_raw) {
            var data_sp = JSON.parse(data_sp_raw);
            var sp_ten = [];
            var sp_data = [];
            $(data_sp).each(function() {
              sp_ten.push((this.TenSanPham));
              sp_data.push(this.SoLuong);
            });
            sp_data.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeSanPham !== "undefined") {
              $objChartThongKeSanPham.destroy();
            }
            $objChartThongKeSanPham = new Chart($chartOfobjChartThongKeSanPham, {
              // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
              type: "bar",
              data: {
                labels: sp_ten,
                datasets: [{
                  data: sp_data,
                  borderColor: "rgba(255, 99, 132, 0.2)",
                  backgroundColor: "rgb(255, 99, 132)",
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
                  text: "Thống kê Sản phẩm"
                },
                responsive: true
              }
            });
          }
        });
      };


      $('#refreshThongKeAll').click(function(event) {
        event.preventDefault();
        renderChartThongKeLoaiSanPham();
        renderChartThongKeSanPham();
      });

      // Mới mở web (khi trang web load xong)
      // thì sẽ gọi lập tức một số hàm AJAX gọi API lấy dữ liệu
      getDuLieuBaoCaoTongSoMatHang();
      getDuLieuBaoCaoTongSoKhachHang();
      getDuLieuBaoCaoTongSoDonHang();
      getDuLieuBaoCaoTongLoaiSanPham();
      renderChartThongKeLoaiSanPham();
      renderChartThongKeSanPham();
    });
  </script>
</body>

</html>