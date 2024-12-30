<?php
//  1. Mở kết nối ( Kết nối với Database )
include_once __DIR__ . '/dbconnect.php';


// 2. Chuẩn bị câu lệnh ( Các bảng dữ liệu )
$sql_lsp =  "SELECT 
                A.lsp_ma, 
                A.lsp_ten,
                A.lsp_mota
            FROM loaisanpham A
            ";

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

$sql_tttt = "SELECT A.tttt_ma,
       A.tttt_ten,
       A.tttt_diengiai
FROM trangthaithanhtoan A";

$sql_httt = "SELECT 
A.httt_ma, 
A.httt_ten,
A.httt_diengiai
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
$sql_hsp =  "SELECT 
                A.hsp_ma,
                A.hsp_tentaptin,
                A.sp_ma,
                B.sp_ten,
                B.sp_gia
            FROM hinhsanpham A
            LEFT JOIN sanpham B
            ON A.sp_ma = B.sp_ma";
$sql_ddh =  "SELECT 
                    A.dh_ma, 
                    A.dh_ngaylap, 
                    A.dh_ngaygiao, 
                    A.dh_noigiao, 
                    A.httt_ma,
                    A.kh_ma, 
                    A.sp_ma,
                    A.tttt_ma,
                    B.httt_ma,
                    B.httt_ten,
                    C.kh_ten, 
                    D.sp_ten,
                    D.sp_gia,
                    E.tttt_ten, SUM(F.sp_dh_soluong * F.sp_dh_dongia) tongthanhtien
            FROM dondathang A
            LEFT JOIN hinhthucthanhtoan B ON A.httt_ma = B.httt_ma
            LEFT JOIN thongtinkhachhang C ON A.kh_ma = C.kh_ma
            LEFT JOIN sanpham D ON A.sp_ma = D.sp_ma
            LEFT JOIN trangthaithanhtoan E ON A.tttt_ma = E.tttt_ma 
            LEFT JOIN sanpham_dondathang F ON A.dh_ma = F.dh_ma
            GROUP BY         
                    A.dh_ma, 
                    A.dh_ngaylap, 
                    A.dh_ngaygiao, 
                    A.dh_noigiao, 
                    A.httt_ma,
                    A.kh_ma, 
                    A.sp_ma,
                    A.tttt_ma,
                    B.httt_ma,
                    B.httt_ten,
                    C.kh_ten, 
                    D.sp_ten,
                    D.sp_gia,
                    E.tttt_ten
            ";

// //API
// $sql_sp_api =  "SELECT count(*) as SoLuong from sanpham;";
// $sql_sp_kh =  "SELECT count(*) as SoLuong from thongtinkhachhang;";
// $sql_sp_dh =  "SELECT count(*) as SoLuong from dondathang;";
// $sql_sp_dh =  "SELECT count(*) as SoLuong from loaisanpham;";
// //API

// 3. Thực thi câu lệnh
$data_lsp = mysqli_query($conn, $sql_lsp);
$data_npp = mysqli_query($conn, $sql_npp);
$data_km = mysqli_query($conn, $sql_km);
$data_th = mysqli_query($conn, $sql_th);
$data_kh = mysqli_query($conn, $sql_kh);
$data_httt = mysqli_query($conn, $sql_httt);
$data_tttt = mysqli_query($conn, $sql_tttt);
$data_sp = mysqli_query($conn, $sql_sp);
$data_hsp = mysqli_query($conn, $sql_hsp);
$data_ddh = mysqli_query($conn, $sql_ddh);

// 4. Trả về mảng dữ liệu
$arrDs_Lsp = [];
$arrDs_Npp = [];
$arrDs_km = [];
$arrDs_th = [];
$arrDs_kh = [];
$arrDs_httt = [];
$arrDs_tttt = [];
$arrDs_sp = [];
$arrDs_hsp = [];
$arrDs_ddh = [];

// 5. Phân tích khối dữ liệu trong mảng thành từng cột
while ($row = mysqli_fetch_array($data_lsp, MYSQLI_ASSOC)) {
    $arrDs_Lsp[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
        'lsp_mota' => $row['lsp_mota'],
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
while ($row = mysqli_fetch_array($data_httt, MYSQLI_ASSOC)) {
    $arrDs_httt[] = array(
        'httt_ma' => $row['httt_ma'],
        'httt_ten' => $row['httt_ten'],
        'httt_diengiai' => $row['httt_diengiai'],
    );
}
while ($row = mysqli_fetch_array($data_tttt, MYSQLI_ASSOC)) {
    $arrDs_tttt[] = array(
        'tttt_ma' => $row['tttt_ma'],
        'tttt_ten' => $row['tttt_ten'],
        'tttt_diengiai' => $row['tttt_diengiai'],
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
while ($row = mysqli_fetch_array($data_hsp, MYSQLI_ASSOC)) {
    $arrDs_hsp[] = array(
        'hsp_ma' => $row['hsp_ma'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
    );
}
while ($row = mysqli_fetch_array($data_ddh, MYSQLI_ASSOC)) {
    $arrDs_ddh[] = array(
        'dh_ma' => $row['dh_ma'],
        'dh_ngaylap' => $row['dh_ngaylap'],
        'dh_ngaygiao' => $row['dh_ngaygiao'],
        'dh_noigiao' => $row['dh_noigiao'],
        'httt_ma' => $row['httt_ma'],
        'kh_ma' => $row['kh_ma'],
        'sp_ma' => $row['sp_ma'],
        'tttt_ma' => $row['tttt_ma'],
        'httt_ma' => $row['httt_ma'],
        'kh_ten' => $row['kh_ten'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'tttt_ten' => $row['tttt_ten'],
        'httt_ten' => $row['httt_ten'],
        'tongthanhtien' => $row['tongthanhtien'],
    );
}

return [
    'arrDs_Lsp' => $arrDs_Lsp,
    'arrDs_Npp' => $arrDs_Npp,
    'arrDs_km' => $arrDs_km,
    'arrDs_th' => $arrDs_th,
    'arrDs_kh' => $arrDs_kh,
    'arrDs_httt' => $arrDs_httt,
    'arrDs_tttt' => $arrDs_tttt,
    'arrDs_hsp' => $arrDs_hsp,
    'arrDs_ddh' => $arrDs_ddh,
];
