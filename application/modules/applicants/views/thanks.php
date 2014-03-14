<div class="container-ajax">
	<h2 class="title">thank you!</h2>
	<h4>Thank you for volunteering for project <?php print $project->title;?> If you are
		selected for the project, we will notify you by May XXX.

	</h4>

	<h4>Please feel free to volunteer for another project!</h4>

	<h4>Share with your friends!</h4>


	<ul class="share-widget list-unstyled list-inline">
	    <li>
	        <?php $message = "#designassign is pairing DSM creatives with non-profit organizations!";
	                ?>
	        <a class="fb-share social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php print urlencode(site_url('projects/project/'.$project->brief_id)); ?>&media=<?php print urlencode(site_url('public/themes/default/images/logo.png')); ?>&description=<?php print utf8_encode($message); ?>">
	            <i class="fa fa-facebook"></i>
	            <span>share</span>
	        </a>
	    </li>
	    <li>
	        <a class="twitter-share social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php print urlencode(site_url('projects/project/'.$project->brief_id)); ?>&via=aigaiowa&text=<?php print urlencode($message); ?>">
	            <i class="fa fa-twitter"></i>
	            <span>share</span>
	        </a>
	    </li>
	    <?php if($current_user): ?>
	        <li>
	            <a class="magnific email-share" href="<?php print site_url('projects/project/'.$project->brief_id.'/share'); ?>">
	                <i class="fa fa-envelope-o"></i>
	                <span>share</span>
	            </a>
	        </li>
	    <?php endif; ?>
	</ul>
</div>