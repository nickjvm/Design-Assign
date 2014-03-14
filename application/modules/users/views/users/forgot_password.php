<h2><?php echo lang('us_reset_password'); ?></h2>

<?php if (validation_errors()) : ?>
	<div class="alert alert-error fade in">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>
<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-info fade in">
			<?php echo lang('us_reset_note'); ?>
		</div>




	<?php echo form_open($this->uri->uri_string(), array('autocomplete' => 'off',"class"=>"no-ajax-submit")); ?>

		<div class="control-group <?php echo iif( form_error('email') , 'error'); ?>">
				<input class="span12" placeholder="Email" type="text" name="email" id="email" value="<?php echo set_value('email') ?>" />
		</div>
		<div class="control-group">
		<div class="controls">
				<input class="btn btn-primary btn-lg" type="submit" name="send" value="<?php e(lang('us_send_password')); ?>" />
				<a href="<?php print site_url(); ?>" class="btn btn-link mfp-cancel">Cancel</a>
		</div>
	</div>
<?php echo form_close(); ?>
	</div>
