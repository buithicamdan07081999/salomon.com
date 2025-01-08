<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Submenu</title>
    <!-- Bootstrap CSS -->
    <style>
        /* Tuỳ chỉnh cho menu */
        .dropdown-menu {
            display: none; /* Ban đầu ẩn */
        }

        .menu-item:hover .dropdown-menu {
            display: block !important; /* Hiện submenu khi hover */
        }

        .menu-item > a {
            color: white !important; /* Đổi màu chữ trong menu */
        }

        .navbar {
            background-color: #333; /* Màu nền tối cho header */
        }

        .dropdown-menu {
            background-color: #444; /* Màu nền cho submenu */
        }

        .dropdown-menu a {
            color: white !important; /* Màu chữ trong submenu */
        }

        .dropdown-menu a:hover {
            background-color: #555; /* Màu nền khi hover submenu */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">                    
                    <li class="nav-item dropdown menu-item">
                        <a class="nav-link" href="#">Services</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Web Design</a></li>
                            <li><a class="dropdown-item" href="#">SEO</a></li>
                            <li><a class="dropdown-item" href="#">Marketing</a></li>
                        </ul>
                    </li>                   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Hiển thị submenu khi hover bằng jQuery
            $('.menu-item').hover(
                function () {
                    $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
                },
                function () {
                    $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
                }
            );
        });
    </script>
</body>

</html>
