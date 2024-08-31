<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <?php
    include_once __DIR__ . '/../../dbconnect.php';
    ?>
    <?php
    include_once __DIR__ . '/../layouts/partials/styles.php';
    ?>
</head>

<body>
    <!-- add header -->
    <?php
    include_once __DIR__ . '/../layouts/partials/header.php'
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
                include_once __DIR__ . '/../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>Danh sách sản phẩm</h3><a href="../../index.php" class="btn btn-outline-info mb-3">Trang chủ</a>
                <?php
                // 1. Tạo kết nối
                include_once __DIR__ . '/../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh SQL Query
                $sql = "SELECT *
                FROM sanpham;";

                // 3. Yêu cầu PHP thực thi query
                $data = mysqli_query($conn, $sql);

                // 4. Phân tách dữ liệu
                $arrDanhSachsp = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachsp[] = array(
                        'sp_ma' => $row['sp_ma'],
                        'sp_ten' => $row['sp_ten'],
                        'sp_mota' => $row['sp_mota'],
                    );
                }
                //var_dump($arrDanhSachsp);
                ?>

                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã sp</th>
                        <th>Tên sp</th>
                        <th>Mô tả sp</th>
                        <th>EDIT</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachsp as $sp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $sp['sp_ma'] ?></td>
                            <td><?= $sp['sp_ten'] ?></td>
                            <td><?= $sp['sp_mota'] ?></td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?sp_ma=<?= $sp['sp_ma'] ?>">Modify</a>
                                <a href="delete.php?sp_ma=<?= $sp['sp_ma'] ?>">Delete</a>
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
    include_once __DIR__ . '/../../backend/layouts/partials/footer.php';
    ?>
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../../backend/layouts/partials/script.php';
    ?>
</body>

</html>