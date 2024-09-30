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
    <!-- 4. Footer nhúng trước thẻ script -->
    <!-- 5. Tạo main contain (Sidebar & contain) -> Tái sử dụng Siderbar -> Copy code -> nhúng sidebar vào file index-->
    <!-- 6. Thêm css để dễ nhìn -> Tạo khung cho tất cả thẻ div -->
    <?php
    include_once __DIR__ . '/layouts/partials/styles.php';
    ?>

    <style>
        /* div {
             border: 1px solid red; cho dễ nhìn
        } */
    </style>
</head>

<body>
    <?php
    include_once __DIR__ . '/layouts/partials/header.php'
    ?>
    <!-- <h2 style="color: red;">Hello Tristan Hella Lovely boy fiends Super Dep Trai nha! <i class="fa-regular fa-face-kiss-wink-heart"></i></h2> -->
    <div class="container-fluid"> 
        <!-- 
            Note: 1. Container-fluid full màn hình 
                  2. Container nhỏ hơn
                  3. Dòng với cột cộng lại là 12
        -->
        <div class="row">
            <div class="col-3">
                <?php 
                    include_once __DIR__ . '/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
            <script>location.href="function/sanpham/index.php"</script>
            </div>
        </div>
    </div>
    <!-- this is contain -->
    <?php
    include_once __DIR__ . '/layouts/partials/footer.php';
    ?>
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/layouts/partials/script.php';
    ?>
</body>

</html>