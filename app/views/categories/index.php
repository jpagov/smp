<?php echo $header; ?>

<?php echo Html::link('admin/categories/add', __('categories.create_category'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('categories.categories'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo __('categories.categories'); ?></th>
                        <th><?php echo __('categories.slug'); ?></th>
                        <th><?php echo __('categories.redirect'); ?></th>
                        <th><?php echo __('hierarchy.view'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if($categories->count): ?>
                    <?php foreach($categories->results as $category): ?>
                    <tr class="status draft">
                        <td><?php echo $category->id; ?></td>
                        <td><a href="<?php echo Uri::to('admin/categories/edit/' . $category->id); ?>"><?php echo __($category->title); ?></a></td>
                        <td><?php echo $category->slug; ?></td>
                        <td><?php echo $category->redirect; ?></td>
                        <td><?php echo $category->view; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan="7"><?php echo __('hierarchy.no_reports'); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($categories->links()) : ?>
        <ul class="pagination">
            <?php echo $categories->links(); ?>
        </ul>
        <?php endif; ?>

        </div>
    </div>
    <div class="col col-lg-3">
        <nav class="list-sector sidebar">

            <div class="panel panel-default">
                <div class="panel-heading">Related</div>
                <div class="list-group">
                    <?php foreach($hierarchies as $key => $hierarchy): ?>

                        <?php if ( $key.'s' !== basename(Uri::current()) ) : ?>

                        <?php echo Html::link('admin/' . $key . 's', __('hierarchy.' . $key), array('class' => 'list-group-item'
                        )); ?>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php echo $footer; ?>
