<?php echo theme_view('_header'); ?>
<?php echo theme_view('_sitenav'); ?>

<div class="container" id="main-region"> <!-- Start of Main Container -->
	<div class="row-fluid">
		<div class="span6">
		    <?php
		        echo isset($content) ? $content : Template::content();
		    ?>
		</div>
</div>
<?php echo theme_view('_footer'); ?>