<?php get_header(); ?>

        <!-- Content -->
      <?php while(have_posts()):the_post() ?>
        <div class="col-md-12" id="content_wrap">
          <h3><?php the_title(); ?></h3>

          <p><?php the_content(); ?></p>
        </div><!-- content_wrap -->
      <?php endwhile; ?>
      </div><!-- end row -->
    </div><!-- end of full_content -->
<?php get_footer(); ?>