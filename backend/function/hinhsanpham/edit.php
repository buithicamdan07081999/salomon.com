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
    <?php
    // Lấy lại dữ liệu cũ
    $hsp_ma = $_GET['hsp_ma'];
    $sql_hsp_mod =
        "SELECT 
            A.hsp_tentaptin, A.sp_ma
        FROM hinhsanpham A 
        WHERE hsp_ma = $hsp_ma";
    $data_hsp_mod = mysqli_query($conn, $sql_hsp_mod);
    $row_hsp_mod = mysqli_fetch_array($data_hsp_mod, MYSQLI_ASSOC);
    ?>
    <!-- Lấy lại dữ liệu cũ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Sửa Hình sản phẩm</h1>
                <!-- enctype="multipart/form-data" trong form để upload file -->
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">Tên sản phẩm:</label>
                        <!-- Danh sách tên sản phẩm -->
                        <select name="sp_ma" id="sp_ma" class="form-select">
                            <?php foreach ($arrDs_sp as $sp): ?>
                                <?php if ($sp['sp_ma'] == $row_hsp_mod['sp_ma']): ?>
                                    <!-- Tìm sản phẩm nào có mã bằng mã sp đang chỉnh sửa (chọn selected) -->
                                    <option value="<?= $sp['sp_ma'] ?>" selected>
                                        <?= $sp['sp_ten'] ?> -
                                        (<?= number_format($sp['sp_gia'], 0, '.', ',') ?> VNĐ)
                                    </option>
                                <?php else: ?>
                                    <option value="<?= $sp['sp_ma'] ?>">
                                        <?= $sp['sp_ten'] ?> -
                                        (<?= number_format($sp['sp_gia'], 0, '.', ',') ?> VNĐ)
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <!-- Danh sách tên sản phẩm -->
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Hình sản phẩm:</label>
                        <div>
                            <img class="hinh-daidien" src="/salomon.com/uploads/<?= $row_hsp_mod['hsp_tentaptin'] ?>" alt="hinhsanpham">
                            <!-- đường dẫn thư mục gốc / Tên row cần sửa nhờ PHP in dùm -->
                        </div>
                        <input type="file" name="hsp_tentaptin" id="hsp_tentaptin">
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách<i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu<i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php

                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý 
                // UPDATE hình
                // 1. Xóa file rác
                // 2. Cập nhật SQL
                // 3. Thêm 1 file mới 
                if (isset($_POST['btnLuu'])) {
                    // 1. Lay ten hinh cu / Lưu trữ lại tên hình cũ
                    $hsp_tentaptin = $row_hsp_mod['hsp_tentaptin'];
                    // if (isset($_FILES['hsp_tentaptin']) nếu người dùng chọn hình (tồn tại file tập tin) -> luôn tồn tại
                    // if !empty($_FILE['hsp_tentaptin']['name'] nếu người dùng chọn tên hình (đã chọn file) -> có chọn thì mới cập nhật tên hình
                    //var_dump(isset($_FILES['hsp_tentaptin']));die;
                    var_dump(!empty($_FILE['hsp_tentaptin']['name'])); //;die;
                    if (
                        isset($_FILES['hsp_tentaptin']) && !empty($_FILES['hsp_tentaptin']['name'])
                    ) {
                        // Thiết lập giờ Việt Nam
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // Chuẩn bị đường dẫn đến thư mục mong đợi
                        //$upload_dir2 = __DIR__ . '/../../../uploads/';
                        if ($_FILES['hsp_tentaptin']['error'] > 0) {
                            echo 'File upload bị lỗi';
                            die;
                        } else {
                            // Xóa file hiện tại để tránh rác
                            $upload_dir = realpath(__DIR__ . '/../../../uploads') . DIRECTORY_SEPARATOR; // fix lỗi đường dẫn "$upload_dir = __DIR__ . '/../../../uploads' " ko đúng
                            $file_path_delete = $upload_dir . $row_hsp_mod['hsp_tentaptin'];
                            //var_dump($file_path_delete); die;
                        }
                        if (file_exists($file_path_delete)) {
                            unlink(($file_path_delete));
                        }
                        // END - Xóa file hiện tại để tránh rác

                        //     // 1. Di chuyển file
                        //     // File đã up lên server với tên tạm gì đó XAMPP tự sinh
                        $hsp_tentaptin = date('Ymd_His') . '_' . $_FILES['hsp_tentaptin']['name'];
                        //     // Di chuyển file vào thư mục mong đợi
                        move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $hsp_tentaptin);
                        //     // Lưu thông tin vào Database
                        // }
                    }
                    // 2. Lưu thông tin vào Database / Thực hiện update dữ liệu
                    $sp_ma = $_POST['sp_ma'];
                    $sql_Update_hinhsanpham = " UPDATE hinhsanpham
                                                SET
                                                    hsp_tentaptin='$hsp_tentaptin',
                                                    sp_ma=$sp_ma
                                                WHERE hsp_ma=$hsp_ma";
                    mysqli_query($conn, $sql_Update_hinhsanpham);
                    echo '<script>location.href="index.php"</script>';
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