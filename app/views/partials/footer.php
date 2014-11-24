					</div> <!-- //.well -->
						<?php if(Auth::user()): ?>
						<footer class="wrap bottom">
							<small><?php echo __('global.powered_by_app', VERSION); ?>.</small>
							<em><?php echo __('global.site_slogan'); ?></em>
						</footer>
						<?php endif; ?>

				</div> <!-- //.col-lg-12 -->
			</div> <!-- //.row -->
		</div> <!-- //.container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo asset('app/views/assets/js/jquery-1.11.1.min.js'); ?>"><\/script>')</script>
		<script src="<?php echo asset('app/views/assets/js/bootstrap.min.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/typeahead.bundle.min.js'); ?>"></script>
	    <script src="<?php echo asset('app/views/assets/js/bootstrap-markdown.js'); ?>"></script>

	    <?php if (isset($javascript)) : ?><?php foreach ($javascript as $js) : ?>
	    <script src="<?php echo asset('app/views/assets/js/' . $js); ?>"></script>
	    <?php endforeach; ?><?php endif; ?>

	    <script src="<?php echo asset('app/views/assets/js/app.js'); ?>"></script>
		<?php if(Auth::user()): ?>
		<script>
			// Confirm any deletions
			$('.delete').on('click', function() {return confirm('<?php echo __('global.confirm_delete'); ?>');});
		</script>
		<?php endif; ?>
	</body>
</html>
