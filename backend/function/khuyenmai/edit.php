<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHUYẾN MÃI</title>
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
                <h1>Sửa Khuyến mãi</h1>
                <?php
                include_once __DIR__ . '/../../../dbconnect.php';
                $km_ma = $_GET['km_ma'];
                $sql_select_data_old = "select * from khuyenmai where km_ma = $km_ma";
                $sql_data_old = mysqli_query($conn, $sql_select_data_old);
                $data_array = [];
                $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên: <input type="text" name="km_ten" value="<?= $data_array['km_ten'] ?>" class="form-control" /><br />
                    Mô tả: <input type="text" name="km_noidung" value="<?= $data_array['km_noidung'] ?>" class="form-control" /><br />
                    Từ ngày: <input type="text" name="km_tungay" value="<?= $data_array['km_tungay'] ?>" class="form-control" /><br />
                    Đến ngày: <input type="text" name="km_denngay" value="<?= $data_array['km_denngay'] ?>" class="form-control" /><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    // 1. Mở kết nối
                    include_once __DIR__ . '/../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $km_ma = $_GET['km_ma'];
                    $km_ten = $_POST['km_ten'];
                    $km_noidung = $_POST['km_noidung'];
                    $km_tungay = $_POST['km_tungay'];
                    $km_denngay = $_POST['km_denngay'];
                    $sql = "UPDATE khuyenmai SET km_ten = '$km_ten', km_noidung = '$km_noidung', km_tungay = '$km_tungay', km_denngay = '$km_denngay' WHERE km_ma = $km_ma;";
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