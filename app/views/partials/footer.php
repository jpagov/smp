					</div> <!-- //.well -->
				</div> <!-- //.col-lg-12 -->
			</div> <!-- //.row -->
		</div> <!-- //.container -->
		
		<?php if(Auth::user()): ?>
		<footer class="wrap bottom">
			<small><?php echo __('global.powered_by_app', VERSION); ?>.</small>
			<em><?php echo __('global.make_blogging_beautiful'); ?></em>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo asset('app/views/assets/js/bootstrap.min.js'); ?>"></script>
		<script>
			// Confirm any deletions
			$('.delete').on('click', function() {return confirm('<?php echo __('global.confirm_delete'); ?>');});
		</script>
		<?php endif; ?>
	</body>
</html>