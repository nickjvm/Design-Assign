<div class="container" id="main-region">
    <div class="row">
        <div class="span12">
            <div class="title-over-image">
                <img src="<?php print img_path().'find-a-project.jpg'; ?>"/>
            	<h2 class="title">Find a project</h2>
            </div>
        	<?php if (isset($projects) && is_array($projects)) :?>
                <?php if($applications_status) { ?>
                <p>
                    Ready to volunteer? View all currently available projects below. Click “Read more” for more information and to apply for the project.
                </p>
                <?php } else { ?>
                    <?php $date = $this->settings_lib->item('ext.cr_application_start_date'); 
                    $date = strtotime($date);
                    if($date < strtotime()) { ?>
                    <p>
                        Sorry, applications for volunteers has closed. Feel free to browse the projects to see what kinds of projects may be available next year!
                    </p>
                    <?php } ?>
                <?php } ?>
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
            Our non-profit partners are working on their project requests! Check back soon!
        </div>
    <?php endif; ?>
</div>