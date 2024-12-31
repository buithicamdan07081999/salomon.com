<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐƠN ĐẶT HÀNG</title>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../handle/dbconnect.php';
    include_once __DIR__ . '/../../../handle/select.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../../layouts/styles.php';
    include_once __DIR__ . '/../../../layouts/header.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/../../../backend/layouts/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3>ĐƠN ĐẶT HÀNG</h3><a href="../../../index.php" class="btn btn-outline-info mb-3">Trang chủ <i class="fa-solid fa-house"></i></a>
                <a href="create.php" class="btn btn-primary mb-3">Thêm mới <i class="fa-solid fa-plus"></i></a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn đặt hàng</th>
                        <th>Khách hàng</th>
                        <th>Ngày lập</th>
                        <th>Ngày giao</th>
                        <th>Nơi giao</th>
                        <th>Hình thức thanh toán</th>
                        <th>Tổng thành tiền</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Tùy chỉnh</th>
                    </tr>
                    <?php $stt = 1 ?>
                    <?php foreach ($arrDs_ddh as $ddh) : ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $ddh['dh_ma'] ?></td>
                            <td><?= $ddh['kh_ten'] ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime( $ddh['dh_ngaylap'])) ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime( $ddh['dh_ngaygiao'])) ?></td>
                            <td><?= $ddh['dh_noigiao'] ?></td>
                            <td><?= $ddh['httt_ten'] ?></td>
                            <td class="text-end"><?= number_format($ddh['tongthanhtien'], 0 , '.', ',') ?></td>
                            <!-- <td><span class="badge text-bg-primary"><?= $ddh['tttt_ten'] ?></span></td> -->
                            <td>
                                <?php if($ddh['tttt_ma'] == 1): ?>
                                   <span class="badge text-bg-info">Đã đặt hàng</span>
                                <?php elseif($ddh['tttt_ma'] == 2): ?>
                                   <span class="badge text-bg-light">Chưa xử lý</span>
                                    <?php elseif($ddh['tttt_ma'] == 3): ?>
                                   <span class="badge text-bg-primary">Đang giao hàng</span>
                                        <?php elseif($ddh['tttt_ma'] == 4): ?>
                                   <span class="badge text-bg-success">Đã giao hàng</span>
                                            <?php elseif($ddh['tttt_ma'] == 5): ?>
                                   <span class="badge text-bg-secondary">Yêu cầu hoàn hàng</span>
                                                <?php elseif($ddh['tttt_ma'] == 6): ?>
                                   <span class="badge text-bg-primary">Đang trả hàng</span>
                                        <?php elseif($ddh['tttt_ma'] == 7): ?>
                                   <span class="badge text-bg-success">Đã trả hàng</span>
                                                <?php endif; ?>
                            </td>
                            <!-- https://getbootstrap.com/docs/5.3/components/badge/ -->
                            <td>
                                <?php if($ddh['tttt_ma'] == 4):?>
                                    <a href="edit.php?dh_ma=<?= $ddh['dh_ma'] ?>" class="btn btn-warning">Sửa <i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="delete.php?dh_ma=<?= $ddh['dh_ma'] ?>" class="btn btn-danger">Xóa <i class="fa-regular fa-trash-can"></i></a>
                                    <?php else: ?>
                                        <a href="print.php?dh_ma=<?= $ddh['dh_ma'] ?>" class="btn btn-success">In<i class="fa-regular fa-pen-to-square"></i></a>
                                <?php endif;?>
                                <!-- gửi bằng đường GET -->
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
    <!-- this is contain -->
    <?php
    include_once __DIR__ . '/../../../layouts/footer.php';
    ?>
    <?php
    include_once __DIR__ . '/../../../layouts/script.php';
    ?>
</body>

</html>