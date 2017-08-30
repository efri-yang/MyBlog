<?php get_header(); ?>

    <!-- 如果是单页 -->
    
        <div class="header-font"></div>
    	<div class="wn-container clearfix wn-container-pt">
    		
    		<div class="box-main">
    			<!-- 有数据的时候 -->
    			<?php if ( have_posts() ) : ?>	
                    <!-- 如果首页或者是分类页面 那么调用的列表是一样的 -->
                    <?php if(is_home() || is_category() || is_tag() || is_month()) : ?>
                        <ul class="log-list">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part('list'); ?>
                            <?php endwhile; ?>
                        </ul>
                        
                      <!-- 分页 -->
                        <?php if(is_home()) : ?>
                        	
                        <?php else : ?>
                            <div class="temp-pagewrap">
                                <?php
                                        the_posts_pagination( array( 
                                            'prev_text'          =>上一页,
                                            'next_text'          =>下一页,
                                            'screen_reader_text'=>' '
                                        ) );
                                ?>
                            </div>
                        <?php endif; ?>  
                    <?php endif; ?> 
    			<?php else: ?> 
    				<?php get_template_part( 'content', 'none' ); ?>
    			<?php endif; ?>	
    		</div>
            <?php get_sidebar(); ?>
    	</div>
    	<?php get_footer(); ?>
         

    
    <?php get_template_part( 'tempmodule/scrolltool'); ?>


<!-- 测试的地方 -->

 