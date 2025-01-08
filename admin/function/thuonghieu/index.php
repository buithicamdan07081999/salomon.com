<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THƯƠNG HIỆU</title>
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
                <h3>THƯƠNG HIỆU</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                $sql = "SELECT th_ma, th_ten, th_mota
                FROM thuonghieu;";
                $data = mysqli_query($conn, $sql);
                $arrDanhSachth = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachth[] = array(
                        'th_ma' => $row['th_ma'],
                        'th_ten' => $row['th_ten'],
                        'th_mota' => $row['th_mota'],
                    );
                }
                //var_dump($arrDanhSachth);
                ?>

                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã thương hiệu</th>
                        <th>Tên thương hiệu</th>
                        <th>Nội dung</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachth as $th) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $th['th_ma'] ?></td>
                            <td><?= $th['th_ten'] ?></td>
                            <td><?= $th['th_mota'] ?></td>
                            <td>
                                <a href="edit.php?th_ma=<?= $th['th_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?th_ma=<?= $th['th_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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