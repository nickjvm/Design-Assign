<?php
    Assets::add_js( array('bootstrap.min.js',
        'jquery.ba-dotimeout.js',
        'jquery.magnific-popup.js',
        'main.js') );
    Assets::add_css( array('bootstrap.min.css', 
        'bootstrap-responsive.min.css',
        '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        'magnific-popup.css',
        'designassign.css')
    );

    $inline  = '$(".dropdown-toggle").dropdown();';
    $inline .= '$(".tooltips").tooltip();';

    Assets::add_js( $inline, 'inline' );
?>
<!doctype html>
<head>
    <meta charset="utf-8">

    <title><?php echo isset($page_title) ? $page_title .' : ' : ''; ?> <?php if (class_exists('Settings_lib')) e(settings_item('site.title')); else echo 'Bonfire'; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>

    <?php echo Assets::css(); ?>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>themes/default/favicon.ico">
</head>
<body>

<div class="wrapper">