<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../layouts/partials/script.php';
    include_once __DIR__ . '/../../../handle/select.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <h3>SẢN PHẨM</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>               
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Danh mục</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Khuyến mãi</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_sp as $sp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $sp['lsp_ten'] ?></td>
                            <td><?= $sp['sp_ten'] ?></td>
                            <td>
                                <del>
                                    <?=
                                    number_format($sp['sp_giacu'], 2, ",", ".")
                                    ?>
                                </del></br>
                                <?=
                                number_format($sp['sp_gia'], 2, ",", ".")
                                ?>
                            </td>
                            <td><?= $sp['sp_mota_ngan'] ?></td>
                            <td><?= $sp['sp_soluong'] ?>/1000</td>
                            <td>
                                <!-- https://getbootstrap.com/docs/5.3/components/badge/ -->
                                <?php if (!empty($sp['km_ten'])) : ?>
                                    <span class="btn btn-primary badge rounded-pill text-bg-info">
                                        <?= date('d/m/Y', strtotime($sp['km_tungay'])) ?>
                                        -
                                        <?= date('d/m/Y', strtotime($sp['km_denngay'])) ?>
                                    </span></br>
                                    <ul>
                                        <li>
                                            <?= $sp['km_ten'] ?>
                                        </li>
                                        <li>
                                            <?= $sp['km_noidung'] ?>
                                        </li>
                                    </ul>
                                <?php endif ?>

                            </td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?sp_ma=<?= $sp['sp_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?sp_ma=<?= $sp['sp_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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
    <!-- this is contain -->
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>