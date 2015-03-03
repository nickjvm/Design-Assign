<?php
	Assets::add_js( array( 'bootstrap.min.js', 'jwerty.js','jquery.ba-dotimeout.js',
        'jquery.magnific-popup.js',
        'summernote.js',
        '//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js',
        'main.js'), 'external', true);
       
	Assets::add_css( array(
		'summernote.css', 
		'//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome',
		'//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css'));
?>
<?php echo theme_view('partials/_header'); ?>

<div class="body">
	<div class="container-fluid">
	        <?php echo Template::message(); ?>
	
	        <?php echo isset($content) ? $content : Template::content(); ?>
	</div>
</div>

<?php echo theme_view('partials/_footer'); ?>
