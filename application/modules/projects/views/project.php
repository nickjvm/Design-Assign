<div class="container" id="main-region">
	<?php if (isset($project)) :?>
        <h1 class="title"><?php e($project->title) ?></h1>

        <?php echo auto_typography($project->body) ?>
        <?php if($current_user->meta->category == "creative"):?>
        	<a href="" class="btn btn-lg btn-primary">Volunteer for this project! <i class="fa fa-chevron-circle-right"></i></a>
       	<?php endif;?>


<?php else : ?>
    <div class="alert alert-info">
        No projects were found.
    </div>
<?php endif; ?>
</div>