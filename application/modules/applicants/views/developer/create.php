<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading">Please fix the following errors:</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($applicants))
{
	$applicants = (array) $applicants;
}
$id = isset($applicants['id']) ? $applicants['id'] : '';

?>
<div class="admin-box">
	<h3>Applicants</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('user_id') ? 'error' : ''; ?>">
				<?php echo form_label('User Id'. lang('bf_form_label_required'), 'applicants_user_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='applicants_user_id' type='text' name='applicants_user_id' maxlength="30" value="<?php echo set_value('applicants_user_id', isset($applicants['user_id']) ? $applicants['user_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('user_id'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('project_id') ? 'error' : ''; ?>">
				<?php echo form_label('Project ID'. lang('bf_form_label_required'), 'applicants_project_id', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='applicants_project_id' type='text' name='applicants_project_id' maxlength="30" value="<?php echo set_value('applicants_project_id', isset($applicants['project_id']) ? $applicants['project_id'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('project_id'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('applicants_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/developer/applicants', lang('applicants_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>