<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sửa khuyến mãi</h1>
    <?php
    include_once __DIR__ . '/../../../dbconnect.php';
    $km_ma = $_GET['km_ma'];
    $sql_select_data_old = "select * from khuyenmai where km_ma = $km_ma";
    $sql_data_old = mysqli_query($conn, $sql_select_data_old);
    $data_array = [];
    $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
    ?>
    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
    Tên khuyến mãi: <input type="text" name="km_ten" value="<?= $data_array['km_ten'] ?>" /><br />
    Mô tả khuyến mãi: <input type="text" name="km_noidung" value="<?= $data_array['km_noidung'] ?>" /><br />
    Tên khuyến mãi: <input type="text" name="km_tungay" value="<?= $data_array['km_tungay'] ?>" /><br />
    Mô tả khuyến mãi: <input type="text" name="km_denngay" value="<?= $data_array['km_denngay'] ?>" /><br />
        <a href="index.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
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
</body>

</html>