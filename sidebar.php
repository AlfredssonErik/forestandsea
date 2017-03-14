<div class="col-sm-3 blog-sidebar">
           <?php echo do_shortcode('[instagram-feed]'); ?>
          <div class="sidebar-module sidebar-module-inset blog-about">
            <h4>Bloggen</h4>
            <p><?php the_author_meta( 'description' ); ?> </p>
          </div>
          <div class="sidebar-module blog-archive">
            <h4>Akriv</h4>
            <ol class="list-unstyled">
              <?php wp_get_archives( 'type=monthly' ); ?>
            </ol>
          </div>
          <div class="sidebar-module blog-elsewhere">
            <h4>På andra håll</h4>
            <ol class="list-unstyled">
              <li><a target="_blank" href="<?php echo get_option('facebook'); ?>">Facebook</a></li>
              <li><a target="_blank" href="<?php echo get_option('instagram'); ?>">Instagram</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->