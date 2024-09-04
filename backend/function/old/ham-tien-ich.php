<?php 
// Khai báo / xây dựng hàm THAM SỐ (parameters)
function trung_binh_cong($a, $b) {
    $kq = ($a + $b) / 2;
    return $kq;
}
// Khai báo / xây dựng hàm
function chao_mung($ten) {
    echo '<br />Chào mừng Quý Khách <b style="color: blue;">' 
        . $ten
        . '</b> đã quay lại trang web!<br />';
}
// Khai báo / xây dựng hàm hỏi giờ hiện tại
function ngay_hien_tai() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay = date('D m-d/Y');
    echo 'Hiện tại ngày: ' . $ngay;
}
function ngay_gio_hien_tai() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $gio = date('H:i:s');
    echo 'Giờ hiện tại: <b style="color: red">' . $gio . '</b>';
}
?>