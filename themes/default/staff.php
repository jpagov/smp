<?php theme_include('header'); ?>

<section class="col-xs-12 col-md-8 staff well" id="staff-<?php echo staff_id(); ?>">
		<?php theme_include('breadcrumb'); ?>

		<?php
		$notify = (Notify::read()) ?: ''; echo $notify;
		$errors = (Session::get('errors')) ?: array(); Session::erase('errors');
		?>

		<div class="row">

				<div class="col-xs-9 col-md-push-3">
						<h1><em><?php echo staff_salutation(); ?></em> <?php echo staff_first_name(); ?> <?php echo staff_last_name(); ?></h1>
						<p class="lead"><?php echo staff_job_title(); ?></p>

						<?php if (staff_description()) : ?><p class="well well-sm bg-warning"><?php echo staff_description(); ?></p><?php endif; ?>
				</div>

				<div class="col-xs-3 col-md-pull-9">
						<img src="<?php echo asset('content/avatar/' . staff_custom_field('avatar')); ?>" class="img-responsive img-thumbnail">



						 <div class="star-rating">
								<p> <abbr title="<?php echo _e('site.profile_hit', number_format(staff_view())); ?>"><small><?php echo custom_number_format(staff_view()); ?></small></abbr></p>
<!--
								<?php if (staff_rating()) : ?>

								<div class="stars">
								<?php for ($i=0; $i < 5; $i++) :  ?>
										<?php if (staff_rating() > $i) : ?>
										<span class="glyphicon glyphicon-star"></span>
									 <?php else: ?>
										<span class="glyphicon glyphicon-star-empty"></span>
										<?php endif; ?>

										<?php endfor; ?>
								</div>
								<?php endif; ?>

								<p><small>Relevancy: <a href="#" class="relevancy" role="tooltip" data-toggle="tooltip" data-placement="top" title="Show the staff visit and search relevancy"><?php echo staff_relevancy_percent(); ?></a></small></p>
		-->
						</div>



				</div>

		</div>

		<div class="row">

				<div class="col-md-12 col-md-offset-2 meta">
						<dl class="dl-horizontal">

							<dt><?php echo _e('site.designation'); ?></dt>
							<dd><i class="glyphicon glyphicon-barcode"></i> <?php echo staff_position(); ?></dd>
							<dt><?php echo _e('site.email'); ?></dt>
							<dd><i class="glyphicon glyphicon-comment"></i> <a href="mailto:<?php echo staff_email_encode(); ?>" id="staff-message" data-toggle="modal" data-target="#messageModal" data-staff="<?php echo staff_name(); ?>" data-staff-id="<?php echo staff_id(); ?>"><?php echo staff_email_image(); ?></a></dd>
							<dt><?php echo _e('site.telephone'); ?></dt>
							<dd><i class="glyphicon glyphicon-earphone"></i> <?php echo staff_telephone_link(); ?></dd>
					</dl>

					<?php if ($organization = staff_hierarchy(staff_id(), true)) : ?>
					<dl class="dl-horizontal">
							<?php foreach($organization as $key => $org): ?>
							<dt><?php echo _e('site.' . $key); ?></dt>
							<dd><a href="<?php echo base_url('division/' . $org['url']); ?>"><?php echo $org['title']; ?></a></dd>
							<?php endforeach; ?>
					</dl>
					<?php endif; ?>

			</div>
	</div>

</section>

<section class="col-xs-12 col-md-4 sidebar">

	<div class="well well-sm">
		<button id="message-button" type="button" class="btn btn-primary btn-lg btn-block"><?php echo _e('site.contact_message'); ?></button>
	</div>

	<?php if(ratings_open()): ?>
	<div class="well">

		<div class="rating-inner">

			<div class="rating">
				<span class="rating-num"><?php echo rating_average(); ?></span>
				<div id="star-rating" data-score="<?php echo rating_average(); ?>" data-staff="<?php echo staff_id(); ?>"></div>
				<div class="rating-users">
					<i class="glyphicon glyphicon-user"></i> <span id="rating-count"><?php echo total_ratings(); ?></span> total
				</div>
			</div>

			<div class="clearfix visible-xs-block"></div>

			<div class="histo">

				<?php foreach(array('five' => 5, 'four' => 4, 'three' => 3, 'two' => 2, 'one' => 1) as $key => $score): ?>

					<div class="<?php echo $key; ?> histo-rate">
					<span class="histo-star">
						<img class="pull-left" title="gorgeous" src="/smp/app/views/assets/img/star-off.png" alt="<?php echo $score; ?>"> <?php echo $score; ?></span>
					<span class="bar-block">
						<span id="bar-<?php echo $key; ?>" class="bar" data-score-percent="<?php echo rating_percent($score); ?>">
							<span><?php echo rating_count($score); ?></span>&nbsp;
						</span>
					</span>
				</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
	<?php endif; ?>

			<?php if (show_direct_report() and staff_report_to_id()) : $boss = staff_report_to(); ?>

					<h2 class="modal-header"><?php echo _e('site.direct_report'); ?></h2>

					<?php foreach($boss->results as $bos): ?>
					<div class="list-group">
							<a href="<?php echo Config::app('url') . '/' . $bos->slug; ?>" class="list-group-item clearfix">
									<img width="50" height="50" class="media-object img-circle pull-left" src="<?php echo asset('content/avatar/' . staff_avatar($bos->id, $bos->gender)); ?>" alt="<?php echo $bos->display_name; ?>">
									<h4 class="list-group-item-heading"><?php echo $bos->display_name; ?></h4>
									<p class="list-group-item-text"><?php echo $bos->position; ?></p>
							</a>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>

		<?php if (show_personal_assistant() and staff_pa_id()) : $pas = staff_pa(); ?>

				<h2 class="modal-header"><?php echo _e('site.personal_assistant'); ?></h2>

				<?php foreach($pas->results as $pa): ?>

				<div class="list-group">
						<a href="<?php echo Config::app('url') . '/' . $pa->slug; ?>" class="list-group-item clearfix">
								<img width="50" height="50" class="media-object img-circle pull-left" src="<?php echo asset('content/avatar/' . staff_avatar($pa->id, $pa->gender)); ?>" alt="<?php echo $pa->display_name; ?>">
								<h4 class="list-group-item-heading"><?php echo $pa->display_name; ?></h4>
								<p class="list-group-item-text"><?php echo $pa->position; ?></p>
						</a>
				</div>

		<?php endforeach; ?>
		<?php endif; ?>


			<h2 class="modal-header"><?php echo _e('site.staff_related'); ?></h2>
			<div class="list-group">

				<?php $related = Staff::related(staff_id()); ?>

				<?php foreach($related->results as $relate): ?>
				<a href="<?php echo Config::app('url') . '/' . $relate->slug; ?>" class="list-group-item clearfix">
						<img width="50" height="50" class="media-object img-circle pull-left" src="<?php echo asset('content/avatar/' . staff_avatar($relate->id, $relate->gender)); ?>" alt="<?php echo $relate->display_name; ?>">
						<h4 class="list-group-item-heading"><?php echo $relate->display_name; ?></h4>
						<p class="list-group-item-text"><?php echo $relate->position; ?></p>
				</a>
				<?php endforeach; ?>
		</div>

