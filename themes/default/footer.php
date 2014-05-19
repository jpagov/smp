
          <footer id="bottom">
              <small>&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All rights reserved.</small>

              <ul role="navigation">
                  <li><a href="<?php echo rss_url(); ?>">RSS</a></li>
                  <?php if(twitter_account()): ?>
                  <li><a href="<?php echo twitter_url(); ?>">@<?php echo twitter_account(); ?></a></li>
                  <?php endif; ?>

                  <li><a href="<?php echo base_url('admin'); ?>" title="Administer your site!">Admin area</a></li>

                  <li><a href="<?php echo base_url(); ?>" title="Return to my website.">Home</a></li>
              </ul>
          </footer>

      </div> <!-- //.row -->
    </div> <!-- //.container -->
    <div id="helper-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!-- /.modal-dalog --></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo asset('app/views/assets/js/handlebars.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/typeahead.bundle.min.js'); ?>"></script>
    <script src="<?php echo asset('app/views/assets/js/app.js'); ?>"></script>
  </body>
</html>
