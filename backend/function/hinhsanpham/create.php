<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH SẢN PHẨM</title>
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
    <!-- include_once __DIR__ . '/../../../handle/select.php'; để lấy lại dữ liệu cũ  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Thêm mới Hình sản phẩm</h1>
                <!-- enctype="multipart/form-data" trong form để upload file -->
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">Tên sản phẩm:</label>
                        <select name="sp_ma" id="sp_ma" class="form-select">
                            <?php foreach ($arrDs_sp as $sp): ?>
                                <option value="<?= $sp['sp_ma'] ?>">
                                    <?= $sp['sp_ten'] ?> -
                                    (<?= number_format($sp['sp_gia'], 0, '.', ',') ?> VNĐ)

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Hình sản phẩm:</label>
                        <input type="file" name="hsp_tentaptin" id="hsp_tentaptin">
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách<i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu<i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    if (isset($_FILES['hsp_tentaptin'])) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $upload_dir = __DIR__ . '/../../../uploads/';
                        if ($_FILES['hsp_tentaptin']['error'] > 0) {
                            echo 'File upload bị lỗi';
                            die;
                        } else {
                            // File đã up lên server với tên tạm gì đó XAMPP tự sinh
                            $hsp_tentaptin = date('Ymd_His') . '_' . $_FILES['hsp_tentaptin']['name'];
                            // 1. Di chuyển file vào thư mục mong đợi
                            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $hsp_tentaptin);
                            // 2. Lưu thông tin vào Database
                            $sp_ma = $_POST['sp_ma'];
                            // Chuẩn bị câu lệnh Insert
                            $sql_Insert_hinhsanpham = "INSERT INTO hinhsanpham
                                            (hsp_tentaptin, sp_ma)
                                            VALUES ('$hsp_tentaptin', $sp_ma)";
                            mysqli_query($conn, $sql_Insert_hinhsanpham);
                            //var_dump($sql_Insert_hinhsanpham);
                            echo '<script>location.href="index.php"</script>';
                        }
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