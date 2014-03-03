<div class="container" id="main-region">
	<?php if (isset($project)) :?>
        <h1 class="title"><?php e($project->title) ?></h1>

        <?php echo auto_typography($project->body) ?>

<?php else : ?>
    <div class="alert alert-info">
        No projects were found.
    </div>
<?php endif; ?>
</div>