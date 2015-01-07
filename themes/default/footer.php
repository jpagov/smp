	</div> <!-- //.row -->
      <footer class="footer">
         <small><p><?php echo _e('site.copyright', _e('site.footer')); ?></p><p><a href="#"><?php echo _e('site.back_to_top'); ?></a></p></small>
      </footer>
    </div> <!-- //.container -->

    <div id="helper-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo revision('js/main.min.js'); ?>"></script>
    <?php if ($modalism = Session::get('modal')) : Session::erase('modal');  ?>
    <script type="text/javascript">
			$(window).load(function(){
				$('#<?php echo $modalism; ?>').modal('show');
			});
		</script>
		<?php endif; ?>
		<?php if (is_staff() and !Session::get('recaptcha')) : ?><script src='https://www.google.com/recaptcha/api.js'></script><?php endif; ?>
		<?php if (is_homepage()) : ?><?php theme_include('schema'); ?><?php endif; ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-974231-8', 'auto');
		  ga('send', 'pageview');

		</script>
  </body>
</html>
