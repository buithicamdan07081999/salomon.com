<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHUYẾN MÃI</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    include_once __DIR__ . '/../../../backend/layouts/script.php';
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
                <h3>KHUYẾN MÃI</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                $sql = "SELECT km_ma, km_ten, km_noidung, km_tungay, km_denngay
                FROM khuyenmai;";
                $data = mysqli_query($conn, $sql);
                $arrDanhSachkm = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachkm[] = array(
                        'km_ma' => $row['km_ma'],
                        'km_ten' => $row['km_ten'],
                        'km_noidung' => $row['km_noidung'],
                        'km_tungay' => $row['km_tungay'],
                        'km_denngay' => $row['km_denngay'],
                    );
                }
                //var_dump($arrDanhSachkm);
                ?>

                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã khuyến mãi</th>
                        <th>Tên khuyến mãi</th>
                        <th>Nội dung khuyến mãi</th>
                        <th>Khuyến mãi từ ngày</th>
                        <th>Khuyến mãi đến ngày</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachkm as $km) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $km['km_ma'] ?></td>
                            <td><?= $km['km_ten'] ?></td>
                            <td><?= $km['km_noidung'] ?></td>
                            <td><?= $km['km_tungay'] ?></td>
                            <td><?= $km['km_denngay'] ?></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?km_ma=<?= $km['km_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?km_ma=<?= $km['km_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
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
    include_once __DIR__ . '/../../../backend/layouts/footer.php';
    ?>
</body>

</html>