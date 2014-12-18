<?php echo $header; ?>

<?php echo Html::link('admin/divisions', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo __('hierarchy.add', 'division'); ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">
        <form class="form-horizontal" method="post" action="<?php echo Uri::to('admin/divisions/add'); ?>" novalidate autocomplete="off" enctype="multipart/form-data">

            <input name="token" type="hidden" value="<?php echo $token; ?>">

            <fieldset>
                <legend><?php echo __('hierarchy.detail'); ?></legend>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="title"><?php echo __('hierarchy.title'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::text('title', Input::previous('title'), array(
                        'class' => 'form-control',
                        'id' => 'title',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="description"><?php echo __('hierarchy.description'); ?></label>
                  <div class="col-lg-9">
                    <?php echo Form::textarea('description', Input::previous('description'), array(
                        'rows' => 3,
                        'class' => 'form-control',
                        'id' => 'description'
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="slug"><?php echo __('hierarchy.slug'); ?></label>
                  <div class="col-lg-6">
                    <?php echo Form::text('slug', Input::previous('slug'), array(
                        'class' => 'form-control',
                        'id' => 'slug',
                    )); ?>
                  </div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="parent"><?php echo __('hierarchy.parent'); ?></label>
					<div class="col-sm-6">
					<?php echo Form::select('parent', $parents, Input::previous('parent'), array('class' => 'form-control', 'id' => 'parent',
					)); ?>
					</div>
				</div>

                <div class="form-group">
                  <label class="col-lg-3 control-label" for="order"><?php echo __('hierarchy.order'); ?></label>
                  <div class="col-lg-2">
                    <?php echo Form::text('order', Input::previous('order'), array(
                        'class' => 'form-control',
                        'id' => 'order',
                    )); ?>
                  </div>
                </div>

                <div class="form-group">
									<label class="col-lg-3 control-label" for="street"><?php echo __('hierarchy.street'); ?></label>
									<div class="col-lg-9">
									<?php echo Form::text('street', Input::previous('street'), array(
										'class' => 'form-control',
										'id' => 'street',
										)); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="city"><?php echo __('hierarchy.city'); ?></label>
									<div class="col-lg-4">
									<?php echo Form::text('city', Input::previous('city'), array(
										'class' => 'form-control',
										'id' => 'city',
										)); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="state"><?php echo __('hierarchy.state'); ?></label>
									<div class="col-lg-4">
									<?php echo Form::text('state', Input::previous('state'), array(
										'class' => 'form-control',
										'id' => 'state',
										)); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="zip"><?php echo __('hierarchy.zip'); ?></label>
									<div class="col-lg-2">
									<?php echo Form::text('zip', Input::previous('zip'), array(
										'class' => 'form-control',
										'id' => 'zip',
										)); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="telephone"><?php echo __('hierarchy.telephone'); ?></label>
									<div class="col-lg-9">
										<?php echo Form::textarea('telephone', Input::previous('telephone'), array(
											'rows' => 3,
											'class' => 'form-control',
											'id' => 'telephone'
											)); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="fax"><?php echo __('hierarchy.fax'); ?></label>
									<div class="col-lg-9">
										<?php echo Form::textarea('fax', Input::previous('fax'), array(
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
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <div class="col-lg-3">
			<div class="panel panel-default">
		      <div class="panel-heading">Need help?</div>
		      <div class="panel-body">
		      	<p>You can add custom text to telephone and fax field. Example:</p>
		      	<ul>
		      		<li>Phone or fax number only</li>
		      		<li>Multiple number</li>
		      	</ul>
		      	<p>Note: You can use markdown format</p>
		      </div>
		  </div>
		</div>

</div>
