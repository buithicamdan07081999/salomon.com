<?php
include_once __DIR__ . '/dbconnect.php';

$sql_lsp =  "SELECT 
                A.lsp_ma, 
                A.lsp_ten 
            FROM loaisanpham A";

$sql_npp =  "SELECT 
                    A.npp_ma, 
                    A.npp_ten 
                FROM nhaphanphoi A";

$sql_km =   "SELECT 
                    A.km_ma, 
                    A.km_ten, 
                    A.km_noidung, 
                    A.km_tungay, 
                    A.km_denngay 
                FROM khuyenmai A";

$sql_th =   "SELECT 
                    A.th_ma, 
                    A.th_ten 
                FROM thuonghieu A";

$sql_kh =   "SELECT 
                    A.kh_ma, 
                    A.kh_tendangnhap, 
                    A.kh_ten, 
                    A.kh_gioitinh, 
                    A.kh_diachi, 
                    A.kh_dienthoai, 
                    A.kh_email, 
                    A.kh_ngaysinh, 
                    A.kh_cmnd, 
                    A.kh_makichhoat, 
                    A.kh_trangthai, 
                    A.kh_quantri 
                FROM thongtinkhachhang A
                ORDER BY A.kh_ma asc";

$sql_httt = "SELECT 
                    A.httt_ma, 
                    A.httt_ten
                FROM hinhthucthanhtoan A";

$sql_sp =   "SELECT 
					 A.sp_ma, A.sp_ten,
					 B.lsp_ten, 
					 C.th_ten,
					 A.sp_gia, 
                     A.sp_giacu, 
                     A.sp_mota_ngan, 
                     A.sp_mota_chitiet, 
                     A.sp_soluong,
					 D.npp_ten,
					 E.km_ten,
					 E.km_noidung,
					 E.km_tungay,
					 E.km_denngay,
                     E.km_noidung
                FROM sanpham A
                LEFT JOIN loaisanpham B   
                    ON A.lsp_ma = B.lsp_ma
                LEFT JOIN thuonghieu C
                    ON A.th_ma = C.th_ma
                LEFT JOIN nhaphanphoi D
                    ON A.npp_ma = D.npp_ma                
				LEFT JOIN khuyenmai E
                    ON A.km_ma = E.km_ma";

$data_lsp = mysqli_query($conn, $sql_lsp);
$data_npp = mysqli_query($conn, $sql_npp);
$data_km = mysqli_query($conn, $sql_km);
$data_th = mysqli_query($conn, $sql_th);
$data_kh = mysqli_query($conn, $sql_kh);
$data_httt = mysqli_query($conn, $sql_httt);
$data_sp = mysqli_query($conn, $sql_sp);

// array
$arrDs_Lsp = [];
$arrDs_Npp = [];
$arrDs_km = [];
$arrDs_th = [];
$arrDs_kh = [];
$arrDs_httt = [];
$arrDs_sp = [];

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
}
while ($row = mysqli_fetch_array($data_kh, MYSQLI_ASSOC)) {
    $arrDs_kh[] = array(    
        'kh_ma' => $row['kh_ma'],
        'kh_tendangnhap' => $row['kh_tendangnhap'],
        'kh_ten' => $row['kh_ten'],
        'kh_gioitinh' => $row['kh_gioitinh'],
        'kh_diachi' => $row['kh_diachi'],
        'kh_dienthoai' => $row['kh_dienthoai'],
        'kh_email' => $row['kh_email'],        
        'kh_ngaysinh' => $row['kh_ngaysinh'],        
        'kh_cmnd' => $row['kh_cmnd'],
        'kh_makichhoat' => $row['kh_makichhoat'],
        'kh_trangthai' => $row['kh_trangthai'],
        'kh_quantri' => $row['kh_quantri'],
    );
}
while ($row = mysqli_fetch_array($data_httt, MYSQLI_ASSOC))
{
    $arrDs_httt[] = array(
        'httt_ma' => $row['httt_ma'],
        'httt_ten' => $row['httt_ten'],
    );
}
while ($row = mysqli_fetch_array($data_sp, MYSQLI_ASSOC)) {
    $arrDs_sp[] = array(
        'lsp_ten' => $row['lsp_ten'],
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_mota_ngan' => $row['sp_mota_ngan'],
        'sp_mota_chitiet' => $row['sp_mota_chitiet'],
        'sp_soluong' => $row['sp_soluong'],
        'th_ten' => $row['th_ten'],
        'npp_ten' => $row['npp_ten'],
        'km_ten' => $row['km_ten'],
        'km_tungay' => $row['km_tungay'],
        'km_denngay' => $row['km_denngay'],
        'km_noidung' => $row['km_noidung'],
    );
}
return [
    'arrDs_Lsp' => $arrDs_Lsp,
    'arrDs_Npp' => $arrDs_Npp,
    'arrDs_km' => $arrDs_km,
    'arrDs_th' => $arrDs_th,
    'arrDs_kh' => $arrDs_kh,
    'arrDs_httt' => $arrDs_httt,
];
?>
