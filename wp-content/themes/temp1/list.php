<li>
		
	<h2 class="tit"><i class="iconfont icon-iconfonticon05"></i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry-meta">
		<span><i class="iconfont icon-time"></i><?php temp1_entry_date_entry_date(); ?></span>
		<?php listcategories(); ?> 
		
		<!-- <?php listTags(); ?>-->

		<!-- <span><i class="iconfont icon-xiebiaoqian">
			
		</i>次</span> -->
		<?php if(get_the_author()) : ?>
			<span><i class="iconfont icon-icon-admin"></i> <?php the_author_nickname(); ?></span>
		<?php endif; ?>
		
		
	
	</div>
	<div class="desc">
		<?php the_excerpt(100); ?>
	</div>
	<a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore">阅读全文</a>
</li>