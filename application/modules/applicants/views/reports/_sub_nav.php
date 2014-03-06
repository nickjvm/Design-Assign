<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/applicants') ?>" id="list"><?php echo lang('applicants_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Applicants.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/applicants/create') ?>" id="create_new"><?php echo lang('applicants_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>