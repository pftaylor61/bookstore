<footer>
	<div class="another">
		<div class="container" id="footer">
			<div class="col-md-3" id="f_area">
				<?php dynamic_sidebar('footer_one'); ?>
			</div>
			<div class="col-md-3" id="f_area">
				<?php dynamic_sidebar('footer_two'); ?>
			</div>
			<div class="col-md-3" id="f_area">
				<?php dynamic_sidebar('footer_three'); ?>
			</div>
			<div class="col-md-3" id="f_area">
				<?php dynamic_sidebar('footer_four'); ?>
			</div>
		</div>
	</div>
	<style>
	#copyright a{
		color:<?php echo get_theme_mod('copyright_color'); ?>
	}
	</style>
	<div id="copyright">
		<p id="copy" style="color:<?php echo get_theme_mod('copyright_color'); ?>"><?php echo get_theme_mod('copyright_text');?></p>
	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri()?>/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>