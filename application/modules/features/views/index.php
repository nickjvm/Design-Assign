<div id="main-region">
	<div class="container main-content no-border">
		<?php if(isset($features) && is_array($features)): ?>
		<?php foreach($features as $feature): ?>
			<div class="featured-project row">
	    		  <img typeof="foaf:Image" src="<?php print img_path().'features/'.$feature->image; ?>?width=400&assets=assets/images/features" height="auto" class="span3" alt="<?php print $feature->title;?>">
			   <div class="span6">
		   	    <h2>
		   	    	<a href="<?php echo site_url() . 'features/'.$feature->slug; ?>"><?php e($feature->title) ?></a>
		   		</h2>
			   	<?php echo strip_tags(auto_typography($feature->teaser)) ?>
			   </div>
			</div>
		<?php endforeach; ?>

		<?php else : ?>
		<div class="alert alert-info">
		    No Posts were found.
		</div>
		<?php endif; ?>
	</div>
	</div>