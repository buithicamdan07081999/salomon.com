<?php 
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    $httt_ma = $_GET['httt_ma'];
    $sql = "DELETE FROM hinhthucthanhtoan WHERE httt_ma = $httt_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>