<div class="container" id="main-region">
	<div class="row-fluid">
		<div class="span8 main-content">
	<?php if (isset($project)) :?>
        <h2 class="title">
            <?php e($project->title) ?>
        </h2>
        <ul class="share-widget list-unstyled">
            <li>
                <?php $message = "#designassign is pairing DSM creatives with non-profit organizations!";
                        ?>
                <a class="fb-share social" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php print urlencode(current_url()); ?>&media=<?php print urlencode(site_url('public/themes/default/images/logo.png')); ?>&description=<?php print utf8_encode($message); ?>">
                    <i class="fa fa-facebook"></i>
                    <span>share</span>
                </a>
            </li>
            <li>
                <a class="twitter-share social" target="_blank" href="https://twitter.com/intent/tweet?url=<?php print urlencode(current_url()); ?>&via=aigaiowa&text=<?php print urlencode($message); ?>">
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
        <ul class="list-unstyled project-details">
            <?php $author = $this->user_model->find_meta_for($project->created_by); ?>
            <?php if(isset($author->website) && $author->website != false) { 
               print "<li>Organization: ".anchor(prep_url($author->website),$author->organization)."</li>";
            } else {
                print "<li>Organization: ".$author->organization."</li>";
            }
            ?>
            <?php if($project->hours && $project->hours != "Help") {?>
                <li>Estimated Hours: <?php print $project->hours;?></li>
            <?php }?>
            <?php 
                if($project->budget == "other") {
                    $project->budget = "$".$project->budget_specify;
                } else if($project->budget != "unknown") {
                    $project->budget = "$".$project->budget;
                }
            ?>
            <li>Materials Budget: <?php print $project->budget ?></li>
            <li>Audience: 
                <div><?php print $project->audience;?></div></li>
            <li>Deadline:<div><?php print $project->deadlines;?></div></li>
            <li>Project Background:
                <div>
                    <?php echo auto_typography($project->body) ?>
                </div>
            </li>
        </ul>
        <?php if(!$project->isClosed && $applications_status) { 
            if(!$current_user || has_permission('Bonfire.ProjectBriefs.Apply')) {
                if(!$current_user || ($current_user->meta->category == "creative" && $valid_applicant)) { ?>
        	       <a href="<?php print site_url('projects/project/'.$project->brief_id.'/apply');?>" class="<?php print $current_user ? 'magnific ' : '';?> btn btn-lg btn-primary">Volunteer for this project! <i class="fa fa-chevron-circle-right"></i></a>
                   <a class="btn btn-link" href="<?php print site_url('projects'); ?>">Find another project</a>
            <?php } //current user & valid applicant
   	        
           } //permission check
        } else { // project is closed ?>
            <?php if(!$applications_status) { ?>
                <?php $date = $this->settings_lib->item('ext.cr_application_start_date'); 
                $date = strtotime($date);
                if($date > strtotime()) { ?>
                  <p>Applications for volunteers will open on <strong><?php echo date("F j",$date); ?>!</strong></p>
                <?php } else { ?>
                  <p>Sorry, applications for volunteers are currently open.</p>
                <?php } ?>
            <?php } else { ?> 
                 <p>Unfortunately, this project has already received many qualified candidates. We encourage you to <?php print anchor("projects","apply for some of our other great opportunities");?></p>
            <?php } ?>
        <?php } ?>


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