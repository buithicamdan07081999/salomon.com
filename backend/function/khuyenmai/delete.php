<?php 
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    $km_ma = $_GET['km_ma'];
    $sql = "DELETE FROM khuyenmai WHERE km_MA = $km_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>