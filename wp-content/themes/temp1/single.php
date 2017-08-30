<?php get_header() ?>

  	
<div class="wn-container clearfix wn-container-pt">
	
	<div class="box-main">
		<?php if ( have_posts() ) : ?>	            
		    <?php while ( have_posts() ) : the_post(); ?>
		        <?php get_template_part( 'content', get_post_format() ); ?>
		    <?php endwhile; ?>
	  	<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
<?php get_template_part( 'tempmodule/scrolltool'); ?>

</body>
</html>
