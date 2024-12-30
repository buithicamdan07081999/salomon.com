<?php 
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    $npp_ma = $_GET['npp_ma'];
    $sql = "DELETE FROM NHAPHANPHOI WHERE npp_ma = $npp_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>