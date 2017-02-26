<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title" id="helpModalLabel"><?php echo __('help.keyboard_shortcuts'); ?></h2>
        </div>
        <div class="modal-body">
            <h3 class="page-header"><?php echo __('help.sitewide'); ?></h3>
            <dl class="dl-horizontal">
                <dt><kbd>s</kbd></dt>
                <dd><?php echo __('help.focus_search'); ?></dd>
                <dt><kbd>t</kbd></dt>
                <dd><?php echo __('help.site_tour'); ?></dd>
                <dt><kbd>?</kbd></dt>
                <dd><?php echo __('help.display_help'); ?></dd>
            </dl>
            <h3 class="page-header"><?php echo __('help.homepage'); ?></h3>
            <dl class="dl-horizontal">
                <dt><kbd>g</kbd> <kbd>k</kbd></dt>
                <dd><?php echo __('help.go_to'); ?> <?php echo __('site.pkppa'); ?></dd>
                <dt><kbd>g</kbd> <kbd>p</kbd></dt>
                <dd><?php echo __('help.go_to'); ?> <?php echo __('site.pkppap'); ?></dd>
                <dt><kbd>g</kbd> <kbd>o</kbd></dt>
                <dd><?php echo __('help.go_to'); ?> <?php echo __('site.pkppao'); ?></dd>
            </dl>

            <h3 class="page-header"><?php echo __('help.division_slug_list'); ?></h3>
            <dl class="dl-horizontal">
            	<?php if (total_divisions()) : while(divisions()) : ?>
            		<dt><code><?php echo division_slug(); ?></code></dt>
                	<dd><?php echo __('site.' . division_slug()); ?></dd>
            	<?php endwhile; endif; ?>

            </dl>
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
</div>
