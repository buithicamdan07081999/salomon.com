<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thương hiệu</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../layouts/partials/header.php'
    ?>

    <div class="row">
        <div class="col-3">
            <?php
            include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
            ?>
        </div>
        <div class="col-9">
            <h1>Thêm mới thương hiệu</h1>
            <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                Tên thương hiệu: <input type="text" name="th_ten"  class="form-control" /><br />
                Mô tả thương hiệu: <input type="text" name="th_mota"  class="form-control" /><br />
                <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-regular fa-floppy-disk"></i></a>
                <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu </button>
            </form>
            <?php
            // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
            if (isset($_POST['btnLuu'])) {
                // 1. Mở kết nối
                include_once __DIR__ . '/../../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh
                $th_ten = $_POST['th_ten'];
                $th_mota = $_POST['th_mota'];
                if ($th_ten != "" && $th_mota != "") {
                    $sql = "INSERT INTO thuonghieu(th_ten, th_mota)
                VALUES ('$th_ten', '$th_mota');";
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
        include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
        ?>
        <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
        <?php
        include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
        ?>
</body>

</html>