<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo isset($toolbar_title) ? $toolbar_title.' ~ ' : ''; ?>Cava Property</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

    <link rel="stylesheet" href="<?php echo config_item('assets_url'); ?>stylesheets/normalize.css">
    <link rel="stylesheet" href="<?php echo config_item('assets_url'); ?>stylesheets/app.css">
    <script src="<?php echo config_item('assets_url'); ?>js/vendor/modernizr-2.6.2.min.js"></script>
    <script>
        var BASE_URL = '<?php echo base_url(); ?>';
    </script>
</head>
<body>
    <div id="main" role="main">