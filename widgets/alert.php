<?php
if (isset($_SESSION['message']) && isset($_SESSION['icon']) && isset($_SESSION['title'])) {
    $icon = $_SESSION['icon'];
    $title = $_SESSION['title'];
    $message = $_SESSION['message'];
?>
    <script>
        Swal.fire({
            title: "<?= $title; ?>",
            text: "<?= $message; ?>",
            icon: "<?= $icon; ?>"
        }).then(() => {
            <?php
            // Unset the session variables after displaying the SweetAlert popup
            unset($_SESSION['icon']);
            unset($_SESSION['title']);
            unset($_SESSION['message']);
            ?>
        });
    </script>
<?php
}
?>
