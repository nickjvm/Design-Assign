<div class="admin-box">
    <h3>New Featured Project</h3>

    <?php echo form_open_multipart(current_url(), 'class="form-horizontal"'); ?>

        <div class="control-group <?php if (form_error('title')) echo 'error'; ?>">
            <label for="title">Title</label>
            <div class="controls">
                <input type="text" name="title" class="input-xxlarge" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
                <?php if (form_error('title')) echo '<span class="help-inline">'. form_error('title') .'</span>'; ?>
            </div>
        </div>
        <div class="control-group">
            <label for="image">Thumbnail</label>
            <div class="controls">
                <?php if(isset($post) && $post->image) { ?>
                    <img src="<?php print img_path().'features/'.$post->image; ?>" width="75" height="75"/>
                <?php } ?>
                <input type="file" name="image" id="image" class="span3" />
            </div>
        </div>
        <div class="control-group">
            <label for="image">Cover Photo</label>
            <div class="controls">

                <?php if(isset($post) && $post->image) { ?>
                    <img src="<?php print img_path().'features/'.$post->slide; ?>" width="175" height="75"/>
                <?php } ?>
                <input type="file" name="slide" id="slide" class="span3" />
            </div>
        </div>
        <div class="control-group <?php if (form_error('slug')) echo 'error'; ?>">
            <label for="slug">Slug</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><?php echo site_url() .'features/' ?></span>
                    <input type="text" name="slug" class="input-xlarge" value="<?php echo isset($post) ? $post->slug : set_value('slug'); ?>" />
                </div>
                <?php if (form_error('slug')) echo '<span class="help-inline">'. form_error('slug') .'</span>'; ?>
                <p class="help-block">The unique URL that this post can be viewed at.</p>
            </div>
        </div>

        <div class="control-group <?php if (form_error('body')) echo 'error'; ?>">
            <label for="body">Content</label>
            <div class="controls">
                <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?>
                <textarea data-location="features" name="body" class="summernote input-xxlarge" rows="15"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
            </div>
        </div>
        <div class="control-group <?php if (form_error('sidebar')) echo 'error'; ?>">
            <label for="sidebar">Sidebar</label>
            <div class="controls">
                <?php if (form_error('sidebar')) echo '<span class="help-inline">'. form_error('sidebar') .'</span>'; ?>
                <textarea data-location="features" name="sidebar" class="summernote input-xxlarge" rows="15"><?php echo isset($post) ? $post->sidebar : set_value('body') ?></textarea>
            </div>
        </div>

        <div class="control-group <?php if (form_error('is_featured')) echo 'error'; ?>">
            <div class="controls">
                
                <?php if (form_error('is_featured')) echo '<span class="help-inline">'. form_error('is_featured') .'</span>'; ?>
               <input type="checkbox" name="is_featured" id="is_featured" value="1" <?php echo isset($post) && $post->is_featured == 1 ? 'checked="checked"' : set_checkbox('is_featured', 1); ?> />
            <label for="is_featured">Is on homepage</label>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-primary" value="Save Post" />
            or <a href="<?php echo site_url(SITE_AREA .'/content/blog') ?>">Cancel</a>
        </div>

    <?php echo form_close(); ?>
</div>