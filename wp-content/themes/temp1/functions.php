<?php 
/**
 * 清楚头部乱七八糟的文件引用
 */
remove_action( 'wp_head',             'wp_enqueue_scripts',            1     );
remove_action( 'wp_head',             'feed_links',                    2     );
remove_action( 'wp_head',             'feed_links_extra',              3     );
remove_action( 'wp_head',             'rsd_link'                             );
remove_action( 'wp_head',             'wlwmanifest_link'                     );
remove_action( 'wp_head',             'index_rel_link'                       );
remove_action( 'wp_head',             'parent_post_rel_link',          10, 0 );
remove_action( 'wp_head',             'start_post_rel_link',           10, 0 );
remove_action( 'wp_head',             'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head',             'locale_stylesheet'                    );
remove_action( 'wp_head',             'noindex',                       1     );
remove_action( 'wp_head',             'wp_print_styles',               8     );
remove_action( 'wp_head',             'wp_print_head_scripts',         9     );
remove_action( 'wp_head',             'wp_generator'                         );
remove_action( 'wp_head',             'rel_canonical'                        );
remove_action( 'wp_head',             'wp_shortlink_wp_head',          10, 0 ); 

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles','print_emoji_styles' );
/**
 * 激活菜单功能
 */
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		'header-menu' => __( '主导航自定义菜单' ),
		'footer-menu' => __( 'footer底部导航' ),
		'sider-menu' => __('sidebar侧边栏菜单')
		)
	);
}

// /**
//  *定义网站的标题用来seo
//  */
// function temp1_wp_title( $title, $sep ) {
// 	global $paged, $page;

// 	if ( is_feed() ) {
// 		return $title;
// 	}

// 	// Add the site name.
// 	$title .= get_bloginfo( 'name', 'display' );

// 	// Add the site description for the home/front page.
// 	$site_description = get_bloginfo( 'description', 'display' );
// 	if ( $site_description && ( is_home() || is_front_page() ) ) {
// 		$title = "$title $sep $site_description";
// 	}

// 	// Add a page number if necessary.
// 	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
// 		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
// 	}

// 	return $title;
// }
// add_filter( 'wp_title', 'temp1_wp_title', 10, 2 );


/**
 * 日期格式
 */
