<?php echo $header; ?>

<?php echo Html::link('admin/units', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.add', 'unit'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">
        <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/units/edit/' . $unit->id); ?>" novalidate autocomplete="off" enctype="multipart/form-data">

            <input name="token" type="hidden" value="<?php echo $token; ?>">

            <fieldset>
                <legend><?php echo __('hierarchy.detail'); ?></legend>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="title"><?php echo __('hierarchy.title'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::text('title', Input::previous('title', $unit->title), array(
                        'class' => 'form-control',
                        'id' => 'title',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="description"><?php echo __('hierarchy.description'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::textarea('description', Input::previous('description', $unit->description), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="slug"><?php echo __('hierarchy.slug'); ?></label>
                  <div class="col-lg-6">
                    <?php echo Form::text('slug', Input::previous('slug', $unit->slug), array(
                        'class' => 'form-control',
                        'id' => 'slug',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="sort"><?php echo __('hierarchy.sort'); ?></label>
                  <div class="col-lg-2">
                    <?php echo Form::text('sort', Input::previous('sort', $unit->sort), array(
                        'class' => 'form-control',
                        'id' => 'sort',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <?php echo Form::button(__('global.save'), array(
                      'type' => 'submit',
                      'class' => 'btn btn-primary'
                    )); ?>

                    <?php echo Html::link('admin/units/delete/' . $unit->id, __('global.delete'), array(
                    'class' => 'btn btn-danger delete'
                  )); ?>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

    <div class="col-md-3">
    	<div class="panel panel-default">
			<div class="panel-heading">Statistik</div>
			<div class="panel-body">Jumlah pegawai di bawah <b><?php echo $unit->title ?></b> mengikut bahagian</div>

			<?php if ($staffs):  ?>
			<div class="list-group">
				<?php foreach ($staffs as $staff) : ?>
				<a href="<?php echo Uri::to('admin/staffs?term=unit:' .  $unit->slug . '+division:' . $staff->slug); ?>" class="list-group-item">
				<span class="badge"><?php echo $staff->total; ?></span>
				<?php echo __('site.'. $staff->slug); ?>
				</a>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
				<p>Tiada pegawai. <?php echo Html::link('admin/units/delete/' . $unit->id, __('global.delete'), array(
                    'class' => 'btn btn-xs btn-danger delete'
                  )); ?></p>
			<?php endif; ?>
    	</div>

    	<?php if ($staffs): ?>
    	<div class="panel panel-warning">
			<div class="panel-heading">Migrasi</div>
			<div class="panel-body">
				<form method="post" action="<?php echo Uri::to('admin/units/transfer'); ?>" novalidate autocomplete="off">
					<input name="token" type="hidden" value="<?php echo $token; ?>">
					<div class="form-group">
						<label class="control-label" for="gender"><?php echo __('hierarchy.transfer'); ?></label>
						<?php echo Form::select('unit', $units, $unit->id, array('class' => 'form-control input-sm', 'id' => 'gender',
						)); ?>
					</div>
					<?php echo Form::hidden('current', $unit->id);  ?>

					<?php if ($editor->role == 'administrator'): ?>
					 <div class="form-group">
					 	<label>
						<?php echo Form::checkbox('destroy', 1, true, array('id' => 'destroy',
						)); ?> <?php echo __('hierarchy.destroy_this'); ?>
						</label>
					</div>


					<?php if ($staffs): foreach ($staffs as $staff) : ?>
					<div class="checkbox">
						<label>
							<?php echo Form::checkbox('divisions[]', $staff->id, true, array('id' => 'destroy',
							)); ?> <?php echo __('site.'. $staff->slug); ?>
						</label>
					</div>
					<?php endforeach; endif; ?>
					<?php else: ?>
						<?php echo Form::hidden('divisions[]', $editor->roles[0]);  ?>
					<?php endif; ?>

					<button type="submit" class="btn btn-primary">Transfer</button>
				</form>
			</div>
		</div>
		<?php endif; ?>
		</div>

</div>

<?php echo $footer; ?>
