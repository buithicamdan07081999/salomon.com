
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <!-- start topbar -->
  <div class="container-fluid" id="topbar" style="background-color: #343a40; height: 50px;">
    <!-- start topbar-left -->
    <div id="topbar-left">
      <!-- <ul class="topbar-left-list navbar-nav me-auto mb-2 mb-lg-0"> -->
      <ul class="topbar-left-list navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/kdbd.com/index.php">Home</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/kdbd.com/admin/function/sanpham/index.php">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/kdbd.com/admin/function/loaisanpham/index.php">Danh mục</a>
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
        <li><a class="nav-link active" aria-current="page" href="/kdbd.com/admin/contact.php">Liên hệ</a></li>
        <li><a class="nav-link active" aria-current="page" href="/kdbd.com/home/about.php">Về chúng tôi</a></li>
        <?php
        // Đã đăng nhập rồi -> hiển thị tên Người dùng và menu Đăng xuất
        if (isset($_SESSION['logged']) && !empty($_SESSION['logged'])) : ?>
          <li><a class="nav-link active" aria-current="page" href="/kdbd.com/admin/index.php">Giỏ hàng</a></li>
          <li class="nav-item active"><a class="nav-link active" href="/kdbd.com/auth/login.php"><?= $_SESSION['logged'] ?></a></li>
        <?php else : ?>
          <li class="nav-item active"><a class="nav-link active" href="/kdbd.com/auth/login.php">Đăng nhập</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <!-- end topbar-right -->
</nav>
<!-- end topbar -->
<!-- 
<div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" 
           href="#" 
           role="button" 
           id="dropdownMenuLink"
           data-bs-toggle="dropdown" 
           aria-expanded="false">
            Dropdown link
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $('.dropdown').hover(function () {
                $(this).addClass('show');
                $(this).find('.dropdown-menu').addClass('show');
            }, function () {
                $(this).removeClass('show');
                $(this).find('.dropdown-menu').removeClass('show');
            });
        });
    </script> -->
