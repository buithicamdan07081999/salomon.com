<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CHỦ BACK END</title>
    <!-- nhúng trang css vào -->
    <!-- 1. Liên kết JS (nằm trong thẻ body dưới cùng)-->
    <!-- 2. Liên kết CSS (sử dụng Bootstrap) -- File style.php (nằm trong thẻ head)-->
     <!-- 3. Tải code trên Bootstrap và dán vào header.php, sau đó gọi lại file đó bằng Php trong trang index.php -->
     <?php 
     include_once __DIR__ . '/layouts/partials/styles.php';
     ?>
</head>
<body>
    <?php
    include_once __DIR__ . '/layouts/partials/header.php'
    ?>
 <h2 style="color: red;">Hello Tristan Hella Lovely boy fiends Super Dep Trai nha!  <i class="fa-regular fa-face-kiss-wink-heart"></i></h2>
<h3> 
<i class="fa-solid fa-bars"></i> This one is the choose - First Ex for Font Awesome
</h3> 
<h3>
<i class="fa-solid fa-keyboard"></i> This is Keyboard
</h3> 
<!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
        include_once __DIR__ . '/layouts/partials/script.php';
    ?>
</body>
</html>