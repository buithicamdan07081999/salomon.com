<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../layouts/partials/header.php'
    ?>
    <?php
    $hsp_ma = $_GET['hsp_ma'];
    $sql_hsp_mod =
        "SELECT 
            A.hsp_tentaptin 
        FROM hinhsanpham A 
        WHERE hsp_ma = $hsp_ma";
    $data_hsp_mod = mysqli_query($conn, $sql_hsp_mod);
    $array_hsp_mod = mysqli_fetch_array($data_hsp_mod, MYSQLI_ASSOC);

    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Sửa Hình sản phẩm</h1>
                <!-- enctype="multipart/form-data" trong form để upload file -->
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">Tên sản phẩm:</label>
                        <select name="sp_ma" id="sp_ma" class="form-select">
                            <?php foreach ($arrDs_sp as $sp): ?>
                                <?php if ($sp['sp_ma'] == $array_hsp_mod['sp_ma']): ?>
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
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Hình sản phẩm:</label>
                        <div>
                            <img class="hinh-daidien" src="/salomon.com/uploads/<?= $array_hsp_mod['hsp_tentaptin'] ?>" alt="">
                        </div>
                        <input type="file" name="hsp_tentaptin" id="hsp_tentaptin">
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách<i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu<i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php

                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý 
                if (isset($_POST['btnLuu'])) {
                    //Lay ten hinh cu
                    $hsp_tentaptin = $array_hsp_mod['hsp_tentaptin'];
                    if (
                        isset($_FILES['hsp_tentaptin'])
                        && !empty($_FILE['hsp_tentaptin']['name'])
                    ) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $upload_dir = __DIR__ . '/../../../uploads/';
                        //Đối với file có các thuộc tính sau
                        // $_FILE['hsp_tentaptin']['name'] : 
                        // $_FILE['hsp_tentaptin']['type'] : Kiểu của file
                        // $_FILE['hsp_tentaptin']['tmp_name'] : Đường dẫn đến file
                        // $_FILE['hsp_tentaptin']['error'] : Trạng thái
                        // $_FILE['hsp_tentaptin']['size'] : 
                        if ($_FILES['hsp_tentaptin']['error'] > 0) {
                            echo 'File upload bị lỗi';
                            die;
                        } else {
                            //Xóa file hiện tại để tránh rác
                            $upload_dir2 = realpath(__DIR__ . '/../../../uploads') . DIRECTORY_SEPARATOR; // fix lỗi đường dẫn "$upload_dir = __DIR__ . '/../../../uploads' " ko đúng
                            $file_path_delete = $upload_dir2 . $array_hsp_del['hsp_tentaptin'];
                            //var_dump($file_path_delete);

                            if (file_exists($file_path_delete)) {
                                unlink(($file_path_delete));
                            }

                            // **** Di chuyển file
                            // File đã up lên server với tên tạm gì đó XAMPP tự sinh
                            $hsp_tentaptin = date('Ymd_His') . '_' . $_FILES['hsp_tentaptin']['name'];
                            // Di chuyển file vào thư mục mong đợi
                            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $hsp_tentaptin);
                            // Lưu thông tin vào Database

                        }
                    }
                    $sp_ma = $_POST['sp_ma'];
                    $sql_Insert_hinhsanpham = " UPDATE hinhsanpham
                                                SET
                                                    hsp_tentaptin=' $hsp_tentaptin,
                                                    sp_ma=$sp_ma
                                                WHERE hsp_ma=$hsp_ma";
                    mysqli_query($conn, $sql_Insert_hinhsanpham);
                    //var_dump($sql_Insert_hinhsanpham);
                    echo '<script>location.href="index.php"</script>';
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