 <div class="admin-box">
    <h3>New Project Brief</h3>

    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

        <div class="control-group <?php if (form_error('title')) echo 'error'; ?>">
            <label for="title">Title</label>
            <div class="controls">
                <input type="text" name="title" class="input-xxlarge" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
                <?php if (form_error('title')) echo '<span class="help-inline">'. form_error('title') .'</span>'; ?>
            </div>
        </div>



        <div class="control-group <?php if (form_error('hours')) echo 'error'; ?>">
            <label for="hours">Estimated Project Hours</label>
            <div class="controls">
                <select name="hours" class="input-xxlarge" value="<?php echo isset($post) ? $post->hours : set_value('hours'); ?>">
                    <option  <?php echo isset($post) && $post->hours == '' ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->hours == '0-10' ? 'selected="selected"' : ''?> value="0-10">0-10</option>
                    <option  <?php echo isset($post) && $post->hours == '11-15' ? 'selected="selected"' : ''?> value="11-15">11-15</option>
                    <option  <?php echo isset($post) && $post->hours == '15-30' ? 'selected="selected"' : ''?> value="15-30">15-30</option>
                    <option  <?php echo isset($post) && $post->hours == '30-50' ? 'selected="selected"' : ''?> value="30-50">30-50</option>
                    <option  <?php echo isset($post) && $post->hours == '50+' ? 'selected="selected"' : ''?>value="50+">+50</option>
                    <option value="Unknown">Unknown</option>
                </select>
                <?php if (form_error('hours')) echo '<span class="help-inline">'. form_error('hours') .'</span>'; ?>
            </div>
        </div>

        <div class="control-group <?php if (form_error('body')) echo 'error'; ?>">
            <label for="body">Content</label>
            <div class="controls">
                <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?>
                <textarea name="body" class="input-xxlarge" rows="15"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-primary" value="Save Post" />
            or <a href="<?php echo site_url(SITE_AREA .'/content/blog') ?>">Cancel</a>
        </div>

    <?php echo form_close(); ?>
</div>