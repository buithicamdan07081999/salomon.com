<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOẠI SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</head>

<body>
    <!-- add header -->
    <?php
    include_once __DIR__ . '/../../../layouts/header.php';
    ?>
    <!-- this is contain -->
    <div class="container-fluid">
        <!-- 
            Note: 1. Container-fluid full màn hình 
                  2. Container nhỏ hơn
                  3. Dòng với cột cộng lại là 12
        -->
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>LOẠI SẢN PHẨM</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>                
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_Lsp as $lsp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $lsp['lsp_ma'] ?></td>
                            <td><?= $lsp['lsp_ten'] ?></td>
                            <td><?= $lsp['lsp_mota'] ?></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?lsp_ma=<?= $lsp['lsp_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?lsp_ma=<?= $lsp['lsp_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
</body>

</html>