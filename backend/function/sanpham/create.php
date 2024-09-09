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
                <h1>Thêm sản phẩm</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <!-- bắt buộc chọn khóa ngoại  -->
                    <!-- Loại sản phẩm: <input type="text" name="lsp_ten" class="form-control" /><br /> -->
                    Loại sản phẩm:
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        <li><a class="dropdown-item" href="#">Action</a></li> ?>
                    </ul>


                   

                    </div>
                    Nhà phân phối: <input type="text" name="npp_ten" class="form-control" /><br />
                    <!-- bắt buộc chọn khóa ngoại  -->
                    Tên sản phẩm: <input type="text" name="sp_ten" class="form-control" /><br />
                    Giá sản phẩm: <input type="text" name="sp_gia" class="form-control" /><br />
                    Mô tả ngắn: <input type="text" name="sp_mota_ngan" class="form-control" /><br />
                    Mô tả chi tiết: <input type="text" name="sp_mota_chitiet" class="form-control" /><br />
                    Số lượng sản phẩm: <input type="text" name="sp_soluong" class="form-control" /><br />
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