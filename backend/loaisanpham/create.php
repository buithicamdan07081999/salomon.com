<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <?php
    include_once __DIR__ . '/../layouts/partials/styles.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../layouts/partials/header.php'
    ?>

    <div class="row">
        <div class="col-3">
            <?php
            include_once __DIR__ . '/../../backend/layouts/partials/sidebar.php';
            ?>
        </div>
        <div class="col-9">
            <h1>Thêm mới Loại sản phẩm</h1>
            <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                Tên loại sản phẩm: <input type="text" name="lsp_ten" /><br />
                Mô tả loại sản phẩm: <input type="text" name="lsp_mota" /><br />
                <a href="../index.php">Quay về Danh sách</a>
                <button type="submit" name="btnLuu">Lưu dữ liệu</button>
            </form>
            <?php
            // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
            if (isset($_POST['btnLuu'])) {
                // 1. Mở kết nối
                include_once __DIR__ . '/../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh
                $lsp_ten = $_POST['lsp_ten'];
                $lsp_mota = $_POST['lsp_mota'];
                if ($lsp_ten != "" || $lsp_mota != "") {
                    $sql = "INSERT INTO loaisanpham(lsp_ten, lsp_mota)
                VALUES ('$lsp_ten', '$lsp_mota');";
                    // 3. Thực thi câu lệnh
                    mysqli_query($conn, $sql);
                    echo '<script> location.href="index.php"</script>';
                } else 
                {
                    echo '<script>alert("Dữ liệu không được rỗng!");</script>';
                }
            }
            ?>
        </div>

        <?php
        include_once __DIR__ . '/../../backend/layouts/partials/footer.php';
        ?>
        <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
        <?php
        include_once __DIR__ . '/../../backend/layouts/partials/script.php';
        ?>
</body>

</html>