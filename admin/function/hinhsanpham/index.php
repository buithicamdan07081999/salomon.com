<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HÌNH SẢN PHẨM</title>
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
                <h3>HÌNH SẢN PHẨM <br />(Chưa xong chức năng sửa hình ảnh)</h3>
                <!-- <br/><span style="color: red">Lỗi: <br/>- Khi xóa trong SQL -> Folder ko xóa</span> -->
                <br /><span style="color: green">Done: <br />- Khi xóa trong SQL -> Web xóa
                    <br />- Khi xóa trong Web -> SQL xóa + Folder xóa
                </span>
                <a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <!-- Trình diễn các dữ liệu đã select trong dbconnect -->
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hình sản phẩm</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_hsp as $hsp) : ?>
                        <!-- $arrDs_hsp có sẵn trong file dbconnect -->
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $hsp['sp_ten'] ?></td>
                            <td><?= number_format($hsp['sp_gia'], 0, '.', ',')  ?></td>
                            <td>
                                <img src="/kdbd.com/uploads/<?= $hsp['hsp_tentaptin'] ?>" alt="" class="hinh-sanpham">
                            </td>
                            <td>
                                <!-- gửi bằng đường GET -->
                                <a href="edit.php?hsp_ma=<?= $hsp['hsp_ma'] ?>" class="btn btn-warning mod">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-danger del" data-hsp_ma_key="<?= $hsp['hsp_ma'] ?>">Xóa <i class="fa-regular fa-trash-can"></i></a>
                                <!-- Tiền tố data- (thuộc tính của html) để dễ quản lý -> this.(tên thuộc tính) -->
                                <!-- ko xài điều hướng của html nữa -> href="#" sử dụng khi có alert yes no -->
                            </td>
                        </tr>
                    <?php
                        $stt++;
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
    <script>
        $(document).ready(function() { // giao diện đã render hết rồi mới xử lý
            console.log("Đã load xong!");
            $('.del').click(function() { // nhờ jQuery đang tìm các phần tử có class "del" -> đămg ký sự kiện Click -> Thực hiện tác vụ gì?
                var hsp_ma = $(this).data('hsp_ma_key'); // phân biệt nút xóa dòng nào
                console.log(hsp_ma);
                //sweetalert
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Người dùng đã nhấn nút xóa
                        location.href = "delete.php?hsp_ma=" + hsp_ma; // Điều hướng bằng JS thay cho  href="đường dẫn"
                    }
                });
                //sweetalert
            });
        });
    </script>
</body>

</html>