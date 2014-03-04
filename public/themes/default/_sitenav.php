<header>
  <div class="container">
    <div class="row relative">
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
                    <?php if(!$this->auth->is_logged_in() || has_permission('Bonfire.ProjectBriefs.Create')) { ?>
                     <li><a <?php echo check_method_arguments('create',''); ?> href="<?php echo site_url(); ?>projects/create">Post a project</a></li>
                    <?php } ?>

                </ul>
          </nav>
          <nav role="user-navigation" id="user-nav">
            <ul class="inline">
              <?php if(empty($current_user)) { ?>
                <li><a href="<?php echo site_url(LOGIN_URL);?>">sign in</a> / <a href="<?php echo site_url(REGISTER_URL);?>">sign me up</a></li>
              <?php } else { ?>
                <li>Welcome back, <?php echo anchor(PROFILE_URL,$this->user_model->find_meta_for($current_user->id)->organization); ?>!</li>
                <li><a href="<?php echo site_url("logout");?>">log out</a></li>
              <?php } ?>
              </ul>
          </nav>
        </div>
      </div>
  </div>
</header>