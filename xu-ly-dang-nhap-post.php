<?php
    // 1. Bóc tách dữ liệu theo đường POST
    $tk = $_POST['txtTaiKhoan'];
    $mk = $_POST['txtMatKhau'];

    // 2. In ra màn hình
    echo 'Tài khoản là: ' . $tk . '<br />';
    echo 'Mật khẩu là: ' . $mk;

    // 3. Kiểm tra xem tài khoản, mật khẩu có đúng
    // admin và 123 => đăng nhập thành công
    // nếu k        => đăng nhập thất bại
    if($tk == 'admin' && $mk == '123') {
        echo '<span style="color: blue;">Đăng nhập thành công!</span>';
    } else {
        echo '<span style="color: red;">Đăng nhập thất bại!</span>';
    }
?>