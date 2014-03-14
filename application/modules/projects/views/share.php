
	
	
	<?php if(!isset($email_sent) || !$email_sent): ?>
	<h3>Share this project</h3>
		<?php
	        echo Template::message();
		?>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal row-fluid"'); ?>
		<fieldset>
			<div class="control-group">
			    <label class="control-label" for="inputEmail">From</label>
			    <div class="controls">
			      <span class="faux-input">
			      	<?php print $current_user->email;?>
			      </span>
			    </div>
			  </div>
			<div class="control-group <?php echo form_error('share_to') ? 'error' : ''; ?>">
				<?php echo form_label('To', 'share_to', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='share_to' placeholder="email@example.com" type='email' name='share_to' value="<?php echo set_value('share_to'); ?>" />
				</div>
			</div>
			<div class="control-group <?php echo form_error('share_message') ? 'error' : ''; ?>">
				<?php echo form_label('Your message', 'share_message', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<textarea rows="5" id='share_message' name='share_message' class="span10"><?php 
					if(set_value('share_message')) {
						echo set_value('share_message'); 
					} else { ?>Hey, I thought you might be interested in volunteering for this project - check it out!<?php } ?>
					</textarea>
					<span class="help-block">Add a custom message. We will include a URL to this project for you.</span>
				</div>
			</div>
			<div class="form-actions">
				<input type="submit" name="share" class="btn btn-lg btn-primary" value="Share!"  />
				<a class="mfp-cancel btn btn-link">cancel</a>				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
<?php else: ?>
	<h3>Thanks for spreading the word!</h3>
		<p>Your email has been sent to <?php e($email_sent); ?></p>
		<div class="form-actions">
			<a class="btn btn-lg btn-primary mfp-cancel">Ok, thanks!</a>
		</div>
	<?php endif;?>