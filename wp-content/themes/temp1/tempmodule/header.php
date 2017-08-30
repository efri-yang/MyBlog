<div class="header">
		<div class="wn-container">
			<div class="logo" title="蜗牛博客"></div>
			
			<?php if(is_home()) : ?>
				<div class="logo-m">蜗牛博客</div>
			<?php else: ?>
				<a class="goback" href="javascript:history.go(-1)"><i class="iconfont icon-fanhui"></i></a>
			<?php endif; ?>
			
			<?php 
				$defaults = array(
					  'theme_location'  => '',
					  'menu'            => '',
					  'container'       => 'nav',
					  'container_class' => 'main-nav',
					  'container_id'    => '',
					  'menu_class'      => 'main-nav',
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => 'wp_page_menu',
					  'before'          => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="main-navlist">%3$s</ul>',
					  'depth'           => 0,
					  'walker'          => ''
					);
				wp_nav_menu($defaults);
		 	?>
		 	<div class="main-navbar-toggle" id="J_main-navbar-toggle"><i class="iconfont icon-fenlei"></i></div>
 		</div>
 	</div>