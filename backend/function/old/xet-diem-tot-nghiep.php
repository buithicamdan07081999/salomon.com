<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xét kết quả tốt nghiệp</h1>
    <form name="frmXetKetQuaTotNghiep" method="post" 
        action="xu-ly-xet-ket-qua-tot-nghiep.php">
        Họ tên: <input type="text" name="txtHoTen" /><br />
        
        
        Giới tính: 
            <input type="radio" name="txtGioiTinh" id="txtGioiTinh_1" value="1" 
            checked />Nam
            <input type="radio" name="txtGioiTinh" id="txtGioiTinh_2" value="2" />Nữ
            
            <br />
        Điểm TB: <input type="number" name="nDiemTB" /><br />

        <button type="submit">Xét kết quả</button>
    </form>
</body>
</html>