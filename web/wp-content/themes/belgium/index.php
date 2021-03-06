<?php

/*
 *
 * Simulates template heirarchy but uses blade templates
 *
 */

require_once "vendor/autoload.php";
Use eftec\bladeone\BladeOne;

$views = __DIR__ . '/src/views'; // it uses the folder /views to read the templates
$cache = wp_upload_dir()['basedir'] . '/cache'; // it uses the folder /cache to compile the result. 

// The nulls indicates the default folders. By drfault it's /views and /compiles
// \eftec\bladeone\BladeOne::MODE_DEBUG is useful because it indicates the correct file if the template fails to load.  
//  You must disable it in production. 
$blade = new BladeOne(
  $views,
  $cache,
  BladeOne::MODE_AUTO
);

// mock template heirarchy
$template = false;
if ( is_embed() && $template                 = 'embed' ) :
elseif ( is_404() && $template               = '404' ) :
elseif ( is_search() && $template            = 'search' ) :
elseif ( is_front_page() && $template        = 'page' ) :
elseif ( is_home() && $template              = 'page' ) :
elseif ( is_post_type_archive() && $template = 'post_type_archive' ) :
elseif ( is_tax() && $template               = 'tax' ) :
elseif ( is_attachment() && $template        = 'attachment' ) :
elseif ( is_single() && $template            = 'single' ) :
elseif ( is_page() && $template              = 'page' ) :
elseif ( is_singular() && $template          = 'singular' ) :
elseif ( is_category() && $template          = 'category' ) :
elseif ( is_media() && $template             = 'media' ) :
elseif ( is_tag() && $template               = 'tag' ) :
elseif ( is_author() && $template            = 'author' ) :
elseif ( is_date() && $template              = 'date' ) :
elseif ( is_product() && $template           = 'product' ) :
elseif ( is_archive() && $template           = 'archive' ) :
else :
  $template                                  = 'page';
endif;

/* echo $template; */

/* if ($template === 'attorney') { */
/*   $template = 'page'; */
/* } */

if ($template === 'single') {
  $type = get_post_type(get_the_ID());
  if ($type == 'product') {$template = 'product';}
}


// render template
echo $blade->run($template);
