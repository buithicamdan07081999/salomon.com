<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Danh sách loại sản phẩm</h1><br/><a href="../index.php">Trang chủ</a>
    <?php
    // 1. Tạo kết nối
    include_once __DIR__ . '/../dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT *
            FROM loaisanpham;";

    // 3. Yêu cầu PHP thực thi query
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách dữ liệu
    $arrDanhSachLSP = [];
    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDanhSachLSP[] = array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
        );
    }
    //var_dump($arrDanhSachLSP);
    ?>

    <a href="create.php">Thêm mới</a>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Mã LSP</th>
            <th>Tên LSP</th>
            <th>Mô tả LSP</th>
            <th>EDIT</th>
        </tr>
        <?php $stt=1 ?>
        <?php foreach ($arrDanhSachLSP as $lsp) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $lsp['lsp_ma'] ?></td>
                <td><?= $lsp['lsp_ten'] ?></td>
                <td><?= $lsp['lsp_mota'] ?></td>
                <td>
                    <a href="edit.php?lsp_ma=<?= $lsp['lsp_ma'] ?>">Modify</a>
                    <a href="delete.php?lsp_ma=<?= $lsp['lsp_ma'] ?>">Delete</a>
                </td>                
            </tr>
        <?php 
        $stt++;
        endforeach; 
        ?>
    </table>
</body>

</html>