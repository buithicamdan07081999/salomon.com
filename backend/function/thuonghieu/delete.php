<?php 
    include_once __DIR__ . '/../../../dbconnect.php';
    $th_ma = $_GET['th_ma'];
    $sql = "DELETE FROM thuonghieu WHERE th_ma = $th_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>