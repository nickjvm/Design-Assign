<div class="container">
	<div class="row">
	    <?php
	        echo Template::message();
		?>
	</div>
	<?php
	    echo isset($content) ? $content : Template::content();
	?>

</div>