</section>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="contact-staff" method="post">
    	<input name="staff" type="hidden" value="<?php echo staff_id(); ?>">
    	<input name="token" type="hidden" value="<?php echo Csrf::token(); ?>">
    	<input name="url" type="hidden" value="<?php echo full_url(Uri::current()); ?>">
    	<input name="type" type="hidden" value="message">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="messageModalLabel"><?php echo __('site.new_message_to', staff_name()); ?></h4>
      </div>
      <div class="modal-body">
      <p class="bg-warning"><small class="text-warning"><i><?php echo __('site.contact_note'); ?></i></small></p>
      <?php echo $notify; ?>
        <form>
        	<input type="hidden" id="recipient-id">
          <div class="form-group">
            <label for="from-name" class="control-label"><?php echo _e('site.contact_name'); ?></label>

            <?php echo Form::text('contact[name]', Input::previous('contact[name]'), array('class' => 'form-control', 'id' => 'from-name',
                    )); ?>

            <span class="help-block"><?php echo __('site.contact_name_explain'); ?></span>
          </div>
          <div class="form-group">
            <label for="from-email" class="control-label"><?php echo _e('site.contact_email'); ?></label>

            <?php echo Form::text('contact[email]', Input::previous('contact[email]'), array('class' => 'form-control ', 'id' => 'from-email',
                    )); ?>

            <span class="help-block"><?php echo __('site.contact_email_explain'); ?></span>
          </div>

          <div class="form-group<?php if ( in_array('message', $errors)) echo ' has-error'; ?>">
            <label for="message-text" class="control-label"><?php echo _e('site.contact_message'); ?></label>

				<?php echo Form::textarea('contact[message]', Input::previous('contact[message]'), array(
					'rows' => 3,
					'class' => 'form-control',
					'id' => 'message-text'
				)); ?>

          </div>

          <?php if (!Session::get('recaptcha')) : ?>
          <div class="form-group">
          	<div class="g-recaptcha" data-sitekey="6Lekyf8SAAAAACxfU-BGeFKFqTkjBcNCFHx3lpmo"></div>
          </div>
          <?php endif; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btn-message-send" type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php if(comments_open()): ?>
		<section class="comments">
			<?php if(has_comments()): ?>
					<ul class="commentlist">
						<?php $i = 0; while(comments()): $i++; ?>
						<li class="comment" id="comment-<?php echo comment_id(); ?>">
							<div class="wrap">
								<h2><?php echo comment_name(); ?></h2>
								<time><?php echo relative_time(comment_time()); ?></time>

								<div class="content">
									<?php echo comment_text(); ?>
							</div>

							<span class="counter"><?php echo $i; ?></span>
					</div>
			</li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>

<form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
		<?php echo comment_form_notifications(); ?>

		<p class="name">
			<label for="name">Your name:</label>
			<?php echo comment_form_input_name('placeholder="Your name"'); ?>
	</p>

	<p class="email">
			<label for="email">Your email address:</label>
			<?php echo comment_form_input_email('placeholder="Your email (won’t be published)"'); ?>
	</p>

	<p class="textarea">
			<label for="text">Your comment:</label>
			<?php echo comment_form_input_text('placeholder="Your comment"'); ?>
	</p>

	<p class="submit">
			<?php echo comment_form_button(); ?>
	</p>
</form>

</section>
<?php endif; ?>



<?php theme_include('footer'); ?>
