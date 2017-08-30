<?php $scriptstyleUrl=home_url('/wp-content/pages/').the_slug();
		echo $scriptstyleUrl;
 ?>
<link rel="stylesheet" type="text/css" href="<?= $scriptstyleUrl; ?>/css/style.css">

<script src="http://libs.baidu.com/jquery/1.11.1/jquery.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/common.js"></script>
