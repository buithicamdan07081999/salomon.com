<!-- js dùng chung cho back end -->
<!-- Javascripts liên kết bằng thẻ scripts -->
<script src="/kdbd.com/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/kdbd.com/vendor/fontawesome/js/all.min.js"></script>
<script src="/kdbd.com/vendor/sweetalert/sweetalert2@11.js"></script>
<script src="/kdbd.com/vendor/jQuery/jQuery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Hiển thị submenu khi hover bằng jQuery
        $('.menu-item').hover(
            function() {
                $(this).find('.dropdown-menu').stop(true, true).slideDown(600);
            },
            function() {
                $(this).find('.dropdown-menu').stop(true, true).slideUp(600);
            }
        );
    });
</script>