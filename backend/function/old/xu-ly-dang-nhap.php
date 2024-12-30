<?php
    // 1. Bóc tách dữ liệu theo đường GET
    $tk = $_GET['txtTaiKhoan'];
    $mk = $_GET['txtMatKhau'];

    // Kiểm tra xem tài khoản, mật khẩu có đúng k?...
    
    // 2. In ra màn hình
    echo 'Tài khoản là: ' . $tk;
    echo 'Mật khẩu là: ' . $mk;
?>