<?php
include_once __DIR__ . '/dbconnect.php';

$sql_lsp = "SELECT A.lsp_ma, A.lsp_ten FROM loaisanpham A";
$sql_npp = "SELECT A.npp_ma, A.npp_ten FROM nhaphanphoi A";
$sql_km = "SELECT A.km_ma, A.km_ten, A.km_noidung, A.km_tungay, A.km_denngay FROM khuyenmai A";
$sql_kh = "SELECT A.kh_tendangnhap, A.kh_ten, A.kh_gioitinh, A.kh_diachi, A.kh_dienthoai, A.kh_email, A.kh_ngaysinh, A.kh_cmnd, A.kh_makichhoat, A.kh_trangthai, A.kh_quantri";
$sql_th = "SELECT A.th_ma, A.th_ten FROM thuonghieu A";
// thực thi
$data_lsp = mysqli_query($conn, $sql_lsp);
$data_npp = mysqli_query($conn, $sql_npp);
$data_km = mysqli_query($conn, $sql_km);
$data_th = mysqli_query($conn, $sql_th);
// array
$arrDs_Lsp = [];
$arrDs_Npp = [];
$arrDs_km = [];
$arrDS_th = [];
// phân tích khối dữ liệu thành mảng
while ($row = mysqli_fetch_array($data_lsp, MYSQLI_ASSOC)) {
    $arrDs_Lsp[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
    );
}
while ($row = mysqli_fetch_array($data_npp, MYSQLI_ASSOC)) {
    $arrDs_Npp[] = array(
        'npp_ma' => $row['npp_ma'],
        'npp_ten' => $row['npp_ten'],
    );
}
while ($row = mysqli_fetch_array($data_km, MYSQLI_ASSOC)) {
    $arrDs_km[] = array(
        'km_ma' => $row['km_ma'],
        'km_ten' => $row['km_ten'],
        'km_noidung' => $row['km_noidung'],
        'km_tungay' => $row['km_tungay'],
        'km_denngay' => $row['km_denngay'],
    );
}
while ($row = mysqli_fetch_array($data_th, MYSQLI_ASSOC)) {
    $arrDs_th[] = array(
        'th_ma' => $row['th_ma'],
        'th_ten' => $row['th_ten'],
    );
    //var_dump($arrDs_th);
}
