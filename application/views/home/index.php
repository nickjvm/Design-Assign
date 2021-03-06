<div id="jumbotron-wrapper">
    <div class="jumbotron">
    	<?php if(isset($features) && $features) { ?>
	    	<?php foreach($features as $feature): ?>
		    	<a href="<?php echo site_url() . 'features/'.$feature->slug; ?>">
			    	<img class="slide" width="1170" height="399" src="<?php print img_path().'features/'.$feature->slide; ?>"/>
			    </a>
			<?php endforeach; ?>
		<?php } ?>
		<?php if($applications_status) { ?>
      <img class="slide" width="1170" height="399" src="<?php print img_path();?>banners/applications-open.png"/  >
      <?php } ?>
      <img class="slide" width="1170" height="399" src="<?php print img_path();?>banners/giving-back.png"/  >
    </div>
  </div>

<div class="container">

	<div class="row-fluid">

		<div class="span8 main-content">
			<div class="call-to-action">
				<span class="fa-stack fa-7x">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
				</span>
				<div class="message">
				  <h4>
				  	Creative volunteers
				  </h4>
				  <p>
				  	Are you a graphic designer, web designer, photographer, copywriter or marketer extraordinnaire? Have some free time that you want to give back to the community?	 	 	 	</p>
				  <a class="btn btn-link pull-right" href="<?php print site_url('projects');?>">
				    Find the right project match<i class="fa fa-chevron-circle-right fa-2x"></i>
				  </a>
				</div>
			</div>
			<div class="call-to-action">
				<span class="fa-stack fa-7x">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-building-o fa-stack-1x fa-inverse"></i>
				</span>
				<div class="message">
				  <h4>
				  	Non-profit organizations
				  </h4>
				  <p>
				  	Is your organization a registered 501(c)3 located in the Des Moines metro? Do you have a shoe string budget with more needs than funding? 	 	 	</p>
				  <a class="btn btn-link pull-right" href="<?php print site_url('projects/create');?>">
				    Submit a project request<i class="fa fa-chevron-circle-right fa-2x"></i>
				  </a>
				</div>
			</div>
			<div class="call-to-action">
				<span class="fa-stack fa-7x">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-question fa-stack-1x fa-inverse"></i>
				</span>
				<div class="message">
				  <h4>
				  	Learn more	  </h4>
				  <p>
				  	Not sure where to go next? Want to learn more about Design Assign and the process?</p>
				  <a class="btn btn-link pull-right" href="<?php print site_url('who-we-are');?>">
				    Learn more about Design Assign<i class="fa fa-chevron-circle-right fa-2x"></i>
				  </a>
				</div>
			</div>
		</div>

		<div class="span4 sidebar">
			<?php Template::block('events', 'events', null, true); ?>

		</div>
	</div>
</div>