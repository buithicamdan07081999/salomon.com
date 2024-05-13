<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <?php
    // 1. Tạo kết nối
    include_once __DIR__ . '/../dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT *
            FROM sanpham;";

    // 3. Yêu cầu PHP thực thi query
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách dữ liệu
    $arrDanhSachsp = [];
    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDanhSachsp[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia']
        );
    }
    //var_dump($arrDanhSachsp);
    ?>

    <a href="create.php">Thêm mới</a>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Mã sp</th>
            <th>Tên sp</th>
            <th>Giá sp</th>
            <th>EDIT</th>
        </tr>
        <?php $stt=1 ?>
        <?php foreach ($arrDanhSachsp as $sp) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $sp['sp_ma'] ?></td>
                <td><?= $sp['sp_ten'] ?></td>
                <td><?= $sp['sp_mota'] ?></td>
                <td>
                    <a href="edit.php?sp_ma=<?= $sp['sp_ma'] ?>">Modify</a>
                    <a href="delete.php?sp_ma=<?= $sp['sp_ma'] ?>">Delete</a>
                </td>                
            </tr>
        <?php 
        $stt++;
        endforeach; 
        ?>
    </table>
</body>

</html>