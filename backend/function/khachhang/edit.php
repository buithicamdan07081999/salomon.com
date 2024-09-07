<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
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
                <h1>Sửa Thông tin khách hàng</h1>
                <?php
                include_once __DIR__ . '/../../../dbconnect.php';
                $kh_tendangnhap = $_GET['kh_tendangnhap'];
                $sql_select_data_old =
                    "SELECT kh_tendangnhap,
                    kh_ten, 
                    kh_gioitinh, 
                    kh_diachi, 
                    kh_dienthoai, 
                    kh_email, 
                    kh_ngaysinh, 
                    kh_makichhoat, 
                    kh_trangthai
                FROM khachhang
                WHERE kh_tendangnhap = '$kh_tendangnhap'";
                //var_dump($kh_tendangnhap, $sql_select_data_old);
                $sql_data_old = mysqli_query($conn, $sql_select_data_old);
                $data_array = [];
                $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
                //var_dump($sql_select_data_old);
                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên đăng nhập: <input type="text" name="kh_tendangnhap" class="form-control"  value="<?= $data_array['kh_tendangnhap'] ?>"/><br />
                    Mật khẩu: <input type="text" name="kh_matkhau" class="form-control"  value="<?= $data_array['kh_matkhau'] ?>"/><br />
                    Tên: <input type="text" name="kh_ten" class="form-control"  value="<?= $data_array['kh_ten'] ?>"/><br />
                    Giới tính: <input type="text" name="kh_gioitinh" class="form-control"  value="<?= $data_array['kh_gioitinh'] ?>"/><br />
                    Ngày sinh: <input type="text" name="kh_ngaysinh" class="form-control"  value="<?= $data_array['kh_ngaysinh'] ?>"/><br />
                    Địa chỉ: <input type="text" name="kh_diachi" class="form-control"  value="<?= $data_array['kh_diachi'] ?>"/><br />
                    SĐT: <input type="text" name="kh_dienthoai" class="form-control"  value="<?= $data_array['kh_dienthoai'] ?>"/><br />
                    Email: <input type="text" name="kh_email" class="form-control"  value="<?= $data_array['kh_email'] ?>"/><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    // 1. Mở kết nối
                    include_once __DIR__ . '/../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $kh_tendangnhap = $_POST['kh_tendangnhap'];
                    $kh_matkhau = $_POST['kh_matkhau'];
                    $kh_ten = $_POST['kh_ten'];
                    $kh_gioitinh = $_POST['kh_gioitinh'];
                    $kh_ngaysinh = $_POST['kh_ngaysinh'];
                    $kh_diachi = $_POST['kh_diachi'];
                    $kh_dienthoai = $_POST['kh_dienthoai'];
                    $kh_email = $_POST['kh_email'];
                    $sql = "UPDATE khachhang SET kh_tendangnhap = '$kh_tendangnhap', kh_matkhau = '$kh_matkhau', kh_ten = '$kh_ten', kh_gioitinh = '$kh_gioitinh', kh_ngaysinh = '$kh_ngaysinh', kh_diachi = '$kh_diachi', kh_dienthoai = '$kh_dienthoai', kh_email = '$kh_email' WHERE kh_tendangnhap = '$kh_tendangnhap';";
                    // 3. Thực thi câu lệnh
                    mysqli_query($conn, $sql);
                    echo '<script> location.href="index.php"</script>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>