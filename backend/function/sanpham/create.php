<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/select.php';
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
                <h1>Thêm sản phẩm</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <!-- bắt buộc chọn khóa ngoại  -->
                    <!-- Loại sản phẩm: <input type="text" name="lsp_ten" class="form-control" /><br /> -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Tên sản phẩm:</label>
                                <input type="text" name="sp_ten" id="sp_ten" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại sản phẩm:</label>
                                <select name="lsp_ma" id="lsp_ma" class="form-select">
                                    <?php foreach ($arrDs_Lsp as $lsp): ?>
                                        <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Khuyến mãi:</label>
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
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá cũ:</label>
                                <input type="number" name="sp_giacu" id="sp_giacu" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Số lượng sản phẩm:</label>
                                <input type="number" name="sp_soluong" id="sp_soluong" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhà phân phối:</label>
                                <select name="npp_ma" id="npp_ma" class="form-select">
                                    <?php foreach ($arrDs_Npp as $npp): ?>
                                        <option value="<?= $npp['npp_ma'] ?>"><?= $npp['npp_ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <select name="th_ma" id="th_ma" class="form-select">
                                    <?php foreach ($arrDs_th as $th): ?>
                                        <option value="<?= $th['th_ma'] ?>"><?= $th['th_ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá mới:</label>
                                <input type="number" name="sp_gia" id="sp_gia" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả ngắn:</label>
                            <input type="text" name="sp_mota_ngan" id="sp_mota_ngan" class="form-control" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả chi tiết:</label>
                            <textarea type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" rows="5" class="form-control"> </textarea>
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
                            "INSERT INTO sanpham
                            (sp_ten, sp_gia, sp_giacu, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong, lsp_ma, km_ma, th_ma, npp_ma)
                            VALUES ('$sp_ten', $sp_gia, $sp_giacu, '$sp_mota_ngan', '$sp_mota_chitiet', '$sp_ngaycapnhat', $sp_soluong, $lsp_ma,  $km_ma, $th_ma, $npp_ma);

                ";
                        // 3. Thực thi câu lệnh
                        //var_dump($sql); die;
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
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</body>

</html>