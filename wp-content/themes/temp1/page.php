<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php wpc_seo($s); ?>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/wnstyle.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/iconfont/iconfont.css">
</head>
<body>
	<?php if(have_posts()) : ?> 
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</body>
</html>