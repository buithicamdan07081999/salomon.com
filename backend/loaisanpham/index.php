<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại sản phẩm</title>
    <?php
    include_once __DIR__ . '/../layouts/partials/styles.php';
    ?>
</head>

<body>
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
                    include_once __DIR__ . '/../layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
            <h3>Danh sách loại sản phẩm</h3><a href="../../index.php">Trang chủ</a>
    <?php
    // 1. Tạo kết nối
    include_once __DIR__ . '/../../dbconnect.php';


    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT *
            FROM loaisanpham;";

    // 3. Yêu cầu PHP thực thi query
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách dữ liệu
    $arrDanhSachLSP = [];
    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDanhSachLSP[] = array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
        );
    }
    //var_dump($arrDanhSachLSP);
    ?>

    <a href="create.php">Thêm mới</a>
    <table class="table table-hover">
        <tr>
            <th>STT</th>
            <th>Mã LSP</th>
            <th>Tên LSP</th>
            <th>Mô tả LSP</th>
            <th>EDIT</th>
        </tr>
        <?php $stt = 1 ?>
        <?php foreach ($arrDanhSachLSP as $lsp) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $lsp['lsp_ma'] ?></td>
                <td><?= $lsp['lsp_ten'] ?></td>
                <td><?= $lsp['lsp_mota'] ?></td>
                <td>
                    <!-- gửi bằng đường GET -->
                    <a href="edit.php?lsp_ma=<?= $lsp['lsp_ma'] ?>">Modify</a>
                    <a href="delete.php?lsp_ma=<?= $lsp['lsp_ma'] ?>">Delete</a>
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
    include_once __DIR__ . '/../layouts/partials/footer.php';
    ?>
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../layouts/partials/script.php';
    ?>
</body>

</html>