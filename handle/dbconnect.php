<?php
$conn = mysqli_connect('localhost', 'root', '', 'salomon') or 
    die('Xin lỗi, database đang bảo trì hoặc không kết nối được !');

// Hỗ trợ tiếng việt, tiếng trung, thái, nhật... (tượng hình)
$conn->query("SET NAMES 'utf8mb4'"); 
$conn->query("SET CHARACTER SET UTF8MB4");  
$conn->query("SET SESSION collation_connection = 'utf8mb4_unicode_ci'");
?>