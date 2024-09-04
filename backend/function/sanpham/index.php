<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
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
                <h3>SẢN PHẨM</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <?php
                // 1. Tạo kết nối
                include_once __DIR__ . '/../../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh SQL Query
                $sql = "
                SELECT
                B.lsp_ten, A.sp_ma, A.sp_ten, A.sp_gia, A.sp_mota_ngan, A.sp_mota_chitiet, A.sp_soluong
                FROM sanpham A
                LEFT JOIN loaisanpham B 
                ON A.lsp_ma = B.lsp_ma
                ;";

                // 3. Yêu cầu PHP thực thi query
                $data = mysqli_query($conn, $sql);

                // 4. Phân tách dữ liệu
                $arrDanhSachsp = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDanhSachsp[] = array(
                        'lsp_ten' => $row['lsp_ten'],
                        'sp_ma' => $row['sp_ma'],
                        'sp_ten' => $row['sp_ten'],
                        'sp_gia' => $row['sp_gia'],
                        'sp_mota_ngan' => $row['sp_mota_ngan'],
                        'sp_mota_chitiet' => $row['sp_mota_chitiet'],
                        'sp_soluong' => $row['sp_soluong'],
                    );
                }
                //var_dump($arrDanhSachsp);
                ?>

                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Danh mục</th>
                        <th>Số Seri</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Mô tả chi tiết</th>
                        <th>Số lượng tồn kho</th>
                        <th>Số lượng đã bán</th>
                        <th>EDIT</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDanhSachsp as $sp) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $sp['lsp_ten'] ?></td>
                            <td><?= $sp['sp_ma'] ?></td>
                            <td><?= $sp['sp_ten'] ?></td>
                            <td><?= $sp['sp_gia'] ?></td>
                            <td><?= $sp['sp_mota_ngan'] ?></td>
                            <td><?= $sp['sp_mota_chitiet'] ?></td>
                            <td><?= $sp['sp_soluong'] ?></td>
                            <td>Chưa tính</td>
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
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>