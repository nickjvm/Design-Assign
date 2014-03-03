<div class="container" id="main-region">
	<div class="row-fluid">
		<div class="<?php if($page->sidebar) { print 'span8'; } else { print 'span12 no-sidebar'; } ?> main-content">
        	<?php if($page->image): ?>
        		<div class="title-over-image">
        		  <img typeof="foaf:Image" src="<?php print img_path().$page->image; ?>" width="518" height="250" alt="<?php print $page->title;?>">
        		  <h2 class="title unselectable">
        		  	<?php e($page->title); ?>
        			<?php if (has_permission('Bonfire.Pages.View')): ?>
        				<a href="<?php print site_url('admin/content/pages/edit/'.$page->page_id.'/return');?>" class="btn btn-link">Edit</a>
        			<?php endif;?>
        		  </h2>
        		</div>
        	<?php else: ?>
        		<h2 class="title">
        			<?php e($page->title); ?>
        			<?php if (has_permission('Bonfire.Pages.View')): ?>
        	    		<a href="<?php print site_url('admin/content/pages/edit/'.$page->page_id.'/return');?>" class="btn btn-link">Edit</a>
        	    	<?php endif;?>
        		</h2>
        	<?php endif; ?>

        	<?php echo auto_typography($page->body); ?>
		</div>
		<?php if($page->sidebar): ?>
			<div class="span4 sidebar"><?php print auto_typography($page->sidebar);?></div>
		<?php endif;?>

	</div>
</div>

