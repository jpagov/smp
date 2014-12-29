	</div> <!-- //.row -->
      <footer class="footer">
              <small><p><?php echo _e('site.copyright', _e('site.description')); ?></p><p>
        <a href="#"><?php echo _e('site.back_to_top'); ?></a>
      </p></small>
          </footer>
    </div> <!-- //.container -->

    <div id="helper-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo asset('app/views/assets/js/ZeroClipboard.min.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/handlebars.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/typeahead.bundle.min.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/jquery.raty.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/jquery.toaster.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/app.js'); ?>"></script>
    <?php if ($modalism = Session::get('modal')) : Session::erase('modal');  ?>
    <script type="text/javascript">
			$(window).load(function(){
				$('#<?php echo $modalism; ?>').modal('show');
			});
		</script>
		<?php endif; ?>
		<?php if (is_staff() and !Session::get('recaptcha')) : ?><script src='https://www.google.com/recaptcha/api.js'></script><?php endif; ?>
  </body>
</html>
