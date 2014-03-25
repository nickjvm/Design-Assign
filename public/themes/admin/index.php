<?php
	Assets::add_js( array( 'bootstrap.min.js', 'jwerty.js','jquery.ba-dotimeout.js',
        'jquery.magnific-popup.js',
        'main.js'), 'external', true);
?>
<?php echo theme_view('partials/_header'); ?>

<div class="body">
	<div class="container-fluid">
	        <?php echo Template::message(); ?>
	
	        <?php echo isset($content) ? $content : Template::content(); ?>
	</div>
</div>

<?php echo theme_view('partials/_footer'); ?>
