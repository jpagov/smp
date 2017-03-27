<?php echo $header; ?>

<?php echo Html::link('admin/transfers', __('global.back'), array('class' => 'btn btn-lg btn-primary pull-right')); ?>

<h1 class="page-header"><?php echo $transfer->staff; ?></h1>

<?php echo $messages; ?>

<div class="row">
    <div class="col-lg-9">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Pertukaran Pegawai</div>
			<div class="panel-body">
			<p>Status Pertukaran: <span class="text-uppercase label label-<?php echo ($transfer->confirmed_at) ? 'success' : 'warning' ?>"><?php echo ($transfer->confirmed_at) ? __('transfers.confirmed') . __('transfers.confirm_by', $transfer->confirmed_at, $transfer->confirmed_by) : __('transfers.not_confirmed') ?></span> </p>
			</div>

			<!-- List group -->
			<ul class="list-group">
			<li class="list-group-item">Pertukaran ke: <b><?php echo $transfer->division_to ?></b></li>
			<li class="list-group-item">Pertukaran oleh: <b><?php echo $transfer->request_by ?></b></li>
			<li class="list-group-item">Tarikh pertukaran: <b><?php echo Date::formatLocalized($transfer->transfered_at, 'd MMMM y h:mm a') ?></b></li>
			<li class="list-group-item">Disahkan oleh: <b><?php echo $transfer->confirm_by ?></b></li>
			<li class="list-group-item">Tarikh disahkan: <b><?php echo ($transfer->confirmed_at) ? Date::formatLocalized($transfer->confirmed_at) : '' ?></b></li>
			</ul>
		</div>
	</div><!-- /.col-lg-9 -->

	<div class="col-lg-3">

		<?php echo Html::link('admin/transfers/',
            __('global.back'), array(
                'class' => 'btn btn-success btn-lg btn-block back'
        )); ?>

		<?php echo Html::link('admin/transfers/cancel/' . $transfer->id,
            __('transfers.cancel'), array(
                'class' => 'btn btn-warning btn-lg btn-block',
                'target' => '_blank'
        )); ?>

	</div><!-- /.col-lg-3 -->
</div>

<?php echo $footer; ?>
