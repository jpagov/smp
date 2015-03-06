<?php echo $header; ?>

<?php echo Html::link('admin/tags/add', __('tags.create_tag'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('tags.tags'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo __('tags.tags'); ?></th>
                        <th><?php echo __('tags.slug'); ?></th>
                        <th><?php echo __('tags.date_created'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if($tags->count): ?>
                    <?php foreach($tags->results as $tag): ?>
                    <tr class="status draft">
                        <td><?php echo $tag->id; ?></td>
                        <td><a href="<?php echo Uri::to('admin/tags/edit/' . $tag->id); ?>"><?php echo __($tag->title); ?></a></td>
                        <td><?php echo $tag->slug; ?></td>
                        <td><?php echo $tag->created; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('tags.no_tags'); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($tags->links()) : ?>
        <ul class="pagination">
            <?php echo $tags->links(); ?>
        </ul>
        <?php endif; ?>

        </div>
    </div>
    <div class="col col-lg-3">
        <nav class="list-sector sidebar">

        <?php $relateds = array('divisions', 'branchs', 'sectors', 'units', 'categories', 'tags'); ?>

            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('global.related'); ?></div>
                <div class="list-group">
                <?php foreach ($relateds as $related) : ?>
                <a class="list-group-item <?php if(is_active('admin/' . $related)) echo 'active'; ?>" href="<?php echo Uri::to('admin/' . $related); ?>"><?php echo __('global.' . $related); ?></a>
                 <?php  endforeach; ?>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php echo $footer; ?>
