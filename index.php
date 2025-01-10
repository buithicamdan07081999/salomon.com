<?php
if (session_id() === '') {
    session_start();
}
?>

<div class="card-body">
    <?php if (isset($_SESSION['logged'])) :?>
        <?php echo '<script>location.href = "/kdbd.com/home/products.php"; </script>'; ?>
    <?php else: ?>
        <?php echo '<script>location.href = "/kdbd.com/auth/login.php"; </script>'; ?>
    <?php
    endif;
    ?>
</div>