<?php
include_once(__DIR__.'/../../handle/select.php');
$sql = "select count(*) as SoLuong from loaisanpham";
$result = mysqli_query($conn, $sql);
$data= [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = array(
        'SoLuong' => $row['SoLuong'],
        'TenLoaiSanPham' => "Loại sản phẩm"
    );
}
// Dữ liệu JSON, từ array PHP -> JSON 
echo json_encode($data[0]);