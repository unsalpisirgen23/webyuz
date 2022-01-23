<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Flattern Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    {!! doAction("get_style_section") !!}
    <style>
         <?= doAction("custom_style") ?>
    </style>
</head>
<body>
<!-- ======= get_template_widget ======= -->
{!! templateHook()->doAction("get_template_widget_group",['action_group'=>"headers",'domain'=>@$domain]) !!}
<!-- ======= end_get_template_widget ======= -->
<!-- End Hero -->
<!-- #main -->
<main id="main">
    @yield("content")
</main>
<!-- End #main -->
<!-- ======= Footer ======= -->
{!! templateHook()->doAction("get_template_widget_group",['action_group'=>"footers",'domain'=>@$domain]) !!}
<!-- End Footer -->
{!! doAction("get_script_section") !!}
</body>
</html>