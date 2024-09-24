<?php 
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    $lsp_ma = $_GET['lsp_ma'];
    $sql = "DELETE FROM LOAISANPHAM WHERE LSP_MA = $lsp_ma";
    mysqli_query($conn , $sql);
    echo '<script> location.href="index.php"</script>' // Điều hướng lại trang index
?>