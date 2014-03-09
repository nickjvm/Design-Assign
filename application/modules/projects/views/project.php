<div class="container" id="main-region">
	<div class="row-fluid">
		<div class="span8 main-content">
	<?php if (isset($project)) :?>
        <h2 class="title">
            <?php e($project->title) ?>: <?php e($project->type);?>
        </h2>
        <ul class="list-unstyled project-details">
            <li>Organization: <?php print $this->user_model->find_meta_for($project->created_by)->organization;?></li>
            <li>Estimated Hours: <?php print $project->hours;?></li>
            <li>Materials Budget: <?php print $project->budget; ?></li>
            <li>Audience: <?php print $project->audience;?></li>
            <li>Deadline: <?php print $project->deadlines;?></li>
            <li>Project Background:
                <div>
                    <?php echo auto_typography($project->body) ?>
                </div>
            </li>
        </ul>
        
        <?php if(!$current_user || ($current_user->meta->category == "creative" && $valid_applicant)):?>
        	<a href="<?php print site_url('projects/project/'.$project->brief_id.'/apply');?>" class="magnific btn btn-lg btn-primary">Volunteer for this project! <i class="fa fa-chevron-circle-right"></i></a>
            <a class="btn btn-link" href="<?php print site_url('projects'); ?>">Find another project</a>
       	<?php endif;?>


<?php else : ?>
    <div class="alert alert-info">
        No projects were found.
    </div>
<?php endif; ?>
</div>
<div class="sidebar span4">

	<?php Template::block('events', 'events', null, true); ?>
	</div>
</div>
</div>