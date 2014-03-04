<?php echo theme_view('_header'); ?>

 <!-- Start of Main Container -->

    <?php echo theme_view('_sitenav'); ?>
    <div class="container alert-container">
    	<div class="row">
		    <?php
		        echo Template::message();
			?>
		</div>
   </div>
   <?php
        echo isset($content) ? $content : Template::content();
    ?>

<?php echo theme_view('_footer'); ?>