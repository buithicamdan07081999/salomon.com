<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    include_once __DIR__ . '/../../../handle/select.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../layouts/partials/header.php'
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../../backend/layouts/partials/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Thêm mới Khách hàng</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên đăng nhập: <input type="text" name="kh_tendangnhap" class="form-control" /><br />
                    Mật khẩu: <input type="text" name="kh_matkhau" class="form-control" /><br />
                    Tên: <input type="text" name="kh_ten" class="form-control" /><br />
                    Giới tính:
                    <select name="kh_gioitinh" class="form-control">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select><br />
                    Ngày sinh: <input type="date" name="kh_ngaysinh" class="form-control" /><br />
                    Địa chỉ: <input type="text" name="kh_diachi" class="form-control" /><br />
                    SĐT: <input type="number" name="kh_dienthoai" class="form-control" /><br />
                    Email: <input type="text" name="kh_email" class="form-control" /><br />

                    CCCD: <input type="number" name="kh_cmnd" class="form-control" /><br />
                    MKH: <input type="text" name="kh_makichhoat" class="form-control" /><br />
                    Status:
                    <select name="kh_trangthai" class="form-control">
                        <option value="1">Hội viên</option>
                        <option value="0">Khách vẵng lai</option>
                    </select><br />
                    Admin: 
                    <select name="kh_quantri" class="form-control">
                        <option value="1">Quản trị</option>
                        <option value="0">Người dùng</option>
                    </select><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách<i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu<i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý

                if (isset($_POST['btnLuu'])) {
                    $kh_tendangnhap = $_POST['kh_tendangnhap'];
                    $kh_matkhau = $_POST['kh_matkhau'];
                    $kh_ten = $_POST['kh_ten'];
                    $kh_gioitinh = $_POST['kh_gioitinh'];
                    $kh_ngaysinh = $_POST['kh_ngaysinh'];
                    $kh_diachi = $_POST['kh_diachi'];
                    $kh_dienthoai = $_POST['kh_dienthoai'];
                    $kh_email = $_POST['kh_email'];
                    $kh_cmnd = $_POST['kh_cmnd'];
                    $kh_makichhoat = $_POST['kh_makichhoat'];
                    $kh_trangthai = $_POST['kh_trangthai'];
                    $kh_quantri = $_POST['kh_quantri'];
                    if ($kh_cmnd != "" && $kh_makichhoat != "" && $kh_trangthai != "" && $kh_quantri != "" && $kh_tendangnhap != "" && $kh_matkhau != "" && $kh_ten != "" && $kh_gioitinh != "" && $kh_ngaysinh != "" && $kh_diachi != "" && $kh_dienthoai != "" && $kh_email != "") {
                        $sql = "INSERT INTO khachhang(kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri, kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_ngaysinh, kh_diachi, kh_dienthoai, kh_email)
                VALUES ('$kh_cmnd', '$kh_makichhoat', '$kh_trangthai', '$kh_quantri', '$kh_tendangnhap', '$kh_matkhau', '$kh_ten', '$kh_gioitinh', '$kh_ngaysinh', '$kh_diachi','$kh_dienthoai', '$kh_email');";
                        // 3. Thực thi câu lệnh
                        mysqli_query($conn, $sql);
                        echo '<script> location.href="index.php"</script>';
                        //var_dump($sql);
                    } else {
                        echo '<script>alert("Dữ liệu không được rỗng!");</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>