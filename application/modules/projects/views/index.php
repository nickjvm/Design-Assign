<div class="container" id="main-region">
	<h2 class="title">Find a project</h2 class="title">
	<?php if (isset($projects) && is_array($projects)) :?>
    <div class="projects">
        <?php foreach ($projects as $project) : ?>
        <div class="project-brief">
            <h2><?php e($project->title) ?></h2>
            <ul class="list-unstyled">
            	<li>
            		<span class="label">Organization:</span> 
            		<?php print $this->user_model->find_meta_for($project->created_by)->organization; ?></li>
            	<li>
            		<span class="label">Estimated Hours:</span>
            		<?php print $project->hours; ?></li>
            	<li><span class="label">Project Background:</span>
            		<div>
    	        		<?php echo character_limiter(auto_typography($project->body),60); ?>		
    	        	</div>
    	        </li>
            </ul>
            <a href="<?php print site_url('projects/project/'.$project->brief_id);?>" class="btn btn-link read-more pull-right">read more<i class="fa fa-chevron-circle-right"></i></a>
        </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="alert alert-info">
        No projects were found.
    </div>
<?php endif; ?>
</div>