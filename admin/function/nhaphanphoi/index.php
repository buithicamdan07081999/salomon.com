<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHÀ PHÂN PHỐI</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</head>

<body>
    <!-- add header -->
    <?php
    include_once __DIR__ . '/../../../layouts/header.php'
    ?>
    <!-- this is contain -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>NHÀ PHÂN PHỐI</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                $sql = "SELECT npp_ma, npp_ten, npp_mota
                FROM nhaphanphoi;";
                $data = mysqli_query($conn, $sql);
                $arrDanhSachnpp = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachnpp[] = array(
                        'npp_ma' => $row['npp_ma'],
                        'npp_ten' => $row['npp_ten'],
                        'npp_mota' => $row['npp_mota'],
                    );
                }
                // var_dump($arrDanhSachnpp);
                ?>

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
                    <?php foreach ($arrDanhSachnpp as $npp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $npp['npp_ma'] ?></td>
                            <td><?= $npp['npp_ten'] ?></td>
                            <td><?= $npp['npp_mota'] ?></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?npp_ma=<?= $npp['npp_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?npp_ma=<?= $npp['npp_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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