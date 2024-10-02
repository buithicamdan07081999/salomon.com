<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH ẢNH SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    include_once __DIR__ . '/../../../handle/select.php';
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
                include_once __DIR__ . '/../../layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Sửa Hình ảnh sản phẩm</h1>
                <?php
                $hsp_ma = $_GET['hsp_ma'];
                $sql_hsp = "SELECT 
                                A.hsp_ma,
                                A.hsp_tentaptin,
                                A.sp_ma,
                                B.sp_ten,
                                B.sp_gia
                            FROM hinhsanpham A
                            LEFT JOIN sanpham B
                            ON A.sp_ma = B.sp_ma
                            WHERE A.hsp_ma = $hsp_ma";
                $data_hsp = mysqli_query($conn, $sql_hsp);
                $arrDs_hsp_edit = [];
                $arrDs_hsp_edit = mysqli_fetch_array($data_hsp, MYSQLI_ASSOC);
                ?>

                <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">Tên sản phẩm:</label>
                        <select name="sp_ma" id="sp_ma" class="form-select">
                            <option value="<?= $arrDs_hsp_edit['sp_ma'] ?>"><?= $arrDs_hsp_edit['sp_ten'] ?></option>
                            <?php foreach ($arrDs_sp as $sp): ?>
                                <?php if ($arrDs_hsp_edit['sp_ma'] != $sp['sp_ma']) : ?>
                                    <option value="<?= $sp['sp_ma'] ?>">
                                        <?= $sp['sp_ten'] ?> -
                                        (<?= number_format($sp['sp_gia'], 0, '.', ',') ?> VNĐ)
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Hình sản phẩm:</label>
                        <img src="/salomon.com/uploads/<?= $arrDs_hsp_edit['hsp_tentaptin'] ?>" alt="" class="hinh-sanpham">
                        <input type="file" name="hsp_tentaptin" id="hsp_tentaptin">
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách<i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu<i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    $sp_ma = $_POST['sp_ma'];
                    if (isset($_FILES['hsp_tentaptin']) && $arrDs_hsp_edit['hsp_tentaptin'] == '') {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $upload_dir = __DIR__ . '/../../../uploads/';
                        if ($_FILES['hsp_tentaptin']['error'] > 0) {
                            echo 'File upload bị lỗi';
                            die;
                        } else {
                            $hsp_tentaptin = date('Ymd_His') . '_' . $_FILES['hsp_tentaptin']['name'];
                            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $hsp_tentaptin);
                        }
                    } else {
                        $hsp_tentaptin = $arrDs_hsp_edit['hsp_tentaptin'];
                    }
                    $sql_update_hinhsanpham = "	UPDATE hinhsanpham
                                                SET                
                                                    hsp_tentaptin='$hsp_tentaptin',
                                                    sp_ma= $sp_ma
                                                WHERE hsp_ma = $hsp_ma";
                    //mysqli_query($conn, $sql_update_hinhsanpham);
                    var_dump($sql_update_hinhsanpham);
                    //echo '<script>location.href="index.php"</script>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>