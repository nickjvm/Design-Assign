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
                <!-- <div class="alert alert-error">
                    <?php echo $validation_errors; ?>
                </div> -->
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
                        <p class='already-registered pull-right'>
                            <?php echo lang('us_already_registered'); ?>
                            <?php echo anchor(LOGIN_URL, lang('bf_action_login'),"class='magnific'"); ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <aside class="span4">
            <h3>how we match teams</h3>
            <p>After applications close for creative volunteers on May 30, Design Assign committee 
                members will meet to review all applications. Teams are made by determining the best 
                fit based on application data. We encourage creatives to volunteer for more than one 
                project. Creatives will not be matched on more than one project unless specially 
                arranged with Design Assign.
            </p>
        </aside>

    </div>
</div>
