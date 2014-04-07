		<?php foreach ($meta_fields as $field):?>
			<?php if (isset($field['wrapper_class'])): ?>
				<div class="<?php print $field['wrapper_class']; ?>">
			<?php endif; ?>
			<?php if ((isset($field['admin_only']) && $field['admin_only'] === TRUE && isset($current_user) && $current_user->role_id == 1)
						|| !isset($field['admin_only']) || $field['admin_only'] === FALSE): ?>
			<?php
			if (!isset($frontend_only) || ($frontend_only === TRUE && (!isset($field['frontend']) || $field['frontend'] === TRUE))):

				if ($field['form_detail']['type'] == 'dropdown'):

					echo form_dropdown($field['form_detail']['settings'], $field['form_detail']['options'], set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : ''), $field['label']);


			elseif ($field['form_detail']['type'] == 'checkbox' || $field['form_detail']['type'] == 'radio'): ?>
				<?php if(($field['admin_only'] || !isset($is_register) || $is_register === TRUE) && (!isset($field['register_only']) || $field['register_only'] === TRUE )) { ?>
					<div class="control-group control-group-radio <?php echo iif( form_error($field['name']) , 'error'); ?>">
						<span class="control-label faux"><?php echo $field['label'];?></span>
						<div class="controls">
							<?php 
								$form_method = 'form_' . $field['form_detail']['type'];
							?>
							<ul class="form-list list-unstyled">
							<?php foreach($field['form_detail']['options'] as $option):
							$checked = ($option['value'] == set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : '')) ? TRUE : FALSE;
							$option['settings']['name'] = $field['name'];
									echo "<li>";
									echo $form_method($option['settings'], $option['value'], $checked);
									echo form_label($option['settings']['label'], $option['settings']['id']);
									echo "</li>";
								endforeach;
							?>
						</ul>
						</div>
					</div>
				<?php } else {
					print form_hidden($field['name'],$user->$field['name']);
				} ?>


			<?php elseif ($field['form_detail']['type'] == 'state_select' && is_callable('state_select')) : ?>

				<div class="control-group <?php echo iif( form_error($field['name']) , 'error'); ?>">
						<label class="control-label" for="<?php echo $field['name'] ?>"><?php echo lang('user_meta_state'); ?></label>
						<div class="controls">

							<?php echo state_select(set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : 'IA'), 'IA', 'US', $field['name'], $field['form_detail']['settings']['class'].' chzn-select'); ?>

						</div>
					</div>

				<?php elseif ($field['form_detail']['type'] == 'country_select' && is_callable('country_select')) : ?>

					<div class="control-group <?php echo iif( form_error('country') , 'error'); ?>">
						<label class="control-label" for="country"><?php echo lang('user_meta_country'); ?></label>
						<div class="controls">
							<?php echo country_select(set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : 'US'), 'US', 'country', 'span6 chzn-select'); ?>

						</div>
					</div>
				<?php elseif ($field['form_detail']['type'] == 'textarea') : ?>

					<div class="control-group <?php echo iif( form_error($field['name']) , 'error'); ?>">
							<label class="control-label" for="<?php echo $field['name'] ?>"><?php print $field['label']; ?></label>
							<div class="controls">
								<?php echo form_textarea(
									array(
						              'name'        => $field['name'],
						              'id'          => $field['name'],
						              'value'       => set_value($field['name'], $user->$field['name']),
						              'rows' 		=> 3,
						              'class' 		=> $field['form_detail']['settings']['class']
						            )); ?>

							</div>
						</div>

					<?php elseif ($field['form_detail']['type'] == 'country_select' && is_callable('country_select')) : ?>

						<div class="control-group <?php echo iif( form_error('country') , 'error'); ?>">
							<label class="control-label" for="country"><?php echo lang('user_meta_country'); ?></label>
							<div class="controls">
								<?php echo country_select(set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : 'US'), 'US', 'country', 'span6 chzn-select'); ?>

							</div>
						</div>

				<?php else:


					$form_method = 'form_' . $field['form_detail']['type'];
					if (is_callable($form_method))
					{
						echo $form_method($field['form_detail']['settings'], set_value($field['name'], isset($user->$field['name']) ? $user->$field['name'] : ''), $field['label']);
					}


				endif;
			endif;
			?>
			<?php endif;?>
			<?php if (isset($field['wrapper_class'])): ?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
