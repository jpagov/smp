<?php echo $header; ?>

<?php echo Html::link('admin/divisions/add', __('hierarchy.create_division'), array('class' => 'btn btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.division'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">

		<form class="form-horizontal" role="search">
			<?php echo $search; ?>

		<?php //print_r($divisions); ?>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th><?php echo __('hierarchy.division'); ?></th>
						<th><?php echo __('hierarchy.staff'); ?></th>
						<th><?php echo __('hierarchy.view'); ?></th>
					</tr>
				</thead>
				<tbody>
          <?php if($divisions->count): ?>
           <?php foreach($divisions->results as $division): ?>
             <tr class="status draft">
              <td><?php echo $division->id; ?></td>
              <td><a href="<?php echo Uri::to('admin/divisions/edit/' . $division->id); ?>"><?php echo $division->title; ?></a></td>
              <td><?php echo $division->staff; ?></td>
              <td><?php echo $division->view; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7"><?php echo __('divisions.no_reports'); ?></td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <?php if ($divisions->links()) : ?>
      <ul class="pagination">
       <?php echo $divisions->links(); ?>
     </ul>
   <?php endif; ?>

 </div>

 </form>

</div>
<div class="col col-lg-3">
  <nav class="list-division sidebar">

    <div class="page-header">
      <h2><?php echo $divisions->count; ?> <small>Division</small></h2>
    </div>

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
