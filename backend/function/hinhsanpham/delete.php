<?php 
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    $hsp_ma = $_GET['hsp_ma'];
    $sql = "DELETE FROM hinhsanpham WHERE hsp_ma = $hsp_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>