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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49858843-1', 'aiga.org');
  ga('send', 'pageview');

</script>