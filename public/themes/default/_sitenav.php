<header>
  <div class="container">
    <div class="row">
        <div class="span3 logo-wrapper">
          <a id="logo" href="<?php echo site_url(); ?>">
                   <?php if (class_exists('Settings_lib')) {?>
                       <img src="<?php print base_url("/themes/default/images/".settings_item('site.logo')); ?>"/>
                   <?php 
                   } else {
                     echo 'Design Assign';  
                   }  ?>
          </a>
        </div><!--
        --><div class="span9 navigation-wrapper">
          <nav role="main-nav">
            <ul class="nav navbar-nav">
                    <li><a <?php echo check_method_arguments('page','who-we-are'); ?> href="<?php echo site_url(); ?>pages/page/who-we-are">Who we are</a></li>
                    <li><a <?php echo check_method_arguments('page','hows-it-work'); ?> href="<?php echo site_url(); ?>pages/page/hows-it-work">How's it work?</a></li>
                    <li><a <?php echo check_class_arguments('projects',''); ?> href="<?php echo site_url(); ?>projects">Find a project</a></li>
                    <li><a <?php echo check_method_arguments('create',''); ?> href="<?php echo site_url(); ?>projects/create">Post a project</a></li>
                    <?php if (empty($current_user)) :?>
                        <li><a href="<?php echo site_url(LOGIN_URL); ?>">Sign In</a></li>
                    <?php else: ?>
                        <li><a <?php echo check_method('profile'); ?> href="<?php echo site_url('/users/profile'); ?>"> <?php e(lang('bf_user_settings')); ?> </a></li>
                        <li><a href="<?php echo site_url('/logout') ?>"><?php e( lang('bf_action_logout')); ?></a></li>
                    <?php endif; ?>
                </ul>
          </nav>
        </div>
      </div>
  </div>
</header>