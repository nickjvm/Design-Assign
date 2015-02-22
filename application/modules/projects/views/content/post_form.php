 <div class="container" id="main-region">
    <?php echo form_open(current_url()); ?>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('title')) echo 'error'; ?>">
            <label for="title" class="control-label">Project Name</label>
            <input type="text" name="title" class="span8 input-xxlarge" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
        </div>

    </div>
    <div class="row">
        <div class="span3">
            <div class="control-group <?php if (form_error('type') || form_error('type_specify')) echo 'error'; ?>">
                <label class="control-label" for="type">This project is a(n) ...</label>
                <select data-specify="email" class="select-or-other span3" name="type" id="type">
                    <option  <?php echo isset($post) && $post->type == '' ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->type == 'Advertisement' || set_select('type', 'Advertisement') ? 'selected="selected"' : ''?> value="Advertisement">Advertisement</option>
                    <option  <?php echo isset($post) && $post->type == 'Brochure' || set_select('type', 'Brochure') ? 'selected="selected"' : ''?> value="Brochure">Brochure</option>
                    <option  <?php echo isset($post) && $post->type == 'Campaign' || set_select('type', 'Campaign') ? 'selected="selected"' : ''?> value="Campaign">Campaign (includes a similar look and feel across media types)</option>
                    <option  <?php echo isset($post) && $post->type == 'Email' || set_select('type', 'Email') ? 'selected="selected"' : ''?> value="Email">Email Template</option>
                    <option  <?php echo isset($post) && $post->type == 'Flier' || set_select('type', 'Flier') ? 'selected="selected"' : ''?> value="Flier">Flier</option>
                    <option  <?php echo isset($post) && $post->type == 'Logo' || set_select('type', 'Logo') ? 'selected="selected"' : ''?> value="Logo">Logo</option>
                    <option  <?php echo isset($post) && $post->type == 'Photography' || set_select('type', 'Photography') ? 'selected="selected"' : ''?> value="Photography">Photography</option>
                    <option  <?php echo isset($post) && $post->type == 'Printed Material/Piece' || set_select('type', 'Printed Material/Piece') ? 'selected="selected"' : ''?> value="Printed">Printed Material/Piece</option>
                    <option  <?php echo isset($post) && $post->type == 'Social Media Elements' || set_select('type', 'Social Media Elements') ? 'selected="selected"' : ''?> value="Social Media Elements">Social Media Elements</option>
                    <option  <?php echo isset($post) && $post->type == 'Video' || set_select('type', 'Video') ? 'selected="selected"' : ''?> value="Video">Video</option>
                    <option  <?php echo isset($post) && $post->type == 'Website' || set_select('type', 'Website') ? 'selected="selected"' : ''?> value="Website">Website</option>
                    <option  <?php echo isset($post) && $post->type == 'Written Content' || set_select('type', 'Written Content') ? 'selected="selected"' : ''?> value="Written Content">Written Content</option>
                    <option  <?php echo isset($post) && $post->type == 'Help' || set_select('type', 'Help') ? 'selected="selected"' : ''?> value="Help">I need help establishing a project type.</option>
                    <option  <?php echo isset($post) && $post->type == 'other' || set_select('type', 'other') ? 'selected="selected"' : ''?> value="other">Other (please specify)</option>
                </select>
                <div class="extra hidden">
                    <input type="text" value="<?php print set_value("type_specify",$post->type_specify); ?>"  placeholder="please specify..." class="span3" maxlength="255" name="type_specify"/>
                </div>
                <div class="extra hidden email">
                    <input type="text" value="<?php print set_value("email_specify",$post->email_specify); ?>"  placeholder="Email client (optional)" class="span3" maxlength="255" name="email_specify"/>
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="control-group <?php if (form_error('budget') || form_error('budget_specify')) echo 'error'; ?>">
                <label for="hours" class="control-label">Estimated Project Budget</label>
                <select name="budget" class="select-or-other span3 input-xxlarge" id="budget" value="<?php echo isset($post) ? $post->budget : set_value('budget'); ?>">
                    <option  <?php echo isset($post) && $post->budget == '' || set_select("budget","") ? 'selected="selected"' : ''?> value="">—Select—</option>
                    <option  <?php echo isset($post) && $post->budget == 'unknown' || set_select("budget","unknown") ? 'selected="selected"' : ''?> value="unknown">Unknown</option>
                    <option  <?php echo isset($post) && $post->budget == '0' || set_select("budget","0") ? 'selected="selected"' : ''?> value="0">No funds currently available.</option>
                    <option  <?php echo isset($post) && $post->budget == 'other' || set_select("budget","other") ? 'selected="selected"' : ''?> value="other">Established budget (please specify)</option>
                    <option value="Unknown">Unknown</option>
                </select>
                <div class="extra hidden">
                    <input type="text" value="<?php print set_value("budget_specify",$post->budget_specify); ?>" placeholder="please specify..." class="span3" maxlength="10" name="budget_specify"/>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('audience')) echo 'error'; ?>">
            <label for="audience" class="control-label">Audience <div class="help-inline">(Who will see the finished product?)</div></label>
            <textarea type="text" id="audience" name="audience" rows="5" class="span8 input-xxlarge"><?php echo isset($post) ? $post->audience : set_value('audience'); ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8<?php if (form_error('message')) echo 'error'; ?>">
            <label for="message" class="control-label">Message <div class="help-inline">(What are you trying to say?)</div></label>
            <textarea id="message" name="message" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->message : set_value('message'); ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8<?php if (form_error('deliverables')) echo 'error'; ?>">
            <label for="deliverables" class="control-label">Final Product/Deliverable <div class="help-inline">(Would you like the design files? Help with printing?)</div></label>
            <textarea id="deliverables" name="deliverables" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->deliverables : set_value('deliverables'); ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8<?php if (form_error('deadlines')) echo 'error'; ?>">
            <label for="deadlines" class="control-label">Known Deadlines <div class="help-inline">(When should this project be completed? Any other dates we need to be aware of?)</div></label>
            <textarea id="deadlines" name="deadlines" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->deadlines : set_value('deadlines'); ?></textarea>
            <div class="help">Please remember that all projects should be completed no later than October 1, 2014.</div>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8<?php if (form_error('goals')) echo 'error'; ?>">
            <label for="goals" class="control-label">Goals of Project <div class="help-inline">(What are you trying to accomplish?)</div></label>
            <textarea id="goals" name="goals" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->goals : set_value('goals'); ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8<?php if (form_error('body')) echo 'error'; ?>">
            <label for="body" class="control-label">Description <div class="help-inline">(Please describe your project request in as much detail as you are able.)</div></label>
            <div class="controls">
                <textarea name="body" id="body" class="span8 input-xxlarge" rows="5"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
               <!--  <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?> -->

            </div>
        </div>
    </div>
    <div class="row">
        <div class="control-group span8 <?php if (form_error('body')) echo 'error'; ?>">
            <ul class="list-unstyled form-list">
                <li>
                    <label for="approved">
                        <input type="checkbox" id="approved" name="approved" value="1" <?php if(isset($post) && $post->approved) { echo "checked"; }?>/>
                        Approved
                    </label>
                </li>
                <li>
                    <label for="isClosed">
                        <input type="checkbox" id="isClosed" name="isClosed" value="1" <?php if(isset($post) && $post->isClosed) { echo "checked"; }?>/>
                        Applications Closed
                    </label>
                </li>
            </ul>
        </div>
    </div>


    <div class="form-actions">
        <input type="submit" name="submit" class="btn btn-primary" value="Save Project" />
        or <a href="<?php echo site_url(SITE_AREA .'/content/projects') ?>">Cancel</a>
    </div>
        
    <?php echo form_close(); ?>
</div>