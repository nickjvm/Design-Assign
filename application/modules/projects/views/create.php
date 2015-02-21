 <div class="container" id="main-region">

    <div class="row">
        <?php if(!$this->settings_lib->item('ext.np_applications_status')) { ?>
            <div class="span8">
                <div class="alert alert-info">
                    <?php $date = $this->settings_lib->item('ext.np_application_start_date'); ?>
                    Applications for non-profits are not currently open. Check back on <strong><?php echo date('F j',strtotime($date));?>!</strong>
                </div>
            </div>
        <?php } else { ?>
        <div class="span8">
            <h2 class="title">Post a project</h2>

            <?php echo form_open(current_url()); ?>
            <div class="row">
                <div class="control-group span7 <?php if (form_error('title')) echo 'error'; ?>">
                    <label for="title" class="control-label">Project Name</label>
                    <input type="text" name="title" class="span7" value="<?php echo isset($post) ? $post->title : set_value('title'); ?>" />
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
                            <option  <?php echo isset($post) && $post->type == 'Email' || set_select('type', 'Email Template') ? 'selected="selected"' : ''?> value="Email">Email Template</option>
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
                            <input type="text" value="<?php print set_value("type_specify"); ?>"  placeholder="please specify..." class="span3" maxlength="255" name="type_specify"/>
                        </div>

                        <div class="extra hidden email">
                            <input type="text" value="<?php print set_value("email_specify"); ?>"  placeholder="Email client (optional)" class="span3" maxlength="255" name="email_specify"/>
                        </div>
                    </div>
                </div>
                
                <div class="span2">
                    <div class="control-group <?php if (form_error('budget') || form_error('budget_specify')) echo 'error'; ?>">
                        <label for="hours" class="control-label">Estimated Project Budget</label>
                        <select name="budget" class="select-or-other span2" id="budget" value="<?php echo isset($post) ? $post->budget : set_value('budget'); ?>">
                            <option  <?php echo isset($post) && $post->budget == '' || set_select("budget","") ? 'selected="selected"' : ''?> value="">—Select—</option>
                            <option  <?php echo isset($post) && $post->budget == 'unknown' || set_select("budget","unknown") ? 'selected="selected"' : ''?> value="unknown">Unknown</option>
                            <option  <?php echo isset($post) && $post->budget == '0' || set_select("budget","0") ? 'selected="selected"' : ''?> value="0">No funds currently available.</option>
                            <option  <?php echo isset($post) && $post->budget == 'other' || set_select("budget","other") ? 'selected="selected"' : ''?> value="other">Established budget (please specify)</option>
                        </select>
                        <div class="extra hidden">
                            <input type="text" value="<?php print set_value("budget_specify"); ?>" placeholder="please specify..." class="span2" maxlength="10" name="budget_specify"/>
                        </div>
                    </div>
                </div>

            </div>

            <div class="control-group <?php if (form_error('audience')) echo 'error'; ?>">
                <label for="audience" class="control-label">Audience <div class="help-inline">(Who will see the finished product?)</div></label>
                <textarea id="audience" name="audience" class="span7" rows="5"><?php echo isset($post) ? $post->audience : set_value('audience'); ?></textarea>
            </div>

            <div class="control-group <?php if (form_error('message')) echo 'error'; ?>">
                <label for="message" class="control-label">Message <div class="help-inline">(What are you trying to say?)</div></label>
                <input type="text" id="message" name="message" class="span7" value="<?php echo isset($post) ? $post->message : set_value('message'); ?>" />
            </div>
            
            <div class="control-group <?php if (form_error('deliverables')) echo 'error'; ?>">
                <label for="deliverables" class="control-label">Final Product/Deliverable <div class="help-inline">(Would you like the design files? Help with printing?)</div></label>
                <input type="text" id="deliverables" name="deliverables" class="span7" value="<?php echo isset($post) ? $post->deliverables : set_value('deliverables'); ?>" />
            </div>

            <div class="control-group <?php if (form_error('deadlines')) echo 'error'; ?>">
                <label for="deadlines" class="control-label">Known Deadlines <div class="help-inline">(When should this project be completed? Any other dates we need to be aware of?)</div></label>
                <input type="text" id="deadlines" name="deadlines" class="span7" value="<?php echo isset($post) ? $post->deadlines : set_value('deadlines'); ?>" />
                <div class="help"><em>Please remember that all projects should be completed no later than October 1, 2015.</em></div>
            </div>

            <div class="control-group <?php if (form_error('goals')) echo 'error'; ?>">
                <label for="goals" class="control-label">Goals of Project <div class="help-inline">(What are you trying to accomplish?)</div></label>
                <input type="text" id="goals" name="goals" class="span7" value="<?php echo isset($post) ? $post->goals : set_value('goals'); ?>" />
            </div>

            <div class="control-group <?php if (form_error('body')) echo 'error'; ?>">
                <label for="body" class="control-label">Description <div class="help-inline">(Please describe your project request in as much detail as you are able.)</div></label>
                <div class="controls">
                    <textarea name="body" id="body" class="span7" rows="5"><?php echo isset($post) ? $post->body : set_value('body') ?></textarea>
                   <!--  <?php if (form_error('body')) echo '<span class="help-inline">'. form_error('body') .'</span>'; ?> -->

                </div>
            </div>

            <div class="row">
                <div class="span7">
                    <h3>Project Submission Disclaimer</h3>
                    <p>
                        I understand that by submitting this project, I am asking AIGA Iowa’s Design Assign team 
                        to consider it for use with Design Assign 2015. I also understand that AIGA Iowa is not 
                        obligated or required to accept this project, and that I may be asked to further clarify
                        the project details prior to acceptance for completion. Once posted, commitment of the
                        project is subject to available volunteers. 
                    </p>
                    <p>
                        Additionally, I understand that the final deliverable of this project is to 
                        be used (if deemed acceptable), and I will not use this project in 
                        competition for spec work or any other manner where I receive creative work 
                        in a competitive setting before securing fees.
                    </p>
                </div>
            </div>
            <div class="control-group">
                <?php if (form_error('disclaimer')): ?>
                    
                    <div class="row">
                        <div class="alert alert-error span7">
                            Please review and accept the Project Submission Disclaimer terms and conditions.
                        </div>
                    </div>
                <?php endif;?>
                <?php print form_checkbox(array("name"=>"disclaimer","id"=>"disclaimer"),"accept",isset($post) ? $post->disclaimer : set_value('disclaimer'));?>
                <?php print form_label("I have read and understand the Project Submission Disclaimer","disclaimer");?>
            </div>
                <div class="form-actions">
                    <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary">
                        <i class="fa fa-check-circle"></i> Post project
                    </button>
                    <a class="btn btn-link "href="<?php echo base_url() ?>">Cancel</a>
                </div>
            <?php echo form_close(); ?>
        </div>
        <?php /* end applications opn */ } ?>
        <div class="span4">
            <h3>Types of projects</h3>
            <dl>
                <dt>Advertisement</dt>
                <dd>Artwork intended to promote an entity or solicit a call to action. Electronic or printed.</dd>
                <dt>Brochure</dt>
                <dd>Single or multi-page media intended to provide information or advertise a specific topic. Electronic or printed.</dd>

                <dt>Campaign/Event Promotion</dt>
                <dd>Multi-piece project spanning a variety of media over a period of time. Pieces would have a consistent look/feel and message. Final products could include a combination: advertisements, printed invitation, social media images, email template, etc.</dd>

                <dt>Email Template</dt>
                <dd>Design template used to communicate electronically via an email marketing client (ex: MailChimp, Campaign Monitor, iModules, etc.)</dd>

                <dt>Flyer/poster</dt>
                <dd>A piece utilized to promote an entity/event and solicit a call to action. Electronic or printed.</dd>

                <dt>Logo/brand identity</dt>
                <dd>Symbol or design used to represent an entity or idea. When constructed as a brand identity, stationery items are included in the project (business card, letterhead, envelopes). 
                    <em>When a logo or brand identity are requested, additional pieces will often not be approved for a Design Assign project within the same calendar year due to the size of the project.</em></dd>

                <dt>Photography</dt>
                <dd>Visual representation of a person, place or thing. Informal or formal shoots depending on the capabilities of volunteers. Electronic.</dd>

                <dt>Other Printed Materials</dt>
                <dd>A single-use item, typically intended to be printed (ex: invitation, packaging, annual report, etc.)</dd>

                <dt>Social Media</dt>
                <dd>A project pertaining to the wide range of needs for social media platforms (ex: strategy, content development, imagery, etc.)</dd>

                <dt>Video</dt>
                <dd>Conveyance of an idea or message through dynamic visual representation. Final product must be kept short enough to fit within the confines of program timelines.</dd>

                <dt>Website</dt>
                <dd>Online presence of a person, place or thing. Project possibilities include:  
                <ul>
                    <li>Complete overhaul (revision of both the visual elements and the back-end functionality - experience with coding necessary)</li>
                    <li>Aesthetic update (minor visual improvements; no back-end functionality changes - minor experience with code helpful)</li>
                    <li>Updates (minor updates to content, pages, etc.; no back-end functionality or aesthetics - NO experience with coding necessary)</li>
                </ul>
                </dd>
                <dt>Written Content</dt>
                <dd>Expression of ideas and message through the written word (ex: text for brochures, website, invitation, etc.)</dd>
            </dl>
        </div>
    </div>
</div>