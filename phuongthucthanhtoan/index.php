<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Phương thức thanh toán</h1>
    <?php
    // 1. Tạo kết nối
    include_once __DIR__ . '/../dbconnect.php';

    // 2. Chuẩn bị câu lệnh SQL Query
    $sql = "SELECT *
            FROM hinhthucthanhtoan;";

    // 3. Yêu cầu PHP thực thi query
    $data = mysqli_query($conn, $sql);

    // 4. Phân tách dữ liệu
    $arrDanhSachhttt = [];
    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDanhSachhttt[] = array(
            'httt_ma' => $row['httt_ma'],
            'httt_ten' => $row['httt_ten'],
        );
    }
    //var_dump($arrDanhSachhttt);
    ?>

    <a href="create.php">Thêm mới</a>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Mã httt</th>
            <th>Tên httt</th>
            <th>EDIT</th>
        </tr>
        <?php $stt=1 ?>
        <?php foreach ($arrDanhSachhttt as $httt) : ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $httt['httt_ma'] ?></td>
                <td><?= $httt['httt_ten'] ?></td>
                <td>
                    <a href="edit.php?httt_ma=<?= $httt['httt_ma'] ?>">Modify</a>
                    <a href="delete.php?httt_ma=<?= $httt['httt_ma'] ?>">Delete</a>
                </td>                
            </tr>
        <?php 
        $stt++;
        endforeach; 
        ?>
    </table>
</body>

</html>