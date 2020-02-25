<?php
/*
Template Name: iOS Signup
*/
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Mobile viewport optimized: j.mp/bplateviewport -->

  <!-- Stylesheet, ping, favicon, humans.txt -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico">
  <link rel="author" href="/humans.txt" />

  <!-- Modenizr -->
  <script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>

  <style>
    div.wrapper { width: 280px; }
    body { min-width: 280px; }
    .signup-row label { line-height: 0.9em; float: none; text-align: left; }
    .signup-row input { width: 268px; }
  </style>
</head>
<body <?php body_class(); ?>>
  <div class="container group">
    <div id="content" class="content group wrapper">
      <div class="main main-full">
          <?php get_template_part('loop','page'); ?>
      </div>
    </div>
  </div>
</body>
</html>
