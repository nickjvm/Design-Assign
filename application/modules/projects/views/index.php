<div class="container" id="main-region">
    <div class="row">
        <div class="span12">
            <div class="title-over-image">
                <img src="<?php print img_path().'find-a-project.jpg'; ?>"/>
            	<h2 class="title">Find a project</h2>
            </div>
        	<?php if (isset($projects) && is_array($projects)) :?>
                <p>
                    Ready to volunteer? View all currently available projects below. Click “Read more” for more information and to apply for the project.
                </p>
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($projects) && is_array($projects)) :?>
    <div class="projects row">
        <?php foreach ($projects as $project) : ?>
        <div class="project-brief span3 <?php if($project->isClosed) { print 'closed'; } ?>">
            <?php if(!$project->valid): ?>
                <div class="applied" title="Your application for this project has been submitted">
                    <i class="fa fa-check"></i>
                </div>
            <?php endif; ?> 
            <h2 class="ellipsis"><?php e($project->title) ?></h2>
            <ul class="list-unstyled">
            	<li>
            		<span class="label">Organization:</span> 
            		<?php print $this->user_model->find_meta_for($project->created_by)->organization; ?></li>
            	<li>
            		<span class="label">Estimated Hours:</span>
            		<?php print $project->hours; ?></li>
            	<li><span class="label">Project Background:</span>
            		<div>
    	        		<?php echo character_limiter(auto_typography($project->body),50); ?>		
    	        	</div>
    	        </li>
            </ul>
            <a href="<?php print site_url('projects/project/'.$project->brief_id);?>" class="btn btn-link read-more pull-right">read more<i class="fa fa-chevron-circle-right"></i></a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
        <div class="alert alert-info">
            We are currently seeking projects from our non-profit partners. Check back soon to volunteer for needed projects!
        </div>
    <?php endif; ?>
</div>