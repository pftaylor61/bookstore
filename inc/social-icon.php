<?php 
	

		
		function my_social_icons(){

			$social_sites = social_array();

			foreach ($social_sites as $social_site) {
				# code...
				if(strlen(get_theme_mod($social_site))>0){
					$active_sites[] = $social_site;
				}
			}

			if(!empty($active_sites)){
				echo '<div  id="social-icon" class="pull-right">';
				foreach ($active_sites as $active_site)  { ?>

				<?php if($active_site=='google-plus'){?>
		            
		           <a href="<?php echo get_theme_mod( $active_site ); ?>" class="btn btn-social-icon  btn-xs btn-google">
		               <i class="fa fa-<?php echo $active_site; ?>"></i>
		           </a>

		        <?php }else{?>

	             	<a href="<?php echo get_theme_mod( $active_site ); ?>" class="btn btn-social-icon  btn-xs btn-<?php echo $active_site; ?>">
		                 <i class="fa fa-<?php echo $active_site; ?>"></i>
		             </a>

	             <?php
	         		}
				}
				echo '</div>';
			}
		}
 ?>