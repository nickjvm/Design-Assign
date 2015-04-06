
<div id="main-region" class="container">

	<div class="row-fluid featured-project">
		<div class="span8  main-content no-border">
			<h2 class="title">
				<?php echo $feature->title; ?>
				<?php if (has_permission('Bonfire.Pages.View')): ?>
					<a href="<?php print site_url('admin/content/features/edit/'.$feature->feature_id.'/return');?>" class="btn btn-link">Edit</a>
				<?php endif;?>
			</h2>

			<?php echo auto_typography($feature->body); ?>

		</div>
		<div class="span4">
			<?php echo auto_typography($feature->sidebar); ?>
		</div>

</div>