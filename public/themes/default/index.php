<?php echo theme_view('_header'); ?>

 <!-- Start of Main Container -->

    <?php echo theme_view('_sitenav'); ?>
    <div class="container alert-container">
    <?php
        echo Template::message();
	?>
   </div>
   <?php
        echo isset($content) ? $content : Template::content();
    ?>

<?php echo theme_view('_footer'); ?>