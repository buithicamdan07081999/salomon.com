<?php
include_once(__DIR__.'/../../handle/select.php');
$sql = "    SELECT lsp.lsp_ten TenLoaiSanPham, COUNT(*) AS SoLuong
            FROM sanpham sp
            JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
            GROUP BY sp.lsp_ma";
$result = mysqli_query($conn, $sql);
$data= [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = array(
        'SoLuong' => $row['SoLuong'],
        'TenLoaiSanPham' => $row['TenLoaiSanPham']
    );
}
// Dữ liệu JSON, từ array PHP -> JSON 
echo json_encode($data);