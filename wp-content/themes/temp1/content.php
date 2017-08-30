
<div class="content-container">
				<h1 class="dp-tit"><?php the_title(); ?></h1>
				<div class="dp-bar">
					<span><i class="iconfont icon-time"></i><?php temp1_entry_date_entry_date(); ?></span>
					<?php if(get_the_author()) : ?>
						<span><i class="iconfont icon-icon-admin"></i><?php the_author_nickname(); ?></span>
					<?php endif; ?>
					<!-- <?php listcategories(); ?> -->
					
					<span class="dp-readnum"><b><?php 
						$post_views = intval(post_custom('views'));
						echo $post_views;
					?></b>人已阅读</span>
				</div>
				<div class="dp-content">
					<?php the_content(); ?>
				</div>
				<div class="dp-share  clearfix">
					<div class="dp-share-detail">
					<!-- 百度分享 start -->
					<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					<!-- 百度分享 end -->	
					
</div>
				</div>
				<div class="dp-dir">
					<?php previous_post_link('<p>上一篇: %link</p>') ?>
					<?php next_post_link('<p>下一篇: %link</p>') ?>
					
				</div>
			</div>
			<div class="dp-comment"><?php comments_template('', true);?></div>

<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/plugin/syntaxhighlighter3/dist/shCore.js"></script> 
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/plugin/syntaxhighlighter3/styles/shCore.css">
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/plugin/syntaxhighlighter3/styles/shCoreFadeToGrey.css">
<script type="text/javascript">
	SyntaxHighlighter.all();
</script>

