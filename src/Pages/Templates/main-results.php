<h2>Search Results</h2>
<div style="display: flex">
    <?php foreach ($this->posts as $by => $posts) { ?>

        <?php $ids = []; foreach ($posts as $post) {
            $ids[] = $post['id'];
        } ?>

        <div class="column">
            <div class="header">
                <form class="replace-form">
                    <input type="hidden" name="action" value="etp-replace-<?php echo $by; ?>">
                    <input type="hidden" name="key" value="<?php echo $key_word; ?>">
                    <input type="hidden" name="post_ids" value="<?php echo implode(',', $ids); ?>">
                    <input type='text' name='replace'>
                    <input type='submit' value='Replace'>
                </form>
                <div><?php echo $by ?></div>
                <div class="header-fields">
                    <div><strong>Post ID</strong></div>
                    <div><strong>Post Data</strong></div>
                </div>
            </div>
            <div class="body">
                <?php foreach ($posts as $post) { ?>
                    <div class="body-fields">
                        <div><?php echo $post['id'] ?></div>
                        <div><?php echo $post['content'] ?></div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>