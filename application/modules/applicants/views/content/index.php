<?php

$can_delete	= $this->auth->has_permission('Applicants.Content.Delete');
$can_edit		= $this->auth->has_permission('Applicants.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

$can_manage_users = $this->auth->has_permission('Bonfire.Users.Manage');
$num_columns	= $can_edit ? 5 : 4;

?>
<div>
	<h3>Applicants</h3>
	<ul class="nav nav-tabs">
		<li<?php echo $filter_type == 'all' ? ' class="active"' : ''; ?>><?php echo anchor($index_url, 'All Applicants'); ?></li>
		<li class="<?php echo $filter_type == 'brief_id' ? 'active ' : ''; ?>dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php
				echo "By Project"
				?>
				<span class="caret light-caret"></span>
			</a>
			<ul class="dropdown-menu">
				<?php 
					foreach ($projects as $project){ 
						if($project->has_applicants) { ?>
							<li><?php echo anchor($index_url . 'index/brief_id-' . $project->brief_id, $project->title." - ".$project->organization); ?></li>
						<?php }
					}
				?>
			</ul>
		</li>
	</ul>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Name</th>
					<th>Project Title</th>
					<th>Organization</th>
					<?php if($can_edit) { ?>
						<th>Actions</th>
					<?php } ?>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('applicants_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->id; ?>" /></td>
					<?php endif;?>
					<?php $user = $this->user_model->find_user_and_meta($record->user_id); ?>
				<?php if ($can_edit) : ?>
					<td>
						<?php if($can_manage_users) { ?>
							<?php echo anchor(SITE_AREA . '/settings/users/edit/' . $user->id,  $user->first_name." ".$user->last_name); ?></td>
						<?php } else { ?>
							<?php echo $user->first_name." ".$user->last_name; ?>
						<?php } ?>
					</td>
				<?php else : ?>
					<td><?php e($record->user_id); ?></td>
				<?php endif; ?>
					<td><?php e($record->project->title) ?></td>
					<td><?php e($record->organization) ?></td>
					<?php if($can_edit) { ?>
						<td><?php echo anchor(SITE_AREA . '/content/applicants/edit/' . $record->id,  'edit'); ?></td>
					<?php } ?>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">No records found that match your selection.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>