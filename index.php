<?php get_header(); ?>

			<div class="row" id="content">
				<div class="col-xs-3">
					<div class="row" id="side">
						<?php dynamic_sidebar('left_sidebar'); ?>
					</div>
				</div>
				<div class="col-xs-9" id="blogpage">

				<?php while (have_posts()):the_post() ?>
					<div class="media">
						<div class="media-left">
							<a href="#">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><?php the_title(); ?></h4>
							<p><?php details(60); ?>
							</p> 
							<a href="#" class="btn btn-info botn">Details</a>
						</div>
					</div>
				<?php endwhile; ?>

					<div class="pag">
						<?php custom_pagination(); ?>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>


















