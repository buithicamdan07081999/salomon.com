<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
</head>

<body>
    <h1>Sửa sản phẩm</h1>
    <?php
    include_once __DIR__ . '/../../dbconnect.php';
    $sp_ma = $_GET['sp_ma'];
    $sql_select_data_old = "select * from sanpham where sp_ma = $sp_ma";
    $sql_data_old = mysqli_query($conn, $sql_select_data_old);
    $data_array = [];
    $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
    ?>

    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Tên sản phẩm: <input type="text" name="sp_ten" value="<?= $data_array['sp_ten'] ?>" /><br />
        Mô tả sản phẩm: <input type="text" name="sp_mota" value="<?= $data_array['sp_mota'] ?>" /><br />
        <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
        <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu  <i class="fa-regular fa-floppy-disk"></i></button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $sp_ma = $_GET['sp_ma'];
        $sp_ten = $_POST['sp_ten'];
        $sp_mota = $_POST['sp_mota'];

        $sql = "UPDATE sanpham SET sp_ten = '$sp_ten', sp_mota = '$sp_mota' WHERE sp_ma = $sp_ma;";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
        echo '<script> location.href="index.php"</script>';
    }
    ?>
</body>

</html>