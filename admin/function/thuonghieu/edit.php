<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THƯƠNG HIỆU</title>
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
                <h1>Sửa Thương hiệu</h1>
                <?php
                $th_ma = $_GET['th_ma'];
                $sql_select_data_old = "select * from thuonghieu where th_ma = $th_ma";
                $sql_data_old = mysqli_query($conn, $sql_select_data_old);
                $data_array = [];
                $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên: <input type="text" name="th_ten" value="<?= $data_array['th_ten'] ?>" class="form-control" /><br />
                    Mô tả: <input type="text" name="th_mota" value="<?= $data_array['th_mota'] ?>" class="form-control" /><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    $th_ma = $_GET['th_ma'];
                    $th_ten = $_POST['th_ten'];
                    $th_mota = $_POST['th_mota'];

                    $sql = "UPDATE thuonghieu SET th_ten = '$th_ten', th_mota = '$th_mota' WHERE th_ma = $th_ma;";
                    mysqli_query($conn, $sql);
                    echo '<script> location.href="index.php"</script>';
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