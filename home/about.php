<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript, Lập trình C#, Lập trình, Web, Kiến thức, Đồ án">
    <meta name="author" content="Bùi Thị Cẩm Đan">
    <meta name="description"
        content="Đồ án cơ bản về Lập trình web, Cơ sở dữ liệu, ...">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Đồ án Web Bán Hàng">
    <meta property="og:description"
        content="Cung cấp các kiến thức Nền tảng, cơ bản về Lập trình, Lập trình web, Lập trình di động, Cơ sở dữ liệu, ...">
    <meta property="og:url" content="https://nentang.vn/">
    <meta property="og:site_name" content="Đồ án Web Bán Hàng">
    <title>Bảng tin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- NenTang vendor CSS -->
    <!-- <link rel="stylesheet" href="https://libs.nentang.vn/web/nentang/wireframe/nentang-wireframe-jquery-plugin.css"> -->
    <?php
    include_once __DIR__ . '/../layouts/styles.php';
    include_once __DIR__ . '/../layouts/script.php';
    ?>
</head>

<body data-wf-enable="true">
    <!-- header -->
    <?php include_once __DIR__ . '/../layouts/header.php' ?>
    <!-- end header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php include_once __DIR__ . '/../layouts/sidebar.php' ?>
            </div>
            <div class="col-9">
                <main role="main" data-wf-element>
                    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
                    <div class="container mt-2" data-wf-element>
                        <h1 class="text-center">Trang giới thiệu</h1>
                        <div class="row" data-wf-element>
                            <!-- <div class="col col-md-12" data-wf-element>
                                <h5 class="text-center">Cung cấp kiến thức nền tảng về Lập trình, Thiết kế Web, Cơ sở dữ liệu</h5>
                                <h5 class="text-center">Giúp các bạn có niềm tin, hành trang kiến thức vững vàng trên con đường trở
                                    thành
                                    Nhà phát triển Phần mềm</h5> -->
                                <!-- <div class="text-center">
                                    <a href="https://nentang.vn" class="btn btn-primary btn-lg">Ghé thăm Nền tảng <i
                                            class="fa fa-forward" aria-hidden="true"></i></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="row mt-2" data-wf-element>
                            <div class="col col-md-12" data-wf-element>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7235485722294!2d105.78061631523369!3d10.039656175103817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1556697525436!5m2!1svi!2s"
                                    width="100%" height="330" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- End block content -->
                </main>

            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include_once __DIR__ . '/../layouts/footer.php'  ?>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>