<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
    <?php
    include_once __DIR__ . '/../../layouts/partials/styles.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h1>Thêm sản phẩm</h1>
                <!-- 1. Nhờ PHP lấy ra loại sản phẩm -->
                <?php
                // mở kết nối                
                include_once __DIR__ . '/../../../dbconnect.php';
                // sql
                $sql = "SELECT A.lsp_ma, A.lsp_ten FROM loaisanpham A";
                // thực thi
                $data = mysqli_query($conn, $sql);
                // array
                $arrDs_Lsp = [];
                while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
                    $arrDs_Lsp[] = array(
                        'lsp_ma' => $row['lsp_ma'],
                        'lsp_ten' => $row['lsp_ten'],
                    );
                }
                ?>
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
                                <select name="lsp_ten" id="lsp_ten" class="form-select">
                                    <?php foreach ($arrDs_Lsp as $lsp): ?>
                                        <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá sản phẩm:</label>
                                <input type="number" name="sp_gia" id="sp_gia" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Số lượng sản phẩm:</label>
                                <input type="text" name="sp_soluong" id="sp_soluong" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhà phân phối:</label>
                                <input type="text" name="npp_ten" id="npp_ten" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giá cũ:</label>
                                <input type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label class="form-label">Mô tả ngắn:</label>
                            <input type="text" name="sp_mota_ngan" id="sp_mota_ngan" class="form-control">
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
                    // 1. Mở kết nối
                    include_once __DIR__ . '/../../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $sp_ten = $_POST['sp_ten'];
                    $sp_gia = $_POST['sp_gia'];
                    $sp_mota_ngan = $_POST['sp_mota_ngan'];
                    $sp_mota_chitiet = $_POST['sp_mota_chitiet'];
                    $sp_soluong = $_POST['sp_soluong'];
                    if ($sp_ten != "" && $sp_gia != "" && $sp_mota_ngan != "" && $sp_mota_chitiet != "" && $sp_soluong != "") {
                        $sql =
                            "INSERT INTO sanpham (sp_ten, sp_gia, sp_mota_ngan, sp_mota_chitiet, sp_soluong )
                VALUES ('$sp_ten', '$sp_gia', '$sp_mota_ngan', '$sp_mota_chitiet', '$sp_soluong');
                
                UPDATE sanpham
                SET 
                    sp_giacu = IF(sp_giacu IS NULL, NULL, sp_gia),  -- Nếu sp_giacu đã có giá trị thì cập nhật nó bằng giá hiện tại
                    sp_gia = '$sp_gia'  -- Cập nhật giá mới vào cột sp_gia
                WHERE sp_ten = '$sp_ten';  -- Điều kiện để xác định đúng sản phẩm
                ";
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