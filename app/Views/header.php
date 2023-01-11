<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SIGM - Auth</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Medigo Template
    http://www.templatemo.com/preview/templatemo_460_medigo
    -->

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('template_auth/asset') ?>/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('template_auth/asset') ?>/css/misc.css">
    <link rel="stylesheet" href="<?= base_url('template_auth/asset') ?>/css/blue-scheme.css">

    <!-- JavaScripts -->
    <script src="<?= base_url('template_auth/asset') ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url('template_auth/asset') ?>/js/jquery-migrate-1.2.1.min.js"></script>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

</head>

<body>
    <div class="responsive_menu">
        <ul class="main_menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="archives.html">Archives</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->

    <header class="site-header clearfix">
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="pull-left logo">
                        <a href="index.html">
                            <img src="<?= base_url('template_auth/asset') ?>/images/logo.png" alt="Medigo by templatemo">
                        </a>
                    </div> <!-- /.logo -->

                    <div class="main-navigation pull-right">

                        <nav class="main-nav visible-md visible-lg">
                            <ul class="sf-menu">
                                <li <?php echo (uri_string() == "home" ? "class='active'" : ""); ?>><a href="<?= site_url('home') ?>">Home</a></li>
                                <li <?php echo (uri_string() == "contact" ? "class='active'" : ""); ?>><a href="<?= site_url('contact') ?>">Contact</a></li>
                                <li <?php echo (uri_string() == "about" ? "class='active'" : ""); ?>><a href="<?= site_url('about') ?>">About</a></li>
                                <li><a href="<?= site_url('login') ?>" class="main-button accent-color">Masuk</a></li>
                            </ul> <!-- /.sf-menu -->
                        </nav> <!-- /.main-nav -->

                        <!-- This one in here is responsive menu for tablet and mobiles -->
                        <div class="responsive-navigation visible-sm visible-xs">
                            <a href="#nogo" class="menu-toggle-btn">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div> <!-- /responsive_navigation -->

                    </div> <!-- /.main-navigation -->

                </div> <!-- /.col-md-12 -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->
    </header> <!-- /.site-header -->