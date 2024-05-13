<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form nhập thông tin xét tuyển đại học</h1>
    <?php
    $arrDaySo = ['Cường', 'Hoa', 'Lan', 'Tùng', 'Khánh'];

    foreach($arrDaySo as $nv) {
        echo 'Giá trị: ' . $nv . '<br />';
    }


    foreach($arrDaySo as $index => $nv) {
        echo ($index + 1) . '--- tên là: ' . $nv . '<br />';
    }

    ?>
</body>
</html>