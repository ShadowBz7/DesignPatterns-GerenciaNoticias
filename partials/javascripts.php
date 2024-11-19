<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Bootstrap core JS-->
<!-- Core theme JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include('widgets/alert.php'); ?>
<script>
    var editor1 = new RichTextEditor("#post_writer");
</script>
<script>
    // Select all elements in the blog
    var elements = document.querySelectorAll('*');

    // Loop through each element
    elements.forEach(function(element) {
        // Remove the font-family property
        element.style.removeProperty('font-family');

        // Set default font-family to Mukta
        element.style.fontFamily = 'Mukta';
    });
</script>

</html>