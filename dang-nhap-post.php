<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h1>Đăng nhập POST</h1>
    <form name="frmDangNhap" method="post" 
    action="xu-ly-dang-nhap-post.php">
        <label>Tài khoản</label>
        <input type="text" name="txtTaiKhoan"
            id="txtTaiKhoan" /><br />
        
        <label>Mật khẩu</label>
        <input type="password" name="txtMatKhau"
            id="txtMatKhau" /><br />

        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>