<div class="admin-box">
    <h3>Project Briefs</h3>

    <?php echo form_open(); ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="column-check"><input class="check-all" type="checkbox" /></th>
                    <th>Title</th>
                    <th>Organization</th>
                    <th>Approved</th>
                    <th style="width: 10em">Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5">
                        With selected:
                        <input type="submit" name="approve" class="btn btn-primary" value="Approve">
                        <input type="submit" name="delete" class="btn-danger btn" value="Delete">
                    </td>
                </tr>
            </tfoot>
            <tbody>
            <?php if (isset($briefs) && is_array($briefs)) :?>
                <?php foreach ($briefs as $brief) : ?>
                <tr>
                    <td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $brief->brief_id ?>" /></td>
                    <td>
                        <a href="<?php echo site_url(SITE_AREA .'/content/projects/edit_brief/'. $brief->brief_id) ?>">
                            <?php e($brief->title); ?>
                        </a>
                    </td>
                    <td>
                        <?php if(has_permission('Bonfire.Users.Manage')) { ?>
                            <?php echo anchor('/admin/settings/users/edit/'.$brief->created_by,$brief->organization); ?>
                            <?php } else { 
                                echo $brief->organization;
                            }?>
                    </td>
                    <td>
                        <?php echo $brief->approved ? "<i class='icon-ok'></i>" : ""; ?>
                    </td>
                    <td>
                        <?php $phpdate = strtotime($brief->created_on); ?>
                        <?php echo date('M j, Y g:ia',$phpdate); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">
                        <br/>
                        <div class="alert alert-warning">
                            No Projects found.
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    <?php echo form_close(); ?>
</div>
