<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sửa Loại sản phẩm</h1>
    <?php
    include_once __DIR__ . '/../dbconnect.php';
    $lsp_ma = $_GET['lsp_ma'];
    $sql_select_data_old = "select * from loaisanpham where lsp_ma = $lsp_ma";
    $sql_data_old = mysqli_query($conn, $sql_select_data_old);
    $data_array = [];
    $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
    ?>

    <?php
    if (isset($_POST['btnLuu'])) {
        $lsp_ma = $_GET['lsp_ma'];
        $lsp_ten = $_GET['lsp_ten'];
        $lsp_mota = $_GET['lsp_mota'];
        $sql = "update loaisanpham set lsp_ten = $lsp_ten, lsp_mota = $lsp_mota where lsp_ma = $lsp_ma";
        mysqli_query($conn, $sql);
        echo'<script>location.href="create.php"</script>';
    }
    ?>


    <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
        Tên loại sản phẩm: <input type="text" name="lsp_ten" value="<?= $data_array['lsp_ten'] ?>" /><br />
        Mô tả loại sản phẩm: <input type="text" name="lsp_mota" value="<?= $data_array['lsp_mota'] ?>" /><br />

        <a href="../create.php">Quay về Danh sách</a>
        <button type="submit" name="btnLuu">Lưu dữ liệu</button>
    </form>
    <?php
    // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
    if (isset($_POST['btnLuu'])) {
        // 1. Mở kết nối
        include_once __DIR__ . '/../dbconnect.php';
        // 2. Chuẩn bị câu lệnh
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];

        $sql = "INSERT INTO loaisanpham(lsp_ten, lsp_mota)
                VALUES ('$lsp_ten', '$lsp_mota');";
        // 3. Thực thi câu lệnh
        mysqli_query($conn, $sql);
    }
    ?>
</body>

</html>