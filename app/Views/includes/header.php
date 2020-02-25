<!DOCTYPE html>
<html class="no-js" lang="en">

<head>


    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Wordsmith</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    if ($view == "uploadPost") {
    ?>

        <!-- Java Script
        ================================================== -->
        <script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>/assets/js/main.js"></script>

        <!-- include libraries(jQuery, bootstrap) -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <?php
    }
    ?>

    <!-- CSS
    ================================================== -->
    <!-- base_url obtiene el string de app/App -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css">

    <!-- script
    ================================================== -->
    <script src="<?= base_url() ?>/assets/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url() ?>/assets/images/favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="index.html">
                <img src="<?= base_url() ?>/assets/images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header__logo -->

        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div> <!-- end header__search -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li class="current"><a href="<?= base_url() ?>" title="">Home</a></li>
                <li class="has-children">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT * FROM categories");
                        $result = $query->getResult();
                        foreach ($result as $r) {
                            echo '
                        <li><a href="' . base_url() . '/dashboard/category/' . $r->id_cat . '">' . $r->name . '</a></li>
                            ';
                        }
                        ?>
                    </ul>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>" title="">Blog</a>
                </li>

            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->