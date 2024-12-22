<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . '/../../../handle/dbconnect.php';
?>
<?php
$dh_ma = $_GET['dh_ma'];
$sql_select_data_old = "
                            SELECT 
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
                            HAVING A.dh_ma = $dh_ma";
$sql_detail = "SELECT
                            sp.sp_ten,
                            lsp.lsp_ten,
                            npp.npp_ten,
                            spdh.sp_dh_soluong soluong,
                            spdh.sp_dh_dongia dongia,
                            (spdh.sp_dh_soluong * spdh.sp_dh_dongia) thanhtien,
                            spdh.dh_ma
                        FROM sanpham_dondathang spdh
                        LEFT JOIN sanpham sp ON sp.sp_ma = spdh.sp_ma
                        LEFT JOIN loaisanpham lsp ON lsp.lsp_ma = sp.lsp_ma
                        LEFT JOIN nhaphanphoi npp ON sp.npp_ma = npp.npp_ma
                        WHERE spdh.dh_ma = $dh_ma
                        ORDER BY spdh.dh_ma";
$sql_data_old = mysqli_query($conn, $sql_select_data_old);
$sql_data_detail = mysqli_query($conn, $sql_detail);
$data_array = [];
$data_array_detail = [];
$data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
// Phân tách thành mảng - 
while ($row = mysqli_fetch_array($sql_data_detail, MYSQLI_ASSOC)) {
    $data_array_detail[] = array(
        'sp_ten' => $row['sp_ten'],
        'lsp_ten' => $row['lsp_ten'],
        'npp_ten' => $row['npp_ten'],
        'soluong' => $row['soluong'],
        'dongia' => $row['dongia'],
        'thanhtien' => $row['thanhtien'],
    );
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang in</title>
    <link href="/salomon.com/vendor/paper-css/paper.min.css" type="text/css" rel="stylesheet" />
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    ?>
    <style>
        @page {
            size: A4
        }
    </style>
    <style>
        .body_css {
            border: 2px palegreen solid;
        }
    </style>
    <style>
        .print-width {
            width: 50px;
        }

        .vonglap td {
            border: 1px black solid;
        }
    </style>
    <!-- step:
     1. read document on Github https://github.com/cognitom/paper-css
     2. Paper size: https://papersizes.io/a/ -->
</head>

<body class="A4">
    <!-- không được xóa dòng section -->
    <section class="sheet padding-10mm">
        <table style="width: 100%;" border="1" ;>
            <tr>
                <td width="30mm" border="1">
                    <img src="/salomon.com/assets/img/logo.jpg" alt="" width="80px">
                </td>
                <td class="center-css">CÔNG TY TNHH BUI DAN</td>
            </tr>
        </table>
        <p>Thông tin đơn hàng:</p>
        <table style="width: 100%;" border="1">
            <tr>
                <td class="left-css print-width">Khách hàng: </td>
                <td class="left-css print-width"><?= $data_array['kh_ten'] ?></td>
            </tr>
            <tr>
                <td class="left-css print-width">Ngày lập:</td>
                <td class="left-css print-width"><?= date('d/m/Y H:m:s', strtotime($data_array['dh_ngaylap'])) ?></td>
            </tr>
            <tr>
                <td class="left-css print-width">Hình thức thanh toán: </td>
                <td class="left-css print-width"><?= $data_array['httt_ten'] ?></td>
            </tr>
            <tr>
                <td class="left-css print-width">Tổng thành tiền: </td>
                <td class="left-css print-width"><?= number_format($data_array['tongthanhtien'], '0', '.', ',') ?></td>
            </tr>
        </table>
        <p>Chi tiết đơn hàng:</p>
        <table class="vonglap" style="width: 100%;" border="1">
            <tr>
                <th class="left-center">STT</th>
                <th class="left-center">Sản phẩm</th>
                <th class="left-center">Số lượng</th>
                <th class="left-center">Đơn giá</th>
                <th class="left-center">Thành tiền</th>
            </tr>

            <?php foreach ($data_array_detail as $index => $detail): ?>
                <tr>
                    <td class="center-css"><?= $index + 1 ?></td>
                    <td>
                        <b><?= $detail['sp_ten'] ?></b>
                        <i style="font-size 0.8mm"><?= $detail['lsp_ten'] ?></i>
                        <i style="font-size 0.8mm"><?= $detail['npp_ten'] ?></i>
                    </td>
                    <td  class="right-css">
                        <?= number_format($detail['soluong'], 0, '.', ',') ?>
                    </td>
                    <td  class="right-css">
                        <?= number_format($detail['dongia'], 0, '.', ',') ?>
                    </td>
                    <td  class="right-css">
                        <?= number_format($detail['thanhtien'], 0, '.', ',') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Tổng thành tiền </td>
                <td colspan="1" class="right-css">
                    <?= number_format($data_array['tongthanhtien'], 0, '.', ',') ?>
                </td>
            </tr>
        </table>
    </section>
</body>

</html>