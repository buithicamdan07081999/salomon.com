<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khuyến mãi</title>
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
            <h1>Thêm mới khuyến mãi</h1>
            <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                Tên khuyến mãi: <input type="text" name="km_ten" class="form-control" /><br />
                Mô tả khuyến mãi: <input type="text" name="km_noidung" class="form-control" /><br />
                Ngày bắt đầu khuyến mãi: <input type="text" name="km_tungay" class="form-control" /><br />
                Ngày kết thúc khuyến mãi: <input type="text" name="km_denngay" class="form-control" /><br />
                <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-regular fa-floppy-disk"></i></a>
                <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu </button>
            </form>
            <?php
            // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
            if (isset($_POST['btnLuu'])) {
                // 1. Mở kết nối
                include_once __DIR__ . '/../../../dbconnect.php';
                // 2. Chuẩn bị câu lệnh
                $km_ten = $_POST['km_ten'];
                $km_noidung = $_POST['km_noidung'];                
                $km_tungay = $_POST['km_tungay'];
                $km_denngay= $_POST['km_denngay'];
                if ($km_ten != "" && $km_noidung != "" && $km_tungay != "" && $km_denngay != "") {
                    $sql = "INSERT INTO khuyenmai(km_ten, km_noidung, km_tungay, km_denngay)
                VALUES ('$km_ten', '$km_noidung', '$km_tungay', '$km_denngay');";
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