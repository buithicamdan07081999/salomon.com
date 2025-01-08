<?php
include_once __DIR__ . '/../../../handle/dbconnect.php';
// 1. khai báo biến hsp_ma
$hsp_ma = $_GET['hsp_ma'];
// 2. Chuẩn bị câu lệnh

//  Để lấy tên hình - lấy đường dẫn
$sql_hsp_del =
    "SELECT 
         A.hsp_tentaptin 
     FROM hinhsanpham A 
     WHERE hsp_ma = $hsp_ma";

// Để xóa SQL     
$sql_del_hsp_db =
    "DELETE FROM hinhsanpham
     WHERE hsp_ma = $hsp_ma";
 // 3. Thực thi câu lệnh
$data_hsp_del = mysqli_query($conn, $sql_hsp_del);
$row_hsp_del = mysqli_fetch_array($data_hsp_del, MYSQLI_ASSOC);
// 4. Xóa file tránh rác
$upload_dir = realpath(__DIR__ . '/../../../uploads') . DIRECTORY_SEPARATOR; // fix lỗi đường dẫn "$upload_dir = __DIR__ . '/../../../uploads' " ko đúng
// 5. Đường dẫn đi đến file muốn xóa
$file_path_delete = $upload_dir . $row_hsp_del['hsp_tentaptin']; 
//var_dump($file_path_delete);

if (file_exists($file_path_delete)) {
    //echo "File tồn tại, đang xóa file...";
    // 1. Xóa file
    unlink($file_path_delete); // tương đương delete
    // 2. Xóa SQL
    mysqli_query($conn, $sql_del_hsp_db);
    echo '<script> location.href="index.php"</script>';
} else {
    echo "File không tồn tại, kiểm tra lại đường dẫn.";
}
//Xóa database
