
<?php
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$registration = new Registration();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>mini-pre</title>
        <script type="text/javascript">
        var GLOBAL_URL = "<?php echo URL; ?>";
        </script>
        <!-- JS -->
        <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
        <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->
        <script src="<?php echo URL; ?>js/vendor/modernizr.js"></script>
        <script src="<?php echo URL; ?>js/vendor/jquery.js"></script>
        <!-- CSS -->
        <!--
        -->
        <link href="<?php echo URL; ?>css/foundation.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet" />

        <!-- Hallo.js - inline content editting -->
        <!--
        <link rel="stylesheet" href="<?php echo URL; ?>hallo/fontawesome/css/font-awesome.css">
        -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]>
    <link rel="stylesheet" href="fontawesome/css/font-awesome-ie7.css" charset="utf-8" />
<![endif]-->
        <link rel="stylesheet" href="<?php echo URL; ?>jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>jquery-ui/jquery-ui-theme.css" />
        <script src="<?php echo URL; ?>hallo/jquery-ui.js"></script>
        <script src="<?php echo URL; ?>hallo/rangy/rangy-core.js"></script>
        <script src="<?php echo URL; ?>hallo/jquery.htmlClean.js"></script>
        <script src="<?php echo URL; ?>hallo/hallo.js"></script>

        <script src="<?php echo URL; ?>js/underscore.js"></script>
        <?php
            if ($login->isUserLoggedIn() == true) {
            /* Here we place login styles and scripts
               Contains styles that applies only if user is logged in, so the editable content is easily visible
               And some script that are only usable when editting
            */
            echo '<link href="'.URL.'css/admin.css" rel="stylesheet" />';
            echo '<script src="'.URL.'js/mousetrap.js"></script>';
            echo '<script src="'.URL.'js/admin.js"></script>';
            }
        ?>
    </head>
<body>
<!-- header -->
<!-- <?php echo URL; ?> cpat vsude - relativni cesta -->
<div class="admin">
    <div class="title">
        <a href="<?php echo URL; ?>"><?php echo PAGE_TITLE; ?></a>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <?php
            // ... ask if we are logged in here:
            if ($login->isUserLoggedIn() == true) {
                include APP . '/views/login/logged_in.php';
            } else {
                include APP . '/views/login/not_logged_in.php';
            }
            ?>
        </div>
    </div>
</div>
<div class="show-admin">
    <i class="fa fa-cog"></i>
</div>
<!-- header -->
<header>
<div class="row">
    <div class="large-12 columns">
        <h1><?php echo PAGE_TITLE; ?></h1>
    </div>
</div>
</header>