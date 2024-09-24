<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../layouts/partials/header.php'
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>KHÁCH HÀNG</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                $sql = "SELECT 
                    kh_tendangnhap,
                    kh_ten, 
                    kh_gioitinh, 
                    kh_diachi, 
                    kh_dienthoai, 
                    kh_email, 
                    kh_ngaysinh, 
                    kh_makichhoat, 
                    kh_trangthai
                FROM khachhang;";
                $data = mysqli_query($conn, $sql);
                $arrDanhSachkh = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachkh[] = array(
                        'kh_tendangnhap' => $row['kh_tendangnhap'],
                        'kh_ten' => $row['kh_ten'],
                        'kh_gioitinh' => $row['kh_gioitinh'],
                        'kh_diachi' => $row['kh_diachi'],
                        'kh_dienthoai' => $row['kh_dienthoai'],
                        'kh_email' => $row['kh_email'],
                        'kh_ngaysinh' => $row['kh_ngaysinh'],
                        'kh_makichhoat' => $row['kh_makichhoat'],
                        'kh_trangthai' => $row['kh_trangthai'],
                    );
                }

                ?>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>GT</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Sdt</th>
                        <th>Email</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachkh as $kh) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $kh['kh_ten'] ?></td>
                            <td><?= $kh['kh_gioitinh'] ?></td>
                            <td><?= $kh['kh_ngaysinh'] ?></td>
                            <td><?= $kh['kh_diachi'] ?></td>
                            <td><?= $kh['kh_dienthoai'] ?></td>
                            <td><?= $kh['kh_email'] ?></td>
                            <td>
                                <a href="edit.php?kh_tendangnhap=<?= $kh['kh_tendangnhap'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?kh_tendangnhap=<?= $kh['kh_tendangnhap'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php
                        $stt++;
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>