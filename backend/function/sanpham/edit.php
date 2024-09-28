<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM - chưa xong câu update</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
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
                <h1>Sửa sản phẩm</h1>
                <?php
                $sp_ma = $_GET['sp_ma'];
                $sql_sp_edit =
                    "SELECT 
                        A.sp_ma, A.sp_ten,
                        B.lsp_ma, 
                        B.lsp_ten,
                        C.th_ma,
                        C.th_ten,
                        A.sp_gia, 
                        A.sp_giacu, 
                        A.sp_mota_ngan, 
                        A.sp_mota_chitiet, 
                        A.sp_soluong,
                        D.npp_ma,
                        D.npp_ten,
                        E.km_ten,
                        E.km_noidung,
                        E.km_tungay,
                        E.km_denngay,
                        E.km_noidung
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
                $sql_sp_edit = mysqli_query($conn, $sql_sp_edit);
                $data_array_sp_edit = [];
                $data_array_sp_edit = mysqli_fetch_array($sql_sp_edit, MYSQLI_ASSOC);
                ?>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm:</label>
                                <input type="text" name="sp_ten" value="<?= $data_array_sp_edit['sp_ten'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại sản phẩm:</label>
                                <select name="lsp_ma" id="lsp_ma" class="form-select">
                                    <option value="<?= $data_array_sp_edit['lsp_ma'] ?>"><?= $data_array_sp_edit['lsp_ten'] ?></option>
                                    <?php foreach ($arrDs_Lsp as $lsp): ?>
                                        <!-- loại bỏ dòng loại sản phẩm cũ -->
                                        <?php if ($lsp['lsp_ma'] != $data_array_sp_edit['lsp_ma']) : ?>
                                            <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <?php var_dump($data_array_sp_edit['km_ten']) ?> -->
                            <div class="mb-3">
                                <label class="form-label">Khuyến mãi: <?= $data_array_sp_edit['km_ten'] ?></label>
                                <?php
                                if ($data_array_sp_edit['km_ten'] != "") { ?>
                                    <input type="text" name="km_ma" value="<?= $data_array_sp_edit['km_ten'] ?>" class="form-control" />
                                <?php
                                } else {
                                ?>
                                    <select name="km_ma" id="km_ma" class="form-select">
                                        <option value="">Khuyến mãi cũ (nếu có)</option>
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
                                <input type="text" name="sp_giacu" value="<?= $data_array_sp_edit['sp_giacu'] ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Số lượng sản phẩm:</label>
                                <input type="text" name="sp_soluong" value="<?= $data_array_sp_edit['sp_soluong'] ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhà phân phối:</label>
                                <select name="npp_ma" id="npp_ma" class="form-select">
                                <option value="<?= $data_array_sp_edit['npp_ma'] ?>"><?= $data_array_sp_edit['npp_ten'] ?></option>
                                <?php foreach ($arrDs_Npp as $npp): ?>
                                    <?php if($data_array_sp_edit['npp_ma'] != $npp['npp_ma']): ?>
                                        <option value="<?= $npp['npp_ma'] ?>"><?= $npp['npp_ten'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <select name="th_ma" id="th_ma" class="form-select">
                                <option value="<?= $data_array_sp_edit['th_ma'] ?>"><?= $data_array_sp_edit['th_ten'] ?></option>
                                <?php foreach ($arrDs_th as $th): ?>
                                    <?php if($data_array_sp_edit['th_ma'] != $th['th_ma']): ?>
                                        <option value="<?= $th['th_ma'] ?>"><?= $th['th_ten'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá mới:</label>
                                <input type="text" name="sp_gia" value="<?= $data_array_sp_edit['sp_gia'] ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Mô tả ngắn:</label>
                                <input type="text" name="sp_mota_ngan" value="<?= $data_array_sp_edit['sp_mota_ngan'] ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả chi tiết:</label>
                            <textarea type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" rows="5" class="form-control"><?= $data_array_sp_edit['sp_mota_chitiet'] ?></textarea>
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $sp_ten = $_POST['sp_ten'];
                    $lsp_ma = $_POST['lsp_ma'];
                    $km_ma = empty($_POST['km_ma']) ? 'NULL' : $_POST['km_ma']; // nếu Km ko chọn thì để null 
                    $sp_mota_ngan = $_POST['sp_mota_ngan'];
                    $sp_mota_chitiet = $_POST['sp_mota_chitiet'];

                    $sp_soluong = $_POST['sp_soluong'];
                    $npp_ma = $_POST['npp_ma'];
                    $th_ma = $_POST['th_ma'];
                    $sp_gia = $_POST['sp_gia'];
                    $sp_giacu = empty($_POST['sp_giacu']) ? 'NULL' : $_POST['sp_giacu'];
                    $sp_ngaycapnhat = date('Y-m-d H:i:s'); // đưa vào dữ liệu thô trong Database
                    $sql =
                        "UPDATE sanpham
                        SET
                            sp_ten='$sp_ten',
                            sp_gia=$sp_gia,
                            sp_giacu=$sp_giacu,
                            sp_mota_ngan='$sp_mota_ngan',
                            sp_mota_chitiet='$sp_mota_chitiet',
                            sp_ngaycapnhat='$sp_ngaycapnhat',
                            sp_soluong=$sp_soluong,
                            lsp_ma=$lsp_ma,
                            km_ma=$km_ma,
                            th_ma=$th_ma,
                            npp_ma=$npp_ma
                        WHERE sp_ma= $sp_ma;";
                    if ($sp_ten != "" && $sp_gia  != "" && $sp_mota_ngan != "" && $sp_mota_chitiet != "" && $sp_ngaycapnhat != "" && $sp_soluong != "" && $lsp_ma != "" && $km_ma != "" && $th_ma != "" && $npp_ma != "") {
                        // 3. Thực thi câu lệnh
                        mysqli_query($conn, $sql);
                        echo '<script> location.href="index.php"</script>';
                        //var_dump($sql);
                        //var_dump($sql);
                    } else {
                        echo '<script>alert("Dữ liệu không được rỗng!");</script>';
                        //var_dump($sql);
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