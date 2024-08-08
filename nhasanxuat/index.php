<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách loại sản phẩm</h1>
    <?php
    // 1. Tạo kết nối
    include_once __DIR__ . '/../dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT *
            FROM nhasanxuat;";

    // 3. Yêu cầu PHP thực thi query
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách dữ liệu
    $arrDanhSachLSP = [];
    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDanhSachLSP[] = array(
            'nsx_ma' => $row['nsx_ma'],
            'nsx_ten' => $row['nsx_ten'],
            'nsx_mota' => $row['nsx_mota'],
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
        <?php foreach ($arrDanhSachLSP as $nsx) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $nsx['nsx_ma'] ?></td>
                <td><?= $nsx['nsx_ten'] ?></td>
                <td><?= $nsx['nsx_mota'] ?></td>
                <td>
                    <a href="edit.php?nsx_ma=<?= $nsx['nsx_ma'] ?>">Modify</a>
                    <a href="delete.php?nsx_ma=<?= $nsx['nsx_ma'] ?>">Delete</a>
                </td>                
            </tr>
        <?php 
        $stt++;
        endforeach; 
        ?>
    </table>
</body>

</html>