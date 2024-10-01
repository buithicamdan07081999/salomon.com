<?php
include_once __DIR__ . '/../../../handle/dbconnect.php';
$hsp_ma = $_GET['hsp_ma'];
$sql_hsp_del =
    "SELECT 
         A.hsp_tentaptin 
     FROM hinhsanpham A 
     WHERE hsp_ma = $hsp_ma";
$sql_del_hsp_db =
    "DELETE FROM hinhsanpham
     WHERE hsp_ma = $hsp_ma";
$data_hsp_del = mysqli_query($conn, $sql_hsp_del);
$array_hsp_del = mysqli_fetch_array($data_hsp_del, MYSQLI_ASSOC);
$upload_dir = realpath(__DIR__ . '/../../../uploads') . DIRECTORY_SEPARATOR; // fix lỗi đường dẫn "$upload_dir = __DIR__ . '/../../../uploads' " ko đúng
$file_path_delete = $upload_dir . $array_hsp_del['hsp_tentaptin'];

var_dump($file_path_delete);

if (file_exists($file_path_delete)) {
    //echo "File tồn tại, đang xóa file...";
    unlink($file_path_delete);
    mysqli_query($conn, $sql_del_hsp_db);
    echo '<script> location.href="index.php"</script>';
} else {
    echo "File không tồn tại, kiểm tra lại đường dẫn.";
}
//Xóa database
