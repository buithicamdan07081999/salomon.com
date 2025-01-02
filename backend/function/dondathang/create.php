<!DOCTYPE html>
<html lang="en">
<!-- https://www.youtube.com/watch?v=0V8BTdIcuRs&t=2576s -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐƠN ĐẶT HÀNG</title>
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
                <h1>Thêm mới đơn đặt hàng</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    <!-- action "" là tự gửi đến trang hiện tại                     -->
                    <!-- <div class="mb-3">
                        <label class="form-label">Tên:</label>
                        <input type="text" name="lsp_ten" id="lsp_ten" class="form-control">
                    </div> -->

                    <div class="mb-3">
                        <label class="form-label">Tên khách hàng:</label>
                        <select name="kh_ma" id="kh_ma" class="form-select">
                            <option value="">Chọn khách hàng</option>
                            <?php foreach ($arrDs_kh as $kh): ?>
                                <option value="<?= $kh['kh_ma'] ?>">
                                    <?= $kh['kh_ten'] ?>
                                    (<?= $kh['kh_dienthoai'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <h3>Thông tin đơn đặt hàng</h3>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Ngày lập:</label>
                            <input type="datetime-local" class="form-control" name="dh_ngaylap">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Ngày giao:</label>
                            <input type="datetime-local" class="form-control" name="dh_ngaygiao">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Nơi giao:</label>
                            <input type="text" class="form-control" name="dh_noigiao">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Trạng thái thanh toán:</label>
                            <?php foreach ($arrDs_tttt as $tttt): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tttt_ma" id="tttt_ma" value="<?= $tttt['tttt_ma'] ?>">
                                    <label class="form-check-label" for="tttt_ma">
                                        <?= $tttt['tttt_diengiai'] ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Hình thức thanh toán:</label>
                            <?php foreach ($arrDs_httt as $httt): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="httt_ma" id="httt_ma" value="<?= $tttt['tttt_ma'] ?>">
                                    <label class="form-check-label" for="httt_ma">
                                        <?= $httt['httt_diengiai'] ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <h3>
                        Chi tiết đơn đặt hàng
                    </h3>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Sản phẩm:</label>
                            <select name="sp_ma" id="sp_ma" class="form-select">
                                <option value="">Chọn sản phẩm</option>
                                <?php foreach ($arrDs_sp as $sp): ?>
                                    <option value="<?= $sp['sp_ma'] ?>" data-sp_gia="<?= $sp['sp_gia'] ?>">
                                        <!-- data-sp_ma="<?= $sp['sp_ma'] ?>" để dùng trong jQuery -->
                                        <?= $sp['sp_ten'] ?> (<?= number_format($sp['sp_gia'], 0, '.', ',') ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Số lượng: </label>
                            <input type="number" name="soluong" id="soluong" class="form-control">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Xử lý: </label> <br />
                            <button type="button" class="btn btn-primary" id="btnAdd">Thêm vào đơn hàng</button>
                        </div>
                    </div>
                    <br />
                    <!-- Thông tin hiển thị -->
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered" id="tblDetail">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- jQuery -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    // Lấy dữ liệu từ sự kiện POST
                    $lsp_ten = $_POST['lsp_ten'];
                    $lsp_mota = $_POST['lsp_mota'];
                    if ($lsp_ten != "" && $lsp_mota != "") {
                        $sql =
                            "INSERT INTO dondathang(dh_ngaylap, dh_ngaygiao, dh_noigiao, dh_trangthaithanhtoan, kh_ma, sp_ma)
                        VALUES (NOW(),'$dh_ngaygiao','$dh_noigiao','$dh_trangthaithanhtoan','$kh_ma', '$sp_ma')   ";
                        //Thực thi
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
    <script>
        $(function() {
            $('#btnAdd').click(function() {
                // Lấy thông tin Option nào đang được chọn
                // $('select#sp_ma '); // tìm cha
                var sp_ma = $('select#sp_ma option:selected').val(); // tìm con (tìm option đang được chọn)
                // Truyền dữ liệu từ HTML qua JS thì được quyền thêm thuộc tính vào HTML Data-(tên) vào thẻ Option
                var sp_ten = $('select#sp_ma option:selected').text(); // Thẻ option                
                var sp_gia = $('select#sp_ma option:selected').data('sp_gia');
                var soluong = $('#soluong').val(); // Thẻ input
                //Tạo template HTML tr
                var htmltemplate = '<tr>';
                htmltemplate += '<td>' + sp_ten + '<input type="hidden" name="sp_ma[]" value="' + sp_ma + '"/> </td>';
                htmltemplate += '<td>' + soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + soluong + '"/> </td>';
                htmltemplate += '<td>' + sp_gia + '<input type="hidden" name="sp_dh_dongia" value="' + sp_gia + '"/> </td>';
                htmltemplate += '<td>' + soluong * sp_gia + ' </td>';
                htmltemplate += '<td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td>';
                htmltemplate += '</tr>';
                // Chèn Html vào Table
                // $('#tblDetail tbody').html(htmltemplate); // Tìm đúng tbody nhét vào bên trong
                $('#tblDetail tbody').append(htmltemplate); // Tiếp nối dòng phía trên
                // Lưu cơ sở dữ liệu (Input Hidden)
                // Đăng ký sự kiện cho nút Delete                
            });
            // (Giao diện Động) Dùng on vì trạng thái ban đầu không có, khi thêm 1 dòng mới có nút Delete
            $('#tblDetail').on('click', '.btn-delete-row', function() // Đăng ký sự kiên Click cho nnguyeen table
                { // jQuery Delete
                    $(this).parent().parent()[0].remove(); // Tìm lên trên 1 cấp btnDel -> td -> tr
                });
        });
    </script>
        <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
</body>

</html>