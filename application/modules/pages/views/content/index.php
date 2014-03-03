<div class="admin-box">
    <h3>Site Pages</h3>

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
            <?php if (isset($pages) && is_array($pages)) :?>
                <?php foreach ($pages as $page) : ?>
                <tr>
                    <td><input type="checkbox" name="checked[]" value="<?php echo $page->page_id ?>" /></td>
                    <td>
                        <a href="<?php echo site_url(SITE_AREA .'/content/pages/edit/'. $page->page_id) ?>">
                            <?php e($page->title); ?>
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
                            No Posts found.
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    <?php echo form_close(); ?>
</div>
