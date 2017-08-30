    <div class="search-form">
    	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <div class="ipt">
            	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="seach-keyword" />
            </div>
            <input type="submit" id="searchsubmit" value="搜 索" class="seach-btn" />
    	</form>
    </div>
    