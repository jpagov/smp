<?php echo $header; ?>

<?php echo Html::link('admin/divisions', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.add', 'Division'); ?></h1>

<?php echo $messages; ?>

<div class="row">
	<div class="col-lg-9">

		<form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/divisions/edit/' . $division->id); ?>" novalidate enctype="multipart/form-data">

			<input name="token" type="hidden" value="<?php echo $token; ?>">

			<fieldset>
				<legend><?php echo __('hierarchy.detail'); ?></legend>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="title"><?php echo __('hierarchy.title'); ?></label>
					<div class="col-lg-9">
					<?php echo Form::text('title', Input::previous('title', $division->title), array(
						'class' => 'form-control',
						'id' => 'title',
						)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="description"><?php echo __('hierarchy.description'); ?></label>
					<div class="col-lg-9">
						<?php echo Form::textarea('description', Input::previous('description', $division->description), array(
							'rows' => 3,
							'class' => 'form-control',
							'id' => 'description'
							)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="slug"><?php echo __('hierarchy.slug'); ?></label>
					<div class="col-lg-6">
					<?php echo Form::text('slug', Input::previous('slug', $division->slug), array(
							'class' => 'form-control',
							'id' => 'slug',
							)); ?>
					</div>
				</div>

				<div class="form-group">
		          <label class="col-lg-3 control-label" for="order"><?php echo __('hierarchy.order'); ?></label>
		          <div class="col-lg-2">
		            <?php echo Form::text('order', Input::previous('order', $division->order), array(
		                'class' => 'form-control',
		                'id' => 'order',
		            )); ?>
		          </div>
		        </div>

        		<div class="form-group">
					<label class="col-lg-3 control-label" for="street"><?php echo __('hierarchy.street'); ?></label>
					<div class="col-lg-9">
					<?php echo Form::text('street', Input::previous('street', $division->street), array(
						'class' => 'form-control',
						'id' => 'street',
						)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="city"><?php echo __('hierarchy.city'); ?></label>
					<div class="col-lg-4">
					<?php echo Form::text('city', Input::previous('city', $division->city), array(
						'class' => 'form-control',
						'id' => 'city',
						)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="state"><?php echo __('hierarchy.state'); ?></label>
					<div class="col-lg-4">
					<?php echo Form::text('state', Input::previous('state', $division->state), array(
						'class' => 'form-control',
						'id' => 'state',
						)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="zip"><?php echo __('hierarchy.zip'); ?></label>
					<div class="col-lg-2">
					<?php echo Form::text('zip', Input::previous('zip', $division->zip), array(
						'class' => 'form-control',
						'id' => 'zip',
						)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="telephone"><?php echo __('hierarchy.telephone'); ?></label>
					<div class="col-lg-9">
						<?php echo Form::textarea('telephone', Input::previous('telephone', $division->telephone), array(
							'rows' => 3,
							'class' => 'form-control',
							'id' => 'telephone'
							)); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="fax"><?php echo __('hierarchy.fax'); ?></label>
					<div class="col-lg-9">
						<?php echo Form::textarea('fax', Input::previous('fax', $division->fax), array(
							'rows' => 3,
							'class' => 'form-control',
							'id' => 'fax'
							)); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<?php echo Form::button(__('global.save'), array(
							'type' => 'submit',
							'class' => 'btn btn-primary'
							)); ?>

						<?php echo Html::link('admin/divisions/delete/' . $division->id, __('global.delete'), array(
							'class' => 'btn btn-danger delete'
							)); ?>
					</div>
				</div>

			</fieldset>
		</form>
	</div>

	<div class="col-lg-3">

		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Cawangan</div>

			<!-- List group -->
			<ul class="list-group">
			<?php foreach ($branchs as $branch): ?>
			<li class="list-group-item"><a href="<?php echo Uri::to('admin/branchs/edit/' . $branch->id); ?>"><?php echo $branch->title; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>

		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Sector</div>

			<!-- List group -->
			<ul class="list-group">
			<?php foreach ($sectors as $sector): ?>
			<li class="list-group-item"><a href="<?php echo Uri::to('admin/sectors/edit/' . $sector->id); ?>"><?php echo $sector->title; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>

		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Unit</div>

			<!-- List group -->
			<ul class="list-group">
			<?php foreach ($units as $unit): ?>
			<li class="list-group-item"><a href="<?php echo Uri::to('admin/units/edit/' . $unit->id); ?>"><?php echo $unit->title; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>


</div>

<?php echo $footer; ?>
