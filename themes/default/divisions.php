
<div class="col-md-12 divisions">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<?php $kppa = get_staff(site_meta('kppa')); ?>
			<a class="org-list bg-primary" href="<?php echo base_url('division/pkppa'); ?>" data-hotkey="g k">
				<img class="img-responsive" src="/smp/content/avatar/<?php echo $kppa->avatar; ?>.jpg?<?php echo strtotime($kppa->updated); ?>" alt="<?php echo $kppa->display_name; ?>" id="pkppa">
				<h2 class="title"><?php echo __('site.pkppa'); ?></h2>
			</a>

		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('division/intan'); ?>" class="org-link" data-hotkey="b 1"><p><?php echo __('site.intan'); ?></p></a>
			</div>
		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('search?term=unit:ukk'); ?>" class="org-link"><p><span class="visible-xs-block">UKK</span> <span class="hidden-xs"><?php echo __('site.ukk'); ?></span></p></a>
			</div>
		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('search?term=unit:unit-audit-dalam'); ?>" class="org-link"><p><?php echo __('site.audit'); ?></p></a>
			</div>
		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('division/bppd'); ?>" class="org-link" data-hotkey="b 2"><p><span class="visible-xs-block">BPPD</span> <span class="hidden-xs"><?php echo __('site.bppd'); ?></p></a>
			</div>
		</div>


		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('search?term=unit:unit-integriti'); ?>" class="org-link"><p><?php echo __('site.integriti'); ?></p></a>
			</div>
		</div>

		<div class="col-xs-6 col-sm-4">
			<div class="org org-danger text-center pkkpa-child">
				<a href="<?php echo base_url('search?term=unit:unit-perundangan'); ?>" class="org-link"><p><?php echo __('site.law'); ?></p></a>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-md-6 pkppap">

			<?php $tkppap = get_staff(site_meta('tkppap')); ?>
			<div class="col-md-12">
				<a class="org-list bg-primary" href="<?php echo base_url('division/pkppap'); ?>" data-hotkey="g p">
					<img class="img-responsive" src="/smp/content/avatar/<?php echo $tkppap->avatar; ?>.jpg?<?php echo strtotime($tkppap->updated); ?>" alt="<?php echo $tkppap->display_name; ?>">
					<h2 class="title"><?php echo __('site.pkppap'); ?></h2>
				</a>
			</div>

			<div class="row">

				<div class="col-xs-6">
					<div class="org org-info text-center pkkpa-child">
						<a href="<?php echo base_url('division/bk'); ?>" class="org-link" data-hotkey="b 3"><p><span class="visible-xs-block">BK</span> <span class="hidden-xs"><?php echo __('site.bk'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-info text-center pkkpa-child">
						<a href="<?php echo base_url('division/bpo'); ?>" class="org-link" data-hotkey="b 5"><p><span class="visible-xs-block">BPO</span> <span class="hidden-xs"><?php echo __('site.bpo'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-info text-center pkkpa-child">
						<a href="<?php echo base_url('division/bmi'); ?>" class="org-link" data-hotkey="b 6"><p><span class="visible-xs-block">BMI</span> <span class="hidden-xs"><?php echo __('site.bmi'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-info text-center pkkpa-child">
						<a href="<?php echo base_url('division/bge'); ?>" class="org-link" data-hotkey="b 7"><p><span class="visible-xs-block">BGE</span> <span class="hidden-xs"><?php echo __('site.bge'); ?></span></p></a>
					</div>
				</div>



			</div>
		</div>

		<div class="col-md-6 pkppao">

			<?php $tkppao = get_staff(site_meta('tkppao')); ?>
			<div class="col-md-12">
				<a class="org-list bg-primary" href="<?php echo base_url('division/pkppao'); ?>" data-hotkey="g o">
					<img class="img-responsive" src="/smp/content/avatar/<?php echo $tkppao->avatar; ?>.jpg?<?php echo strtotime($tkppao->updated); ?>" alt="<?php echo $tkppao->display_name; ?>">
					<!-- <img class="img-responsive" src="/smp/content/avatar/default-male.jpg" alt="TKPPA(O)"> -->
					<h2 class="title"><?php echo __('site.pkppao'); ?></h2>
				</a>
			</div>

			<div class="row">

				<div class="col-xs-6">
					<div class="org org-success text-center pkkpa-child">
						<a href="<?php echo base_url('division/bp'); ?>" class="org-link" data-hotkey="b 8"><p><span class="visible-xs-block">BP</span> <span class="hidden-xs"><?php echo __('site.bp'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-success text-center">
						<a href="<?php echo base_url('division/bkp'); ?>" class="org-link" data-hotkey="b 9"><p><span class="visible-xs-block">BKP</span> <span class="hidden-xs"><?php echo __('site.bkp'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-success text-center pkkpa-child">
						<a href="<?php echo base_url('division/bpps'); ?>" class="org-link" data-hotkey="b p s"><p><span class="visible-xs-block">BPS</span> <span class="hidden-xs"><?php echo __('site.bpps'); ?></span></p></a>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="org org-success text-center pkkpa-child">
						<a href="<?php echo base_url('division/bdtm'); ?>" class="org-link" data-hotkey="b p m"><p><span class="visible-xs-block">BDTM</span> <span class="hidden-xs"><?php echo __('site.bdtm'); ?></span></p></a>
					</div>
				</div>

			</div>
		</div>

	</div>


</div>
