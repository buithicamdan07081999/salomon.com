<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    include_once __DIR__ . '/../../../handle/select.php';
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
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <?php
                if (is_array($arrDs_kh)) {
                ?>
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
                        <?php $stt = 1;
                        //var_dump($arrDs_kh);
                        ?>
                        <?php foreach ($arrDs_kh as $kh) : ?>
                            <tr>

                                <td><?= $stt ?></td>
                                <td><?= $kh['kh_ten'] ?></td>
                                <td><?= ($kh['kh_gioitinh'] == 1) ? 'Nam' : 'Nữ'; ?></td>
                                <td><?= $kh['kh_ngaysinh'] ?></td>
                                <td><?= $kh['kh_diachi'] ?></td>
                                <td><?= $kh['kh_dienthoai'] ?></td>
                                <td><?= $kh['kh_email'] ?></td>
                                <td>
                                    <a href="edit.php?kh_tendangnhap=<?= $kh['kh_tendangnhap'] ?>" class="btn btn-warning">Sửa</a>
                                    <a href="delete.php?kh_tendangnhap=<?= $kh['kh_tendangnhap'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                        <?php endforeach; ?>
                    </table>
                <?php
                } else {
                    echo "Không có dữ liệu.";
                }
                ?>
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