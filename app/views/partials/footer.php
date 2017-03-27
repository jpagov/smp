					</div> <!-- //.well -->
					<footer class="footer">
				         <small><p><?php echo _e('site.copyright', _e('site.footer')); ?></p><p><a href="#"><?php echo _e('site.back_to_top'); ?></a></p></small>
					</footer>

				</div> <!-- //.col-lg-12 -->
			</div> <!-- //.row -->
		</div> <!-- //.container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha384-/Gm+ur33q/W+9ANGYwB2Q4V0ZWApToOzRuA8md/1p9xMMxpqnlguMvk8QuEFWA1B" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="<?php echo asset('app/views/assets/js/jquery-1.11.1.min.js'); ?>"><\/script>')</script>
		<script src="<?php echo asset('app/views/assets/js/bootstrap.min.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/typeahead.bundle.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/bootstrap-markdown.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/bootstrap-tagsinput.min.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/sweetalert.min.js'); ?>"></script>

	    <?php if (isset($javascript)) : ?><?php foreach ($javascript as $js) : ?>
	    <script src="<?php echo asset('app/views/assets/js/' . $js); ?>"></script>
	    <?php endforeach; ?><?php endif; ?>

	    <script src="<?php echo asset('app/views/assets/js/app.js'); ?>"></script>
		<?php if(Auth::user()): ?>
		<script>
			var path = '/' + window.location.pathname.split('/')[1] || '/';
			// Confirm any deletions
			$('.delete').on('click', function(e) {
				e.preventDefault();
				var href = $(this).attr('href');
				swal({
		            title: "<?php echo __('global.confirm_are_you_sure'); ?>",
		            text: "<?php echo __('global.confirm_delete'); ?>",
		            type: "warning",
		            showCancelButton: true,
		            cancelButtonText: "<?php echo __('global.confirm_cancel'); ?>",
		            confirmButtonColor: "#DD6B55",
		            confirmButtonText: "<?php echo __('global.confirm_delete_button'); ?>",
		            closeOnConfirm: true,
		            html: true
		        }, function(confirmed) {
		            if (confirmed) {
		            	window.location.href = href;
		            };
				});
			});

			<?php endif; ?>
			<?php
			if( strpos(Uri::current(), 'admin/staffs/edit') !== false ): ?>
			$('#btnTransfer').on('click', function(e) {
				var division = $('#transfer').val();
				var staff = $(this).attr('data-staff');

				if (Number(division)) {
					swal({
			            title: "<?php echo __('global.confirm_are_you_sure'); ?>",
			            text: "<?php echo __('global.confirm_transfer'); ?>",
			            type: "warning",
			            showCancelButton: true,
			            cancelButtonText: "<?php echo __('global.confirm_cancel'); ?>",
			            confirmButtonColor: "#DD6B55",
			            confirmButtonText: "<?php echo __('global.confirm_transfer_button'); ?>",
			            closeOnConfirm: true,
			            html: true
			        }, function(confirmed) {
			            if (confirmed) {
			            	window.location.href = path + '/admin/transfers/' + staff + '/' + division ;
			            };
					});
				}
			});
			<?php endif; ?>
		</script>
	</body>
</html>
