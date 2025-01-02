<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHÁCH HÀNG</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../../layouts/header.php'
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>Sửa Thông tin khách hàng</h1>
                <?php
                $kh_ma = $_GET['kh_ma'];
                $sql_kh_edit =
                    "SELECT 
                        A.kh_ma, 
                        A.kh_tendangnhap, 
                        A.kh_ten, 
                        A.kh_gioitinh, 
                        A.kh_diachi, 
                        A.kh_dienthoai, 
                        A.kh_email, 
                        A.kh_ngaysinh, 
                        A.kh_cmnd, 
                        A.kh_makichhoat, 
                        A.kh_trangthai, 
                        A.kh_quantri
                    FROM thongtinkhachhang A
                    WHERE kh_ma = '$kh_ma'";
                $data_kh_edit = mysqli_query($conn, $sql_kh_edit);
                $arrDs_kh_edit = [];
                $kh_row = mysqli_fetch_array($data_kh_edit, MYSQLI_ASSOC);

                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên đăng nhập: <input type="text" name="kh_tendangnhap" value="<?= $kh_row['kh_tendangnhap'] ?>" class="form-control" /><br />
                    Mật khẩu: <input type="password" name="kh_matkhau" class="form-control" /><br />
                    Tên: <input type="text" name="kh_ten" value="<?= $kh_row['kh_ten'] ?>" class="form-control" /><br />
                    Giới tính:
                    <select name="kh_gioitinh" class="form-control">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select><br />
                    Ngày sinh: <input type="date" name="kh_ngaysinh" value="<?= $kh_row['kh_ngaysinh'] ?>" class="form-control" /><br />
                    Địa chỉ: <input type="text" name="kh_diachi" value="<?= $kh_row['kh_diachi'] ?>" class="form-control" /><br />
                    SĐT: <input type="number" name="kh_dienthoai" value="<?= $kh_row['kh_dienthoai'] ?>" class="form-control" /><br />
                    Email: <input type="text" name="kh_email" value="<?= $kh_row['kh_email'] ?>" class="form-control" /><br />

                    CCCD: <input type="number" name="kh_cmnd" value="<?= $kh_row['kh_cmnd'] ?>" class="form-control" /><br />
                    MKH: <input type="text" name="kh_makichhoat" value="<?= $kh_row['kh_makichhoat'] ?>" class="form-control" /><br />
                    Status:
                    <select name="kh_trangthai" class="form-control">sgd
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
                    if ($kh_cmnd != "" && $kh_makichhoat != "" && $kh_trangthai != "" && $kh_quantri != "" && $kh_tendangnhap != "" && $kh_ten != "" && $kh_gioitinh != "" && $kh_ngaysinh != "" && $kh_diachi != "" && $kh_dienthoai != "" && $kh_email != "") {
                        $sql =
                            "   UPDATE thongtinkhachhang
                            SET
                                kh_tendangnhap='$kh_tendangnhap',
                                kh_matkhau='$kh_matkhau',
                                kh_ten='$kh_ten',
                                kh_gioitinh=$kh_gioitinh,
                                kh_diachi='$kh_diachi',
                                kh_dienthoai='$kh_dienthoai',
                                kh_email='$kh_email',
                                kh_ngaysinh='$kh_ngaysinh',
                                kh_cmnd='$kh_cmnd',
                                kh_makichhoat='$kh_makichhoat',
                                kh_trangthai=$kh_trangthai,
                                kh_quantri=$kh_quantri
                            WHERE kh_ma= '$kh_ma'
                        ";
                    }
                    // 3. Thực thi câu lệnh
                    mysqli_query($conn, $sql);
                    echo '<script> location.href="index.php"</script>';
                    //var_dump($sql);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
</body>

</html>