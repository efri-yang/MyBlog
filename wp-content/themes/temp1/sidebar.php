

<div class="sidebar">
		<?php get_search_form(); ?>
		<?php $cat= single_cat_title('', false);?>
	<!-- 如果是首页的时候，切有侧边栏 -->
    <?php if ( is_active_sidebar( 'home-sidebar-1' ) && is_home()) : ?>
    	<div class="sidebar-item">
    		<div class="hd">阅读排行</div>
    		<ul class="sidebar-hotlist">
    			<?php get_most_viewed($mode = '', $limit = 5, $chars = 0, $display = true) ?>
    		</ul>
    	</div>
    		
			<?php dynamic_sidebar( 'home-sidebar-1' ); ?>
			<?php 
				 $args = array(
				 	'limit' =>10,
				    'title_before'     => '<div class="hd">',
				    'title_after'      => '</div>',
				    'category_before'  => '<div class="sidebar-item">',
				    'category_after'   => '</div>' 
				);
				//友情链接
				wp_list_bookmarks($args); 
			?>
	
	<?php elseif (is_category()) :?>
		<div class="sidebar-item">
			<div class="hd">阅读排行</div>
	    		<ul class="sidebar-hotlist">
	    			<?php get_most_viewed_category($category_id =get_cat_ID($cat), $mode = '', $limit = 10, $chars = 0, $display = true); ?>
	    		</ul>
	    </div>
	    <div class="sidebar-item">
			<div class="hd">标签云</div>
    		<div class="tagcloud">
    			<?php 
wp_tag_cloud('smallest=12&largest=12&unit=px&number=11&format=flat&orderby=name&order=ASC');
    			?>
    		</div>
	    </div>
	   
		<?php if ( is_active_sidebar( 'category-sidebar-1' )) : ?>
				<?php dynamic_sidebar( 'category-sidebar-1' ); ?>
		<?php endif; ?>

	<?php elseif(is_year() || is_month()) : ?>
		<div class="sidebar-item">
			<div class="hd">阅读排行</div>
	    		<ul class="sidebar-hotlist">
    				<?php get_most_viewed($mode = '', $limit = 5, $chars = 0, $display = true) ?>
    			</ul>
	    </div>
		<div class="sidebar-item">
			<div class="hd">标签云</div>
    		<div class="tagcloud">
    			<?php 
wp_tag_cloud('smallest=12&largest=12&unit=px&number=11&format=flat&orderby=name&order=ASC');
    			?>
    		</div>
	    </div>
	<?php elseif (is_tag()) : ?>
		<div class="sidebar-item">
    		<div class="hd">热门文章</div>
    		<ul class="sidebar-hotlist">
    			<?php get_most_viewed_tag(get_current_tag_id()); ?>
    		</ul>
    	</div>
		
	<!-- 如果是内页的时候，而且有侧边栏 -->
	<?php elseif (is_single()) : ?>
		<!-- //根据标签来调用相关的热门文章 -->
		<?php $tagArr=wp_get_post_tags($post->ID);?>
		<?php if($tagArr) : ?>
			<div class="sidebar-item">
	    		<div class="hd">相关文章</div>
	    		<ul class="sidebar-hotlist">
					<?php 
						get_most_viewed_tag($tagArr[0]->term_id);
					 ?>
				</ul>
	    	</div>
	    <?php endif; ?>
	    <div class="sidebar-item">
    		<div class="hd">大家也喜欢</div>
    		<ul class="sidebar-hotlist">
    			<?php get_most_viewed($mode = '', $limit = 5, $chars = 0, $display = true) ?>
    		</ul>
    	</div>
			<?php if ( is_active_sidebar( 'detailpage-sidebar-1' )) : ?>
				<?php dynamic_sidebar( 'detailpage-sidebar-1' ); ?>
			<?php endif; ?>
	<?php endif; ?>
</div>


