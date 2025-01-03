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
                <h1>Thêm mới Loại sản phẩm</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <!-- action "" là tự gửi đến trang hiện tại                     -->
                    <div class="mb-3">
                        <label class="form-label">Tên:</label>
                        <input type="text" name="lsp_ten" id="lsp_ten" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả:</label>
                        <input type="text" name="lsp_mota" id="lsp_mota" class="form-control">
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    // Lấy dữ liệu từ sự kiện POST
                    $lsp_ten = $_POST['lsp_ten'];
                    $lsp_mota = $_POST['lsp_mota'];
                    if ($lsp_ten != "" && $lsp_mota != "") {
                        $sql =
                            "   INSERT INTO loaisanpham(lsp_ten, lsp_mota)
                            VALUES ('$lsp_ten', '$lsp_mota');";
                        //Thực thi
                        mysqli_query($conn, $sql);
                        echo '<script> location.href="index.php"</script>';
                    } else {
                        echo '<script>alert("Dữ liệu không được rỗng!");</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
</body>

</html>