<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../../handle/select.php';
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
    <style>
        .hinh-sanpham {
            width: 120px;
        }
    </style>
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
                <h3>HÌNH SẢN PHẨM</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hình sản phẩm</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_hsp as $hsp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $hsp['sp_ten'] ?></td>
                            <td><?= number_format($hsp['sp_gia'],0,'.',',')  ?></td>
                            <td>
                                <img src="/salomon.com/uploads/<?=$hsp['hsp_tentaptin']?>" alt="" class="hinh-sanpham"></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?hsp_ma=<?= $hsp['hsp_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?hsp_ma=<?= $hsp['hsp_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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
</body>

</html>