<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../../layouts/header.php'
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>KHÁCH HÀNG</h3><span style="color: red;">(CÒN PHẦN MẬT KHẨU VỚI THÔNG BÁO XÁC NHẬN XÓA)</span><br /><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <?php
                if (is_array($arrDs_kh)) {
                ?>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>STT</th>
                            <th>Tên đăng nhập</th>
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
                                <td><?= $kh['kh_tendangnhap'] ?></td>
                                <td><?= ($kh['kh_gioitinh'] == 1) ? 'Nam' : 'Nữ'; ?></td>
                                <td><?= $kh['kh_ngaysinh'] ?></td>
                                <td><?= $kh['kh_diachi'] ?></td>
                                <td><?= $kh['kh_dienthoai'] ?></td>
                                <td><?= $kh['kh_email'] ?></td>
                                <td>
                                    <a href="edit.php?kh_ma=<?= $kh['kh_ma'] ?>" class="btn btn-warning sua">Sửa</a>
                                    <a href="delete.php?kh_ma=<?= $kh['kh_ma'] ?>" class="btn btn-danger xoa">Xóa</a>
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
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>

</body>

</html>