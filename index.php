<!DOCTYPE html>
<html lang="en">
<!-- https://www.youtube.com/watch?v=YLs4KCw9sEk&list=PLvS5p7fBPUMqsrL7MFQWBihk0SOaOpZZK -->
<!-- https://www.w3schools.com/css/css_pseudo_classes.asp -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD & KD Home</title>
    <?php
    include_once __DIR__ .  '/layouts/styles.php';
    ?>
</head>

<body>
    <div id="container"> <!-- Trang tổng thể -->
    <?php
    include_once __DIR__ . '/layouts/header.php'
    ?>

    
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
    <div id="intro">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
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