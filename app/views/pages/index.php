<?php echo $header; ?>

<?php echo Html::link('admin/pages/add', __('pages.create_page'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('pages.pages'); ?></h1>

<?php echo $messages; ?>

<section class="row">
  <div class="col col-lg-9">

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo __('pages.title'); ?></th>
            <th><?php echo __('pages.slug'); ?></th>
            <th><?php echo __('pages.status'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php if($pages->count): foreach($pages->results as $page): ?>
            <tr>
              <td><?php echo $page->id; ?></td>
              <td><a href="<?php echo Uri::to('admin/pages/edit/' . $page->id); ?>" title="<?php echo __('global.' . $page->status); ?>"><?php echo $page->title; ?></a></td>
              <td><?php echo $page->slug; ?></td>
              <td><abbr title="<?php echo Date::format($page->created); ?>"><?php echo __('global.' . $page->status); ?></abbr></td>
            </tr>
          <?php endforeach; else: ?>
          <tr>
            <td colspan="4" class="text-center"><?php echo __('pages.nopages_desc'); ?></td>
          </tr><?php endif; ?>
        </tbody>
      </table>

      <?php if ($pages->links()) : ?>
        <ul class="pagination"><?php echo $pages->links(); ?></ul>
      <?php endif; ?>

    </div>
  </div>

  <div class="col col-lg-3">

    <nav class="list-group sidebar">

      <?php echo Html::link('admin/pages', '<span class="icon"></span> ' . __('global.all'), array(
        'class' => ($status == 'all') ? 'list-group-item active' : 'list-group-item'
        )); ?>

      <?php
      foreach(array('published', 'draft', 'archived') as $type):

        $status_count = Query::table(Base::table('pages'))->where('status', '=', $type)->count();
      ?>
      <?php echo Html::link('admin/pages/status/' . $type, '<span class="icon"></span> ' . __('global.' . $type), array(
        'class' => ($status == $type) ? 'list-group-item active' : 'list-group-item',
        'badge' => $status_count
        )); ?>
      <?php endforeach; ?>
    </nav>

  </div>
</section>

<?php echo $footer; ?>
