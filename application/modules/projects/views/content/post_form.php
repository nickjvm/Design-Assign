 <div class="container" id="main-region">
    <h2 class="title">Edit project</h2>

    <?php echo form_open(current_url()); ?>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('title')) echo 'error'; ?>">
            <label for="title" class="control-label">Project Name</label>
            <input type="text" name="title" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
        </div>

    </div>
    <div class="row">
        <div class="span3">
            <div class="control-group <?php if (form_error('type')) echo 'error'; ?>">
                <label class="control-label" for="type">This project is a ...</label>
                <select class="span3" name="type" id="type">
                    <option  <?php echo isset($post) && $post->type == '' ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->type == 'website' ? 'selected="selected"' : ''?> value="website">Website</option>
                    <option  <?php echo isset($post) && $post->type == 'brochure' ? 'selected="selected"' : ''?> value="brochure">Brochure</option>
                </select>
            </div>
        </div>
        <div class="span2">
            <div class="control-group <?php if (form_error('hours')) echo 'error'; ?>">
                <label for="hours" class="control-label">Estimated Project Hours</label>
                <select name="hours" class="span2 input-xxlarge" id="hours" value="<?php echo isset($post) ? $post->hours : set_value('hours'); ?>">
                    <option  <?php echo isset($post) && $post->hours == '' ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->hours == '0-10' ? 'selected="selected"' : ''?> value="0-10">0-10</option>
                    <option  <?php echo isset($post) && $post->hours == '11-15' ? 'selected="selected"' : ''?> value="11-15">11-15</option>
                    <option  <?php echo isset($post) && $post->hours == '15-30' ? 'selected="selected"' : ''?> value="15-30">15-30</option>
                    <option  <?php echo isset($post) && $post->hours == '30-50' ? 'selected="selected"' : ''?> value="30-50">30-50</option>
                    <option  <?php echo isset($post) && $post->hours == '50+' ? 'selected="selected"' : ''?>value="50+">+50</option>
                    <option value="Unknown">Unknown</option>
                </select>
            </div>
        </div>

        <div class="span3">
            <div class="control-group <?php if (form_error('budget')) echo 'error'; ?>">
                <label for="hours" class="control-label">Estimated Project budget</label>
                <select name="budget" class="span3 input-xxlarge" id="budget" value="<?php echo isset($post) ? $post->budget : set_value('budget'); ?>">
                    <option  <?php echo isset($post) && $post->budget == '' ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->budget == '0' ? 'selected="selected"' : ''?> value="0">$0.00</option>
                    <option  <?php echo isset($post) && $post->budget == '1000' ? 'selected="selected"' : ''?> value="0">$1,000.00</option>
                    <option value="Unknown">Unknown</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('audience')) echo 'error'; ?>">
            <label for="audience" class="control-label">Audience</label>
            <input type="text" id="audience" name="audience" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->audience : set_value('audience'); ?>" />
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('message')) echo 'error'; ?>">
            <label for="message" class="control-label">Message</label>
            <input type="text" id="message" name="message" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->message : set_value('message'); ?>" />
        </div>
    </div>
    <div class="row">    
        <div class="control-group span8 <?php if (form_error('deliverables')) echo 'error'; ?>">
            <label for="deliverables" class="control-label">Final Product/Deliverable</label>
            <input type="text" id="deliverables" name="deliverables" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->deliverables : set_value('deliverables'); ?>" />
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('deadlines')) echo 'error'; ?>">
            <label for="deadlines" class="control-label">Known Deadlines</label>
            <input type="text" id="deadlines" name="deadlines" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->deadlines : set_value('deadlines'); ?>" />
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('goals')) echo 'error'; ?>">
            <label for="goals" class="control-label">Goals of Project</label>
            <input type="text" id="goals" name="goals" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->goals : set_value('goals'); ?>" />
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('body')) echo 'error'; ?>">
            <label for="body" class="control-label">Description</label>
            <div class="controls">
                <textarea name="body" id="body" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
           <!--  <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('body')) echo 'error'; ?>">
                <label for="approved">
                    <input type="checkbox" id="approved" name="approved" value="1" <?php if(isset($post) && $post->approved) { echo "checked"; }?>/>
                    Approved
                </label>
        </div>
    </div>


    <div class="form-actions">
        <input type="submit" name="submit" class="btn btn-primary" value="Save Project" />
        or <a href="<?php echo site_url(SITE_AREA .'/content/projects') ?>">Cancel</a>
    </div>
        
    <?php echo form_close(); ?>
</div>