if ( ! function_exists( 'temp1_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function temp1_entry_date_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '%4$s',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;




function listcategories(){
	$categories_list = get_the_category_list( __( ', ', 'temp1' ) );
	if ( $categories_list ) {
		echo '<span><i class="iconfont icon-iconfont90"></i>' . $categories_list . '</span>';
	}
}

function listTags(){
	$tag_list = get_the_tag_list( '', __( ', ', 'temp1' ) );
	if ( $tag_list ) {
		echo '<span><i class="iconfont icon-xiebiaoqian"></i>' . $tag_list . '</span>';
	}
}



/**
 * 注册侧边栏小工具
 */
function temp1_widgets_init(){
	register_sidebar(
		array(
			'name' =>"首页侧边栏",
			'id' => 'home-sidebar-1',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget' => '</div>',
			'before_title' => '<div class="hd">',
			'after_title' => '</div>',
		)
	);
	register_sidebar(
		array(
			'name' =>"新闻详细页侧边栏",
			'id' => 'detailpage-sidebar-1',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget' => '</div>',
			'before_title' => '<div class="hd">',
			'after_title' => '</div>',
		)
	);
	register_sidebar(
		array(
			'name' =>"分类列表页侧边栏",
			'id' => 'category-sidebar-1',
			'before_widget' => '<div class="sidebar-item">',
			'after_widget' => '</div>',
			'before_title' => '<div class="hd">',
			'after_title' => '</div>',
		)
	);
	
}
add_action( 'widgets_init', 'temp1_widgets_init' );


/**
 * 文章显示的时候决定截取的字符数
 * 在首页列表的时候很好用
 */
function new_excerpt_length($length) {
	return 300;
}
add_filter('excerpt_length', 'new_excerpt_length');
/**
 * 文章多出来的取代东西
 */
function new_excerpt_more($more) {
	return ' ..... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * 当前页面的别名
 */
function the_slug(){
	$content = $content . get_option('display_copyright_text');    $post_data = get_post($post->ID, ARRAY_A);
	return $slug = $post_data['post_name']; 
}

/**
 * 通过标签获取标签列表页的热门文章
 */
function get_current_tag_id() {
	$current_tag = single_tag_title('', false);//获得当前TAG标签名称
	$tags = get_tags();//获得所有TAG标签信息的数组
	foreach($tags as $tag) {
		if($tag->name == $current_tag) return $tag->term_id; //获得当前TAG标签ID，其中term_id就是tag ID
	}
}
//http://www.wufangbo.com/wordpress-fen-lei-wen-zhang/
/**
 * 首页，分类页面,详细页面,单页这四种情况，标签页，搜索页面
 */
function wpc_seo($s=''){
	$output='';
	$titles='';$keywords='';$descriptions='';
	if(is_home()){//如果是首页
		$titles='蜗牛博客';
		$keywords = "蜗牛博客,蜗牛世界,蜗牛部落,蜗牛前端开发";
		$descriptions = "蜗牛博客(wnworld.com)是一个关于web技术的博客,主要以学习和分享为主，致力于和广大的热爱编码的人一起探讨成长,实现互联网的Web开发，以此改善用户体验，蜗牛博客有你更精彩！";
	}elseif(is_category()){//如果分类页面
		$titles=single_cat_title('',false).' - 蜗牛博客';
		
		$cat = get_query_var('cat');
		$currentcat = get_category($cat);
		$slug=$currentcat->slug;
		$keywords=seo_getcategorykeyword($slug);
		
		$descriptions = str_replace("\n","",mb_strimwidth(strip_tags(category_description()), 0, 200, "…", 'utf-8'));  
	}elseif(is_tag()){//如果标签
		$titles=single_cat_title('',false)."学习".' - 蜗牛博客';
		$keywords ='';
		$descriptions ='';  
	}elseif(is_single()){//如果详细页
		$titles=single_post_title('',false).' - 蜗牛博客'; 
		$post = get_post();
	    $description1 = $description1 = get_post_meta($post->ID, "descriptions", true);
	    $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

	   // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
	   $descriptions = $description1 ? $description1 : $description2;

	   $keywords = get_post_meta($post->ID, "keywords", true);
	}elseif(is_page()){//单页(关键词和描述都是要通过添加字段的方式)
		$titles=single_post_title('',false).' - 蜗牛博客'; 
		$post = get_post();
		$description1 = get_post_meta($post->ID, "descriptions", true);
		$description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
		$descriptions = $description1 ? $description1 : $description2;

		$keywords = get_post_meta($post->ID, "keywords", true);
	}elseif(is_search()){
		$titles=wp_specialchars($s)." – "."蜗牛搜索";
		$descriptions='';
		$keywords='';
	}
	if(!empty($titles)){
		$output.='<title>'.$titles.'</title>';
	}
	if(!empty($keywords)){
		$output.='<meta content="'.$keywords.'" name="keywords">';
	}
	if(!empty($descriptions)){
		$output.='<meta content="'.$descriptions.'" name="Description">';
	}
	echo $output;
}
function seo_getcategorykeyword($name){
	$keywords='';
	if($name=='frontend'){
		$keywords="蜗牛web前端学习,蜗牛前端,蜗牛web前端";
	}else if($name=='houduan'){
		$keywords="蜗牛php学习,蜗牛mysql学习,蜗牛博客后端语言学习";
	}else if($name=='suisuiyu'){
		$keywords="蜗牛说说,蜗牛日志,蜗牛的那些事儿";
	}
	return $keywords;
}


/**
 * 单页中引入php文件然后执行
 * http://devework.com/run-php-code-in-wordpress-posts-and-pages.html
 */
function page_include( $attr ) {
    $file = $attr['file'];
    $folder ='./wp-content/pages/'.the_slug(). "/$file.php";
    ob_start();
    include ( $folder );
    return ob_get_clean();
}
add_shortcode( 'phpcode', 'page_include' );

/**
 * 是否生成当前的二维码
*/
function qrcode(){
	if(is_single()){
		$post = get_post();
	    $qrcodeVal= get_post_meta($post->ID, "qrcode", true);
	    if(!!$qrcodeVal){
	    	echo '<div class="qrcode-box">
				<a  href="javascript:void(0)" title="手机扫扫打开"><i class="iconfont icon-erweima"></i></a>
				<div class="qrcode-img"><span></span><img src="http://qr.liantu.com/api.php?w=125&m=0&text='.get_the_permalink().'" alt="扫扫手机测试"/></div>
			</div>';
	    }
	}
}


/**
 * 交换友情链接的ajax函数
 */
function exchangelinkAjax(){
	global $wpdb;
	$flag=true;
	if(isset($_GET["action"])){
		if($_GET["action"]=='exchangelink'){
			if(!$_SERVER['HTTP_X_REQUESTED_WITH']){
				get_template_part( '404');
				exit;
			}
			$url=$_POST["link_url"];
			$owner=$_POST["link_owner"];
			$name=$_POST["link_name"];
			$results=$wpdb->get_results("select * from $wpdb->links where link_url='$url'",'ARRAY_A');		
			if($results){
				if($results[0]["link_visible"]=="N"){
					echo "<p>亲，您无需重复提交网址！</p>";
					exit;
				}else{
					echo "亲,您已经是本站的友情链接了，无需再申请啦!";
					exit;
				}
			}else{
				$results=$wpdb->insert("wp_links",array("link_url"=>$url,"link_name"=>$name,"link_owner"=>$owner,"link_visible"=>"N"));
				if($results){
					echo 1;
					exit;
				}else{
					echo 0;
					exit;
				}
			}	
		}
	}
}
add_action('init', 'exchangelinkAjax');        







?>