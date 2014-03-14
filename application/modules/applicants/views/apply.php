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
				<h4>Project Vounteer Dislcaimer</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex occaecat cupidatat non proident, sunt in culpa. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</p>
				<input type="hidden" name="applicants_user_id" value="<?php print $current_user->id;?>"/>
				<input type="hidden" name="applicants_project_id" value="<?php print $project->brief_id;?>"/>

				<div class="control-group">
					<div class="controls">
						<?php if( form_error("disclaimer")): ?>
						<div class="alert alert-error">
							Please read and accept the Project Volnteer Disclaimer
						</div>
						<?php endif; ?>
						<input type="checkbox" id="disclaimer" name="disclaimer"/>
						<label for="disclaimer">I have read and understand the project submission disclaimer</label>
					</div>
				</div> 

				<div class="form-actions">
					<button type="submit" name="submit" class="ajaxify btn btn-primary btn-lg" value="Submit">Submit <i class="fa fa-chevron-circle-right"></i></button>
					<?php echo anchor('projects/project/'.$project->brief_id, lang('applicants_cancel'), 'class="mfp-cancel btn btn-link"'); ?>
				</div>
			</fieldset>
	    <?php echo form_close(); ?>
