<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
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
    <?php
    // Lấy lại dữ liệu cũ
    $sp_ma = $_GET['sp_ma'];
    $sql_sp_mod =
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
                        E.km_ma,
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
    $data_sp_mod = mysqli_query($conn, $sql_sp_mod);
    $row_sp_mod = mysqli_fetch_array($data_sp_mod, MYSQLI_ASSOC);
    //var_dump($row_sp_mod);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h1>SỬA SẢN PHẨM</h1>
                <form name="frmEdit" id="frmEdit" method="post" action="">
                    <div class="row">
                        <div class="col-6">
                            <!-- Danh sách tên sản phẩm -->
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm:</label>
                                <input type="text" name="sp_ten" value="<?= $row_sp_mod['sp_ten'] ?>" class="form-control" />
                            </div>
                            <!-- Danh sách tên sản phẩm -->
                            <!-- Danh sách tên loại sản phẩm -->
                            <div class="mb-3">
                                <label class="form-label">Loại sản phẩm:</label>
                                <select name="lsp_ma" id="lsp_ma" class="form-select">
                                    <?php foreach ($arrDs_Lsp as $lsp): ?>
                                        <?php if ($lsp['lsp_ma'] == $row_sp_mod['lsp_ma']): ?>
                                            <option value="<?= $lsp['lsp_ma'] ?>" selected><?= $lsp['lsp_ten'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Danh sách tên loại sản phẩm -->
                            <!-- Danh sách tên Khuyến mãi -->
                            <div class="mb-3">
                                <div>
                                    <div style="float: left; width: 50%"><label class="form-label">Khuyến mãi:</label></div>
                                    <div style="float: left; text-align: right; width: 50%"><span style="text-align: right;">Kết thúc khuyến mãi <input type="checkbox" id="off_km" name="off_km" value="Tắt khuyến mãi"></span></div>
                                </div>
                                <select name="km_ma" id="km_ma" class="form-select">
                                    <!-- 1 thêm điều kiện Chưa chọn Khuyến mãi trước đó -->
                                    <?php if ($row_sp_mod['km_ma'] == NULL) : ?>
                                        <option value="">Chọn hình thức khuyến mãi</option>
                                        <?php foreach ($arrDs_km as $km): ?>
                                            <option value="<?= $km['km_ma'] ?>"><?= $km['km_ten'] ?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- Đã chọn khuyến mãi trước -->
                                        <?php foreach ($arrDs_km as $km): ?>
                                            <?php if ($km['km_ma'] == $row_sp_mod['km_ma']): ?>
                                                <option value="<?= $km['km_ma'] ?>" selected><?= $km['km_ten'] ?></option>
                                            <?php else: ?>
                                                <option value="<?= $km['km_ma'] ?>"><?= $km['km_ten'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <!-- vế 2 -->
                                    <?php endif; ?>
                                </select>
                            </div>
                            <!-- Danh sách tên Khuyến mãi -->

                            <div class="mb-3">
                                <label class="form-label">Giá cũ:</label>
                                <input type="number" name="sp_giacu" id="sp_giacu" value="<?= $row_sp_mod['sp_giacu'] ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Số lượng sản phẩm:</label>
                                <input type="number" name="sp_soluong" id="sp_soluong" value="<?= $row_sp_mod['sp_soluong'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhà phân phối:</label>
                                <select name="npp_ma" id="npp_ma" class="form-select">
                                    <?php foreach ($arrDs_Npp as $npp): ?>
                                        <?php if ($npp['npp_ma'] == $row_sp_mod['npp_ma']): ?>
                                            <option value="<?= $npp['npp_ma'] ?>" selected><?= $npp['npp_ten'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $npp['npp_ma'] ?>"><?= $npp['npp_ten'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <select name="th_ma" id="th_ma" class="form-select">
                                    <?php foreach ($arrDs_th as $th): ?>
                                        <?php if ($th['th_ma'] == $row_sp_mod['th_ma']): ?>
                                            <option value="<?= $th['th_ma'] ?>" selected><?= $th['th_ten'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $th['npth_map_ma'] ?>"><?= $th['th_ten'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá mới:</label>
                                <input type="number" name="sp_gia" id="sp_gia" value="<?= $row_sp_mod['sp_gia'] ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả ngắn:</label>
                            <input type="text" name="sp_mota_ngan" id="sp_mota_ngan" value="<?= $row_sp_mod['sp_mota_ngan'] ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả chi tiết:</label>
                            <input type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" value="<?= $row_sp_mod['sp_mota_chitiet'] ?>" class="form-control"> </input>
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

                    if ($sp_ten != "" && $sp_gia  != "" && $sp_mota_ngan != "" && $sp_mota_chitiet != "" && $sp_ngaycapnhat != "" && $sp_soluong != "" && $lsp_ma != "" && $km_ma != "" && $th_ma != "" && $npp_ma != "") {
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
                            km_ma='$km_ma',
                            th_ma=$th_ma,
                            npp_ma=$npp_ma
                        WHERE sp_ma= $sp_ma;
                ";
                        // 3. Thực thi câu lệnh
                        //var_dump($sql);
                        mysqli_query($conn, $sql);
                        echo '<script> location.href="index.php"</script>';
                    } else {
                        echo '<script>alert("Dữ liệu không được rỗng!");</script>';
                    }
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