<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH THỨC THANH TOÁN</title>
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
                <h3>HÌNH THỨC THANH TOÁN</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_httt as $httt) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $httt['httt_ten'] ?></td>
                            <td><?= $httt['httt_diengiai'] ?></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?httt_ma=<?= $httt['httt_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?httt_ma=<?= $httt['httt_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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
        include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
</body>

</html>