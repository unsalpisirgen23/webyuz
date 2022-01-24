<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Flattern Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="http://{{request()->getHost()}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="http://{{request()->getHost()}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="http://{{request()->getHost()}}/assets/css/style.css" rel="stylesheet">
    <style>
         <?= doAction("custom_style") ?>
    </style>
</head>
<body>
<!-- ======= get_template_widget ======= -->
{!! templateHook()->doAction("get_template_widget_group",['action_group'=>"headers"]) !!}
<!-- ======= end_get_template_widget ======= -->
<!-- End Hero -->
<!-- #main -->
<main id="main">
    @yield("content")
</main>
<!-- End #main -->
<!-- ======= Footer ======= -->
{!! templateHook()->doAction("get_template_widget_group",['action_group'=>"footers"]) !!}
<!-- End Footer -->
<!-- doAction("get_script_section") -->

<!-- Vendor JS Files -->
<script src="http://{{request()->getHost()}}/assets/vendor/aos/aos.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="http://{{request()->getHost()}}/assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="http://{{request()->getHost()}}/assets/js/main.js"></script>
</body>
</html>