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
                $sql_lsp = "SELECT A.lsp_ma, A.lsp_ten FROM loaisanpham A";
                $sql_npp = "SELECT A.npp_ma, A.npp_ten FROM nhaphanphoi A";
                $sql_km = "SELECT A.km_ma, A.km_ten, A.km_noidung, A.km_tungay, A.km_denngay FROM khuyenmai A";
                $sql_th = "SELECT A.th_ma, A.th_ten FROM thuonghieu A";
                // thực thi
                $data_lsp = mysqli_query($conn, $sql_lsp);
                $data_npp = mysqli_query($conn, $sql_npp);
                $data_km = mysqli_query($conn, $sql_km);
                $data_th = mysqli_query($conn, $sql_th);
                // array
                $arrDs_Lsp = [];
                $arrDs_Npp = [];
                $arrDs_km = [];
                $arrDS_th = [];
                // phân tích khối dữ liệu thành mảng
                while ($row = mysqli_fetch_array($data_lsp, MYSQLI_ASSOC)) {
                    $arrDs_Lsp[] = array(
                        'lsp_ma' => $row['lsp_ma'],
                        'lsp_ten' => $row['lsp_ten'],
                    );
                }
                while ($row = mysqli_fetch_array($data_npp, MYSQLI_ASSOC)) {
                    $arrDs_Npp[] = array(
                        'npp_ma' => $row['npp_ma'],
                        'npp_ten' => $row['npp_ten'],
                    );
                }
                while ($row = mysqli_fetch_array($data_km, MYSQLI_ASSOC)) {
                    $arrDs_km[] = array(
                        'km_ma' => $row['km_ma'],
                        'km_ten' => $row['km_ten'],
                        'km_noidung' => $row['km_noidung'],
                        'km_tungay' => $row['km_tungay'],
                        'km_denngay' => $row['km_denngay'],
                    );
                }
                while ($row = mysqli_fetch_array($data_th, MYSQLI_ASSOC)) {
                    $arrDs_th[] = array(
                        'th_ma' => $row['th_ma'],
                        'th_ten' => $row['th_ten'],
                    );
                    //var_dump($arrDs_th);
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
                                        <option value="<?= $npp['npp_ten'] ?>"><?= $npp['npp_ten'] ?></option>
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
                            <input type="text" name="sp_mota" id="sp_mota" class="form-control" />

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
                    date_default_timezone_get('Asia/Ho_Chi_Minh');
                    // 1. Mở kết nối
                    // include_once __DIR__ . '/../../../dbconnect.php';
                    // 2. Chuẩn bị câu lệnh
                    $sp_ten = $_POST['sp_ten'];
                    $lsp_ma = $_POST['lsp_ma'];
                    $km_ma = empty($_POST['km_ma']) ? NULL : $_POST['km_ma']; // nếu Km ko chọn thì để null 
                    $sp_mota_ngan = $_POST['sp_mota_ngan'];
                    $sp_mota_chitiet = $_POST['sp_mota_chitiet'];

                    $sp_soluong = $_POST['sp_soluong'];
                    $npp_ma = $_POST['npp_ma'];
                    $th_ma = $_POST['th_ma'];
                    $sp_gia = $_POST['sp_gia'];
                    $sp_giacu = empty($_POST['sp_giacu']) ? NULL : $_POST['sp_giacu'];
                    $sp_ngaycapnhat = date('Y-m-d H:i:s'); // đưa vào dữ liệu thô trong Database

                    if ($sp_ten != "" && $sp_lsp != "" && $sp_km != "" && $sp_mota_ngan != "" && $sp_mota_chitiet != "" && $sp_soluong != "" && $sp_npp != "" && $sp_th != "" && $sp_gia != "") {
                        $sql =
                            "INSERT INTO sanpham
                            (sp_ten, sp_gia, sp_giacu, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong, lsp_ma, km_ma, th_ma, npp_ma)
                            VALUES ('$sp_ten', $sp_gia, $sp_giacu, '$sp_mota_ngan', '$sp_mota_chitiet', '$sp_ngaycapnhat', $sp_soluong, '$lsp_ma',  '$km_ma', '$th_ma', '$npp_ma');

                ";
                        // 3. Thực thi câu lệnh
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
    include_once __DIR__ . '/../../../backend/layouts/partials/footer.php';
    ?>
    <!-- Fix lỗi: Vì sao không load được icon solid vì chưa khai báo ở style , font awesome chia ra nhiều loại nên cần khai báo thêm -->
    <?php
    include_once __DIR__ . '/../../../backend/layouts/partials/script.php';
    ?>
</body>

</html>