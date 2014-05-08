<?php echo $header; ?>

<?php echo Html::link('admin/setting/fields/add', __('extend.create_field'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('extend.fields'); ?></h1>

<?php echo $messages; ?>

<div class="row">
  <div class="col col-lg-9">

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo __('extend.label'); ?></th>
            <th><?php echo __('extend.type'); ?></th>
            <th><?php echo __('extend.fields'); ?></th>
          </tr>
        </thead>
        <tbody>
        <?php if(count($extend->results)): ?>
          <?php foreach($extend->results as $field): ?>
          <tr class="status draft">
            <td><?php echo $field->id; ?></td>
            <td><a href="<?php echo Uri::to('admin/setting/fields/edit/' . $field->id); ?>" title=""><?php echo $field->label; ?></a></td>
            <td><?php echo $field->type; ?></td>
            <td><?php echo $field->field; ?></td>
          </tr>
          <?php endforeach; ?>
          <?php else: ?>
            <tr><?php echo __('extend.nofields_desc'); ?></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <?php if ($extend->links()) : ?>
        <ul class="pagination">
         <?php echo $extend->links(); ?>
       </ul>
     <?php endif; ?>

    </div>

  </div>
</div>

<?php echo $footer; ?>
