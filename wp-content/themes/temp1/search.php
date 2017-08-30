<?php get_header(); ?>


	<div class="wn-container sr-container">
		<?php get_search_form(); ?>
		<?php if ( have_posts() ) : ?>
			<ul class="log-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'list'); ?>
				<?php endwhile; ?>
			</ul>
			<div class="temp-pagewrap">
        		<?php
        			    the_posts_pagination( array( 
        			        'prev_text'          =>上一页,
        			        'next_text'          =>下一页,
        			        'screen_reader_text'=>' '
        			    ) );
        		?>
        	</div>
		<?php else: ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>	
	</div>		


<?php get_footer(); ?>
<?php get_template_part( 'scroll-tool'); ?>
	</body>
</html>

