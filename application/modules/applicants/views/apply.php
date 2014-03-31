	<?php

	$validation_errors = validation_errors();

	

	if (isset($applicants))
	{
		$applicants = (array) $applicants;
	}
	$id = isset($applicants['id']) ? $applicants['id'] : '';

	?>
		<h2 class="title">Count me in for <?php print $project->title;?>!</h2>
		<h4>
			<p>
				If for any reason I decide I cannot commit to this project, I 
				will notify the Design Assign committee.
			</p>
		</h4>

		<?php echo form_open($this->uri->uri_string()); ?>
			<fieldset>
				<h4>Project Volunteer Disclaimer</h4>
				<p>
					By submitting this application, I understand I am volunteering my services pro-bono 
					to complete the project as indicated in the project description. If for any reason I 
					decide I would like to retract my submission because I cannot commit to this project, 
					I will notify the Design Assign committee immediately at <a href="mailto:designassign@aigaiowa.org">designassign@aigaiowa.org</a>.
				</p>
				<input type="hidden" name="applicants_user_id" value="<?php print $current_user->id;?>"/>
				<input type="hidden" name="applicants_project_id" value="<?php print $project->brief_id;?>"/>

				<div class="control-group">
					<div class="controls">
						<?php if( form_error("disclaimer")): ?>
						<div class="alert alert-error">
							Please read and accept the Project Volunteer Disclaimer.
						</div>
						<?php endif; ?>
						<input type="checkbox" id="disclaimer" name="disclaimer"/>
						<label for="disclaimer">I have read and understand the project volunteer disclaimer.</label>
					</div>
				</div> 

				<div class="form-actions">
					<button type="submit" name="submit" class="ajaxify btn btn-primary btn-lg" value="Submit">Submit <i class="fa fa-chevron-circle-right"></i></button>
					<?php echo anchor('projects/project/'.$project->brief_id, lang('applicants_cancel'), 'class="mfp-cancel btn btn-link"'); ?>
				</div>
			</fieldset>
	    <?php echo form_close(); ?>
