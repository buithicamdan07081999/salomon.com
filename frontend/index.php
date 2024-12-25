<!DOCTYPE html>
<html lang="en">
<!-- https://www.youtube.com/watch?v=YLs4KCw9sEk&list=PLvS5p7fBPUMqsrL7MFQWBihk0SOaOpZZK -->
<!-- https://www.w3schools.com/css/css_pseudo_classes.asp -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php
    include_once __DIR__ . '/../layouts/partials/styles.php';
    ?>
</head>


<body>
    <div id="container"> <!-- Trang tổng thể -->

        <!-- start topbar -->
        <div id="topbar">

            <!-- start topbar-left -->
            <div id="topbar-left">
                <ul class="topbar-left-list">
                    <li><a href="#"></a>Về chúng tôi</li>
                    <li><a href="#"></a>Tài khoản</li>
                    <li><a href="#"></a>Giỏ hàng</li>
                    <li><a href="#"></a>Đơn đặt hàng</li>
                </ul>
            </div>
            <!-- end topbar-left -->

            <!-- start topbar-middle -->
            <div id="topbar-middle"><p>Khuyến mãi hấp dẫn! Mặt hàng phong phú</p></div>
            <!-- end topbar-middle -->

            <!-- start topbar-right -->
            <div id="topbar-right">
                <ul class="topbar-right-list">
                    <li><a href="#"></a>VNĐ</li>
                    <li><a href="#"></a>Tiếng Việt</li>
                    <li><a href="#"></a>Liên hệ</li>
                </ul>
            </div>
        </div>
        <!-- end topbar-right -->
    </div>
    <!-- end topbar -->

    <!-- start header -->
    <div id="header">

        <!-- start header-logo -->
        <div class="header-logo"></div>
        <!-- end header-logo -->

        <!-- start header-search-form -->
        <div class="header-search-form"></div>
        <!-- end header-search-form -->

        <!-- start header-button -->
        <div class="header-button"></div>
        <!-- end header-button -->

    </div>
    <!-- end header -->

    <!-- start main-menu -->
    <div id="main-menu">

        <!-- start main-menu-primary -->
        <div id="main-menu-primary"></div>
        <!-- end main-menu-primary -->

        <!-- start main-menu-links -->
        <div id="main-menu-links"></div>
        <!-- end main-menu-links -->

        <!-- start main-menu-hotline -->
        <div id="main-menu-hotline"></div>
        <!-- end main-menu-hotline -->

    </div>
    <!-- end main-menu -->

    <!-- start intro -->
    <div id="intro"></div>
    <!-- end intro -->

    <!-- start categorics -->
    <div class="categorics-featured">

        <!-- start categorics-title -->
        <div class="categorics-featured-title"></div>
        <!-- end categorics-title -->

        <!-- start categorics-wrapper -->
        <div class="categorics-featured-wrapper">

            <!-- start categoric-featured-item1 -->
            <div class="categoric-featured-item1"></div>
            <!-- end categoric-featured-item1 -->

            <!-- start categoric-featured-item2 -->
            <div class="categoric-featured-item2"></div>
            <!-- end categoric-featured-item2 -->

            <!-- start categoric-featured-item3 -->
            <div class="categoric-featured-item3"></div>
            <!-- end categoric-featured-item3 -->

        </div>
        <!-- end categorics-wrapper -->

        <!-- start categorics-featured-banner-wrapper -->
        <div class="categorics-featured-banner-wrapper">

            <!-- start categorics-featured-banner-wrapper-item1 -->
            <div class="categorics-featured-banner-wrapper-item1"></div>
            <!-- end categorics-featured-banner-wrapper-item1 -->

            <!-- start categorics-featured-banner-wrapper-item2 -->
            <div class="categorics-featured-banner-wrapper-item2"></div>
            <!-- end categorics-featured-banner-wrapper-item2 -->

            <!-- start categorics-featured-banner-wrapper-item3 -->
            <div class="categorics-featured-banner-wrapper-item3"></div>
            <!-- end categorics-featured-banner-wrapper-item3 -->

        </div>
        <!-- end categorics-featured-banner-wrapper -->

    </div>
    <!-- end categorics -->

    <!-- start popular-products -->
    <div class="populars-products">

        <!-- start popular-products-title -->
        <div class="populars-products-title">
            <div class="populars-products-title-text"></div>
            <div class="populars-products-title-link"></div>
        </div>
        <!-- end popular-products-title -->

        <!-- start popular-products-grid -->
        <div class="popular-products-grid">
            <div class="popular-products-row">
                <div class="popular-products-item1"></div>
                <div class="popular-products-item2"></div>
                <div class="popular-products-item3"></div>
                <div class="popular-products-item4"></div>
                <div class="popular-products-item5"></div>
            </div>
            <div class="clear-fit"></div>
            <div class="popular-products-row">
                <div class="popular-products-item6"></div>
                <div class="popular-products-item7"></div>
                <div class="popular-products-item8"></div>
                <div class="popular-products-item9"></div>
                <div class="popular-products-item10"></div>
            </div>
        </div>
        <!-- end popular-products-title -->

    </div>
    <!-- end popular-products -->

    <!-- start hot-deal -->
    <div class="daily-hot-deal">
        <!-- start hot-deal-title -->
        <div class="daily-hot-deal-title">
            <!-- start hot-deal-title-text -->
            <div class="daily-hot-deal-title-text"></div>
            <!-- end hot-deal-title-text -->
            <!-- start hot-deal-title-links -->
            <div class="daily-hot-deal-title-links"></div>
            <!-- end hot-deal-title-links -->
        </div>
        <!-- end hot-deal-title -->

        <!-- start hot-deal-content -->
        <div class="daily-hot-deal-content">
            <!-- start hot-deal-content-banner -->
            <div class="daily-hot-deal-content-banner"></div>
            <!-- end daily-hot-deal-content-banner-->
            <!-- start daily-hot-deal-content-grid -->
            <div class="daily-hot-deal-content-grid"></div>
            <!-- end daily-hot-deal-title-links -->
        </div>
        <!-- end hot-deal-content -->
    </div>
    <!-- end hot-deal -->

    <!-- start cross-sells -->
    <div class="cross-sells">
        <!-- start cross-sells-block -->
        <div class="cross-sells-block">

            <!-- start cross-sells-block-title -->
            <div class="cross-sells-block-title"></div>
            <!-- end cross-sells-block-title -->

            <!-- start cross-sells-block -->
            <div class="cross-sells-block-list-products">
                <div class="cross-sells-block-list-products-item"></div>
                <div class="cross-sells-block-list-products-item"></div>
                <div class="cross-sells-block-list-products-item"></div>
            </div>
            <!-- end cross-sells-block -->
        </div>
        <!-- end cross-sells-block -->

    </div>
    <!-- end cross-sells -->

    <!-- footer -->
    <div id="footer">

        <!-- footer-left -->
        <div id="footer-left"></div>
        <!-- end footer-left -->

        <!-- start footer-middle -->
        <div id="footer-middle"></div>
        <!-- end footer-middle -->

        <!-- start footer-right -->
        <div id="footer-right"></div>
        <!-- end footer-right -->

    </div>
    <!-- end footer -->

    </div>
</body>

</html>