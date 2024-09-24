<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
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
                <h1>Sửa sản phẩm</h1>
                <?php
                include_once __DIR__ . '/../../../dbconnect.php';
                $sp_ma = $_GET['sp_ma'];
                $sql_select_data_old = "SELECT 
					 A.sp_ma, A.sp_ten,
					 B.lsp_ten, 
					 C.th_ten,
					 A.sp_gia, A.sp_mota_ngan, A.sp_mota_chitiet, A.sp_soluong,
					 D.npp_ten,
					 E.km_ten,
                     A.sp_giacu
                FROM sanpham A
                LEFT JOIN loaisanpham B   
                ON A.lsp_ma = B.lsp_ma
                LEFT JOIN thuonghieu C
                ON A.th_ma = C.th_ma
                LEFT JOIN nhaphanphoi D
                ON A.npp_ma = D.npp_ma                
					 LEFT JOIN khuyenmai E
                ON A.km_ma = E.km_ma
                WHERE sp_ma = $sp_ma";
                $sql_data_old = mysqli_query($conn, $sql_select_data_old);
                $data_array = [];
                $data_array = mysqli_fetch_array($sql_data_old, MYSQLI_ASSOC);
                $km_ten = $data_array['km_ten'];
                // var_dump($sp_mota_chitiet);
                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm:</label>
                                <input type="text" name="sp_ten" value="<?= $data_array['sp_ten'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại sản phẩm:</label>
                                <input type="text" name="lsp_ten" value="<?= $data_array['lsp_ten'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Khuyến mãi:</label>
                                <?php
                                if ($km_ten != "") { ?>
                                    <input type="text" name="km_ten" value="<?= $data_array['km_ten'] ?>" class="form-control" />
                                <?php
                                } else {
                                ?>
                                    <select name="km_ma" id="km_ma" class="form-select">
                                        <option value="">Chọn hình thức khuyến mãi</option>
                                        <!-- option: Lý do là có thể chọn khuyến mãi hoặc không -->
                                        <?php foreach ($arrDs_km as $km): ?>
                                            <option value="<?= $km['km_ma'] ?>">
                                                <?= $km['km_ten'] ?>
                                                |
                                                <?= $km['km_noidung'] ?>
                                                ( <?= date('d/m/Y', strtotime($km['km_tungay'])) ?> - <?= date('d/m/Y', strtotime($km['km_denngay'])) ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá cũ:</label>
                                <input type="text" name="sp_giacu" value="<?= $data_array['sp_giacu'] ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Số lượng sản phẩm:</label>
                                <input type="text" name="sp_soluong" value="<?= $data_array['sp_soluong'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhà phân phối:</label>
                                <input type="text" name="npp_ten" value="<?= $data_array['npp_ten'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <input type="text" name="th_ten" value="<?= $data_array['th_ten'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá mới:</label>
                                <input type="text" name="sp_gia" value="<?= $data_array['sp_gia'] ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Mô tả ngắn:</label>
                                <input type="text" name="sp_mota_ngan" value="<?= $data_array['sp_mota_ngan'] ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả chi tiết:</label>
                            <textarea type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" rows="5" class="form-control"><?= $data_array['sp_mota_chitiet'] ?></textarea>
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    // 1. Mở kết nối
                    include_once __DIR__ . '/../../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $sp_ten = $_POST['sp_ten'];
                    $sp_gia = $_POST['sp_gia'];
                    $sp_giacu = $_POST['sp_giacu'];
                    $sp_mota_ngan = $_POST['sp_mota_ngan'];
                    $sp_mota_chitiet = $_POST['sp_mota_chitiet'];
                    $sp_ngaycapnhat = date('Y-m-d H:i:s');
                    $sp_soluong = $_POST['sp_soluong'];
                    $lsp_ma = $_POST['lsp_ma'];
                    $km_ma = $_POST['km_ma'];
                    $th_ma = $_POST['th_ma'];
                    $npp_ma = $_POST['npp_ma'];
                    if ($sp_ten != "" && $sp_gia != "" && $sp_mota_ngan != "" && $sp_mota_chitiet != "" && $sp_soluong != "" && $lsp_ma != "" && $km_ma != "" && $th_ma != "" && $npp_ma != "") {
                        $sql =
                            "UPDATE sanpham
                                SET
                                    sp_ten='$sp_ten',
                                    sp_gia=$sp_gia,
                                    sp_giacu=$sp_giacu,
                                    sp_mota_ngan='$sp_mota_ngan',
                                    sp_mota_chitiet='$sp_mota_chitiet',
                                    sp_ngaycapnhat=NOW(),
                                    sp_soluong=0,
                                    lsp_ma=0,
                                    km_ma=0,
                                    th_ma=0,
                                    npp_ma=0
                                WHERE sp_ma= $sp_ma;";
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
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>