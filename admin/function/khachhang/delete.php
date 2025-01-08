<?php 
    include_once __DIR__ . '/../../../handle/select.php';
    $kh_ma = $_GET['kh_ma'];
    $sql = "DELETE FROM thongtinkhachhang WHERE kh_ma = '$kh_ma'";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>