<?php 
    include_once __DIR__ . '/../../../dbconnect.php';
    $kh_tendangnhap = $_GET['kh_tendangnhap'];
    $sql = "DELETE FROM khachhang WHERE kh_tendangnhap = '$kh_tendangnhap'";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>