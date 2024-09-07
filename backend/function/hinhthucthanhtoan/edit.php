<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH THỨC THANH TOÁN</title>
    <?php
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
                include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Sửa Hình thức thanh toán</h1>
                <?php
                include_once __DIR__ . '/../../../dbconnect.php';
                $httt_ma = $_GET['httt_ma'];
                $sql_select_data_old = "select * from hinhthucthanhtoan where httt_ma = $httt_ma";
                $sql_data_old = mysqli_query($conn, $sql_select_data_old);
                $data_array = [];
                $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
                ?>

                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên: <input type="text" name="httt_ten" value="<?= $data_array['httt_ten'] ?>" class="form-control" /><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu  <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    // 1. Mở kết nối
                    include_once __DIR__ . '/../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $httt_ma = $_GET['httt_ma'];
                    $httt_ten = $_POST['httt_ten'];

                    $sql = "UPDATE hinhthucthanhtoan SET httt_ten = '$httt_ten' WHERE httt_ma = $httt_ma;";
                    // 3. Thực thi câu lệnh
                    mysqli_query($conn, $sql);
                    echo '<script> location.href="index.php"</script>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>