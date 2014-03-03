<div class="admin-box">
    <h3>Project Briefs</h3>

    <?php echo form_open(); ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="column-check"><input class="check-all" type="checkbox" /></th>
                    <th>Title</th>
                    <th style="width: 10em">Date</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        With selected:
                        <input type="submit" name="submit" class="btn" value="Delete">
                    </td>
                </tr>
            </tfoot>
            <tbody>
            <?php if (isset($briefs) && is_array($briefs)) :?>
                <?php foreach ($briefs as $brief) : ?>
                <tr>
                    <td><input type="checkbox" name="checked[]" value="<?php echo $brief->brief_id ?>" /></td>
                    <td>
                        <a href="<?php echo site_url(SITE_AREA .'/content/projects/edit_brief/'. $brief->brief_id) ?>">
                            <?php e($brief->title); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo date('M j, Y g:ia'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">
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
