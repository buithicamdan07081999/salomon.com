<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
	// Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
	session_start();
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <!-- start topbar -->
  <div class="container-fluid" id="topbar" style="background-color: #343a40; height: 50px;">
    <!-- start topbar-left -->
    <div id="topbar-left">
      <ul class="topbar-left-list navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/salomon.com/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/salomon.com/backend/function/dondathang/index.php">Đơn đặt hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/salomon.com/backend/function/sanpham/index.php">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/salomon.com/backend/function/loaisanpham/index.php">Loại sản phẩm</a>
        </li>
      </ul>
    </div>
    <!-- end topbar-left -->
    <!-- start topbar-middle -->
    <div id="topbar-middle">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <!-- end topbar-middle -->
    <!-- start topbar-right -->
    <div id="topbar-right">
      <ul class="topbar-right-list">
        <li><a class="nav-link active" aria-current="page" href="/salomon.com/backend/index.php">ADMIN</a></li>
        <li><a class="nav-link active" aria-current="page" href="/salomon.com/backend/index.php">Về chúng tôi</a></li>
        <?php
        // Đã đăng nhập rồi -> hiển thị tên Người dùng và menu Đăng xuất
        if (isset($_SESSION['logged']) && !empty($_SESSION['logged'])) : ?>
          <li><a class="nav-link active" aria-current="page" href="/salomon.com/backend/index.php">Giỏ hàng</a></li>
          <li class="nav-item active"><a class="nav-link active" href="/salomon.com/backend/auth/login.php"><?= $_SESSION['logged'] ?></a></li>
        <?php else : ?>
          <li class="nav-item active"><a class="nav-link active" href="/salomon.com/backend/auth/login.php">Đăng nhập</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <!-- end topbar-right -->
</nav>
<!-- end topbar -->