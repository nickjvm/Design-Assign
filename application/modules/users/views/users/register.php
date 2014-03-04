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
                <h2 class="title"><?php echo lang('us_sign_up'); ?></h2>
                <?php if ($validation_errors) : ?>
                <div class="alert alert-error">
                    <?php echo $validation_errors; ?>
                </div>
                <?php endif; ?>
                
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo form_open( site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
                            <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                            <?php
                            // Allow modules to render custom fields
                            Events::trigger('render_user_form', $user );
                            ?>
                            <!-- Start User Meta -->
                            <?php $this->load->view('users/user_meta', array('frontend_only' => true));?>
                            <!-- End of User Meta -->
                           <div class="controls">
                               <input class="btn btn-lg btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_sign_up'); ?>"  />
                               <a class="btn btn-link" href="<?php print base_url();?>">Cancel</a>
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
