<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THƯƠNG HIỆU</title>
</head>

<body>
    <h1>Sửa thương hiệu</h1>
    <?php
    include_once __DIR__ . '/../../../dbconnect.php';
    $th_ma = $_GET['th_ma'];
    $sql_select_data_old = "select * from thuonghieu where th_ma = $th_ma";
    $sql_data_old = mysqli_query($conn, $sql_select_data_old);
    $data_array = [];
    $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
    ?>

    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Tên thương hiệu: <input type="text" name="th_ten" value="<?= $data_array['th_ten'] ?>" /><br />
        Mô tả thương hiệu: <input type="text" name="th_mota" value="<?= $data_array['th_mota'] ?>" /><br />
        <a href="index.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $th_ma = $_GET['th_ma'];
        $th_ten = $_POST['th_ten'];
        $th_mota = $_POST['th_mota'];

        $sql = "UPDATE thuonghieu SET th_ten = '$th_ten', th_mota = '$th_mota' WHERE th_ma = $th_ma;";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
        echo '<script> location.href="index.php"</script>';

    }
    ?>
</body>

</html>