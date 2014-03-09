<?php

$validation_errors = validation_errors();
$errorClass = ' error';
$controlClass = 'span6';
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);

?>
<div class="container" id="main-region">
    <div class="row-fluid">
        <div class="main-content span8" >

            <section id="profile" class="">
            	<h2 class="title"><?php echo lang('us_edit_profile'); ?></h2>
                <?php if ($validation_errors) : ?>
                <div class="alert alert-error">
                    <?php echo $validation_errors; ?>
                </div>
                <?php endif; ?>
                <?php if (isset($user) && $user->role_name == 'Banned') : ?>
                <div data-dismiss="alert" class="alert alert-error">
                    <?php echo lang('us_banned_admin_note'); ?>
                </div>
                <?php endif; ?>

                <div class="row-fluid">
                	<div class="span12">
                        <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal', 'autocomplete' => 'off')); ?>
                            <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                            <?php
                            // Allow modules to render custom fields
                            Events::trigger('render_user_form', $user );
                            ?>
                            <!-- Start User Meta -->
                            <?php $this->load->view('users/user_meta', array('frontend_only' => true));?>
                            <!-- End of User Meta -->
                            <div class="controls">
                                <input type="submit" name="save" class="btn btn-lg btn-primary" value="<?php echo lang('us_action_save'); ?>" />
                                <?php echo anchor('/', lang('bf_action_cancel'),array('class'=>'btn btn-link')); ?>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </section>
        </div>

        <aside class="span4">
            <h3>how we match teams</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt  ut labore et dolore magna aliqua. Ut enim ad 
            inim veniam, quis nostrud exercitation ullamco 
            aboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate 
            velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, 
            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </aside>

    </div>
</div>