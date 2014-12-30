<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title" id="helpModalLabel"><?php echo __('site.keyboard_shortcuts', 'Keyboard Shortcuts'); ?></h2>
        </div>
        <div class="modal-body">
            <h3 class="page-header">Site wide shortcuts</h3>
            <dl class="dl-horizontal">
                <dt><kbd>h</kbd></dt>
                <dd>Focus command bar, search all staffs</dd>
                <dt><kbd>shift ?</kbd></dt>
                <dd>Bring up this help dialog</dd>
            </dl>

            <h3 class="page-header">Advanced Search (example)</h3>
            <dl class="dl-horizontal">
                <dt><kbd>division:slug</kbd></dt>
                <dd>Search all staffs in slug division <span class="text-muted">E.g</span>: <code>division:bpm hariadi</code></dd>
                <dt><kbd>bahagian:slug</kbd></dt>
                <dd>Alias <kbd>division:slug</kbd></dd>
                <dt><kbd>branch:slug</kbd></dt>
                <dd>Search all staffs in slug branch</dd>
            </dl>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
        </div>
    </div><!-- /.modal-content -->
</div>
