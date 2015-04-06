<header>
  <div class="container">
    <div class="relative navbar">
        <!--
        --><div class="navigation-wrapper">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="fa fa-bars fa-2x"></i>
                  </button>
            <a id="logo" class="brand" href="<?php echo site_url(); ?>">
                     <?php if (class_exists('Settings_lib')) {?>
                         <img src="<?php print base_url("/themes/default/images/".settings_item('site.logo')); ?>"/>
                     <?php 
                     } else {
                       echo 'Design Assign';  
                     }  ?>
            </a>
          <nav role="main-nav" class="nav-collapse collapse">

            <ul class="nav navbar-nav">
                    <li><a <?php echo check_method_arguments('page','who-we-are'); ?> href="<?php echo site_url(); ?>who-we-are">Who we are</a></li>
                    <li><a <?php echo check_method_arguments('page','hows-it-work'); ?> href="<?php echo site_url(); ?>hows-it-work">How's it work?</a></li>
                    <li><a <?php echo check_class_arguments('projects',''); ?> href="<?php echo site_url(); ?>projects">Find a project</a></li>
                    <?php if($this->settings_lib->item('ext.np_applications_status') && (!$this->auth->is_logged_in() || has_permission('Bonfire.ProjectBriefs.Create'))) { ?>
                     <li><a <?php echo check_method_arguments('create',''); ?> href="<?php echo site_url(); ?>projects/create">Post a project</a></li>
                    <li><a <?php echo check_method_arguments('features',''); ?> href="<?php echo site_url(); ?>features">Featured projects</a></li>
                    <?php } ?>

                </ul>
          </nav>
          <nav role="user-navigation" id="user-nav">
            <ul class="inline">
              <?php if(empty($current_user)) { ?>
                <li><a class='magnific' href="<?php echo site_url(LOGIN_URL);?>">sign in</a> / <a href="<?php echo site_url(REGISTER_URL);?>">sign me up</a></li>
              <?php } else { ?>
                <?php if($current_user->meta->category == "creative"): ?>
                  <li>Welcome back, <?php echo anchor(PROFILE_URL,$current_user->meta->first_name); ?>!</li>
                <?php else: ?>
                  <li>Welcome back, <?php echo anchor(PROFILE_URL,$current_user->meta->organization); ?>!</li>
                <?php endif; ?>
                <?php if(has_permission('Site.Content.View')): ?>
                  <li><a href="<?php print site_urL(SITE_AREA); ?>">admin</a></li>
                <?php endif;?>
                <li><a href="<?php echo site_url("logout");?>">log out</a></li>
              <?php } ?>
              </ul>
          </nav>
        </div>
      </div>
  </div>
</header>