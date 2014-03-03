<?php

$validation_errors = validation_errors();
$errorClass = ' error';
$controlClass = 'span6';
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);

?>
<style>
p.already-registered {
    text-align: center;
}
</style>
<div class="container main-content" id="main-region">
<section id="register">
    <h2 class="title"><?php echo lang('us_sign_up'); ?></h2>
    <?php if ($validation_errors) : ?>
	<div class="alert alert-error fade in">
		<?php echo $validation_errors; ?>
	</div>
    <?php endif; ?>

    <div class="row-fluid">
        <div class="span12">
            <?php echo form_open( site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
				<?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                <?php
                // Allow modules to render custom fields
                Events::trigger('render_user_form');
                ?>
                <!-- Start of User Meta -->
                <?php $this->load->view('users/user_meta', array('frontend_only' => true)); ?>
                <!-- End of User Meta -->
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-lg btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_sign_up'); ?>"  />
                        <a class="btn btn-link" href="<?php print base_url();?>">Cancel</a>
                    </div>
                </div>
            <?php echo form_close(); ?>
            <p class='already-registered'>
                <?php echo lang('us_already_registered'); ?>
                <?php echo anchor(LOGIN_URL, lang('bf_action_login')); ?>
            </p>
        </div>
    </div>
</section>
</div>