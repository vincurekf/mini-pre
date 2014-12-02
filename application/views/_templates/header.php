
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
        <a href="<?php echo URL; ?>">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
            <g id="Layer_1">
                <g>
                    <polygon fill="#FFFFFF" points="8.513,141.797 8.513,8.823 90.607,8.823 141.487,59.702 141.487,141.797       "/>
                    <path fill="#50BB7C" d="M89.364,11.823l49.123,49.122v77.852H11.513V11.823H89.364 M91.85,5.823H5.513v138.974h138.974V58.459
                        L91.85,5.823L91.85,5.823z"/>
                </g>
                <path fill="#50BB7C" d="M91.334,3.547H3.237v143.525h143.525V58.976L91.334,3.547z M142.358,142.668H7.643V7.952h83.691v51.024
                    h51.024V142.668z"/>
                <path d="M87.624,8"/>
                <g>
                    <path fill="#50BB7C" d="M37.046,107.207h-8.748v17.112h-8.876V78.855h17.624c9.386,0,15.005,6.45,15.005,14.175
                        C52.052,100.757,46.433,107.207,37.046,107.207z M36.599,86.773h-8.301v12.452h8.301c4.023,0,6.577-2.49,6.577-6.195
                        C43.176,89.327,40.622,86.773,36.599,86.773z"/>
                    <path fill="#50BB7C" d="M83.656,124.319l-8.876-18.135h-6.385v18.135H59.52V78.855h17.815c9.258,0,14.75,6.321,14.75,13.92
                        c0,6.386-3.895,10.345-8.301,11.941l10.153,19.603H83.656z M76.761,86.773h-8.365v12.004h8.365c3.895,0,6.448-2.49,6.448-6.002
                        S80.655,86.773,76.761,86.773z"/>
                    <path fill="#50BB7C" d="M101.278,124.319V78.855h29.946v7.918h-21.072v10.663h17.944v7.918h-17.944v11.047h21.072v7.918H101.278z"
                        />
                </g>
            </g>
        </svg>
        </a>
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