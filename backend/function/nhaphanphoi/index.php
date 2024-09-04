<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHÀ PHÂN PHỐI</title>
    <?php
    include_once __DIR__ . '/../../../dbconnect.php';
    ?>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    ?>
</head>

<body>
    <!-- add header -->
    <?php
    include_once __DIR__ . '/../../layouts/partials/header.php'
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
                include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>NHÀ PHÂN PHỐI</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                // 1. Tạo kết nối
                include_once __DIR__ . '/../../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh SQL Query
                $sql = "SELECT npp_ma, npp_ten, npp_mota
                FROM nhaphanphoi;";
                // var_dump($sql);

                // 3. Yêu cầu PHP thực thi query
                $data = mysqli_query($conn, $sql);

                // 4. Phân tách dữ liệu
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
                        <th>Mã npp</th>
                        <th>Tên npp</th>
                        <th>Mô tả npp</th>
                        <th>EDIT</th>
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
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>