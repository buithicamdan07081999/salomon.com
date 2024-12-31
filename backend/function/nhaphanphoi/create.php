<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHÀ PHÂN PHỐI</title>
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
                <h1>Thêm mới Nhà phân phối</h1>
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="">
                    Tên: <input type="text" name="npp_ten" class="form-control" /><br />
                    Mô tả: <input type="text" name="npp_mota" class="form-control" /><br />
                    <a href="index.php" class="btn btn-secondary">Quay về Danh sách <i class="fa-solid fa-backward"></i></a>
                    <button type="submit" name="btnLuu" class="btn btn-primary">Lưu dữ liệu  <i class="fa-regular fa-floppy-disk"></i></button>
                </form>
                <?php
                // Nếu người dùng có bấm nút Lưu -> thì mới xử lý
                if (isset($_POST['btnLuu'])) {
                    $npp_ten = $_POST['npp_ten'];
                    $npp_mota = $_POST['npp_mota'];
                    if ($npp_ten != "" && $npp_mota != "") {
                        $sql = "INSERT INTO nhaphanphoi(npp_ten, npp_mota)
                VALUES ('$npp_ten', '$npp_mota');";
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