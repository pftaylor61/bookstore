<?php 
/*
	Template Name: Front Page Template
*/
get_header(); ?>
			<div class="row">

				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				    
				    <div class="carousel-inner">
				            <div class="active item" id="slide1">
				            	<img src="<?php echo get_theme_mod('first_slide'); ?>" class="img-responsive imgSize">
				            </div>
				            <div class="item" id="slide2">
				                <img src="<?php echo get_theme_mod('second_slide'); ?>" class="img-responsive imgSize">
				            </div>
				            <div class="item" id="slide3">
				               <img src="<?php echo get_theme_mod('third_slide'); ?>" class="img-responsive imgSize">
				            </div>
				    </div>
				    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				        <span class="icon-prev">
				           
				        </span>                                                     
				    </a>
				    <a class="right carousel-control " href="#myCarousel" data-slide="next">
				        <span class="icon-next">
				            
				        </span>
				    </a>
				</div> <!-- end myCarousel --> 
				
				
			</div><!-- end of row -->

			<div class="row" id="content">
				<?php get_sidebar(); ?>
				<div class="col-xs-9">
					<div class="row" id="homecontent">
						
							<h3 class="contitle">Featured Books</h3>
						
						<div class="row" id="featBook">
							<?php  

								$feat = new WP_Query(array(
									'post_type'=>'feature',
									'posts_per_page'=>4
									));

							?>

							<?php while($feat->have_posts()):$feat->the_post() ?>

								<div class="col-xs-6 col-sm-3" id="singlebook" id="singlebook">
									<?php the_post_thumbnail(); ?>
									<h4 class="text-center price">Price: $70</h4>
									<button class="btn btn-info">Buy</button>
								</div>

							<?php endwhile ?>
							
						</div>
					</div>

					<div class="row" id="homecontent">
						
						<h3 class="contitle">Most Popular Books</h3>
						
						<div class="row" id="featBook">
						<?php 
							$pop = new WP_Query(array(
								'post_type'=>'popular',
								'posts_per_page'=>4
								));
						?>
						<?php while(have_posts()):the_post() ?>
							<div class="col-xs-6 col-sm-3" id="singlebook">
								<img src="<?php echo get_template_directory_uri()?>/img/front1.jpg" class="img-responsive">
								<h4 class="text-center price">Price: $70</h4>
								<button class="btn btn-info">Buy</button>
							</div>
						<?php endwhile; ?>
						</div>
					</div>

					<div class="row" id="homecontent">
						<div class="tabbable tabtitle">
						    <ul class="nav nav-tabs">
						        <li class="active"><a href="#tab1" data-toggle="tab">News</a></li>
						        <li><a href="#tab2" data-toggle="tab">Offers</a></li>
						        <li><a href="#tab3" data-toggle="tab">Our Location</a></li>
						    </ul>
						</div><!-- end tabbable -->
						<div class="tab-content" id="nav_tab">
							<div class="tab-pane active" id="tab1">	

							<?php 
								$postcont = new WP_Query(array(
									'post_type'=>'post',
									'posts_per_page'=>2
									));
							 ?>

							<?php while($postcont->have_posts()):$postcont->the_post() ?>
								<div class="media">
								
									<div class="media-left">
										<a href="<?php the_permalink(); ?>">

											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php the_title();?></h4>
										<p><?php details(50); ?></p> 
											<a href="#" class="btn btn-info botn">Details</a>
									</div>
								</div>
							<?php  endwhile;?>
								
							</div>
							<div class="tab-pane" id="tab2">
								<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img class="media-object" src="<?php echo get_template_directory_uri()?>/img/sm.jpg" alt="...">
								    </a>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading">Media heading</h4>
								    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
								    	<a href="#" class="btn btn-info botn">Details</a>
								  </div>
								</div>
							</div>
							<div class="tab-pane" id="tab3">
								<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img class="media-object" src="<?php echo get_template_directory_uri()?>/img/sm.jpg" alt="...">
								    </a>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading">Media heading</h4>
								    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
								    	<a href="#" class="btn btn-info botn">Details</a>
								  </div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php get_footer(); ?>


















