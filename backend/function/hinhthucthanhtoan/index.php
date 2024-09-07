<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH THỨC THANH TOÁN</title>
    <?php
    include_once __DIR__ . '/../../../dbconnect.php';
    ?>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
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
                <h3>HÌNH THỨC THANH TOÁN</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                // 1. Tạo kết nối
                include_once __DIR__ . '/../../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh SQL Query
                $sql = "SELECT httt_ma, httt_ten
                FROM hinhthucthanhtoan;";
                // 3. Yêu cầu PHP thực thi query
                $data = mysqli_query($conn, $sql);
                // 4. Phân tách dữ liệu
                $arrDanhSachhttt = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachhttt[] = array(
                        'httt_ma' => $row['httt_ma'],
                        'httt_ten' => $row['httt_ten'],
                    );
                }
                //var_dump($arrDanhSachhttt);
                ?>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachhttt as $httt) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $httt['httt_ma'] ?></td>
                            <td><?= $httt['httt_ten'] ?></td>
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
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>
</html>