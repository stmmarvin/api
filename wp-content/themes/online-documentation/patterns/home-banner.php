<?php
/**
 * Title: Home Banner
 * Slug: online-documentation/home-banner
 * Categories: template
 */
?>
<!-- wp:group {"className":"banner-main-sec","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-main-sec" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"className":"banner-section wow fadeIn","style":{"dimensions":{"minHeight":"500px"},"spacing":{"padding":{"top":"0rem","bottom":"0rem","left":"0rem","right":"0rem"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"0px"}},"gradient":"banner-background-main","layout":{"type":"default"}} -->
<div class="wp-block-group banner-section wow fadeIn has-banner-background-main-gradient-background has-background" style="border-radius:0px;min-height:500px;margin-top:0;margin-bottom:0;padding-top:0rem;padding-right:0rem;padding-bottom:0rem;padding-left:0rem"><!-- wp:cover {"dimRatio":0,"isUserOverlayColor":true,"minHeight":600,"isDark":false,"className":"banner-inner-bg","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light banner-inner-bg" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"banner-content","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"60%"}} -->
<div class="wp-block-group banner-content" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"className":"banner-inner-content wow zoomInLeft","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group banner-inner-content wow zoomInLeft" style="margin-top:0px;margin-bottom:0px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px","textTransform":"capitalize","fontStyle":"Thin","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"poppins"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'Search here to get answers to your questions', 'online-documentation' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"banner-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"35px","textTransform":"capitalize","fontStyle":"Thin","fontWeight":"600"},"spacing":{"margin":{"bottom":"25px"}}},"textColor":"background","fontFamily":"poppins"} -->
<h2 class="wp-block-heading has-text-align-center banner-title has-background-color has-text-color has-link-color has-poppins-font-family" style="margin-bottom:25px;font-size:35px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'find the answers you need in seconds', 'online-documentation' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"banner-search-box","style":{"border":{"radius":"30px"},"spacing":{"padding":{"top":"2px","bottom":"2px","left":"2px","right":"2px"}}},"backgroundColor":"background","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group banner-search-box has-background-background-color has-background" style="border-radius:30px;padding-top:2px;padding-right:2px;padding-bottom:2px;padding-left:2px"><!-- wp:categories {"displayAsDropdown":true,"showLabel":false,"style":{"typography":{"fontSize":"14px"},"spacing":{"padding":{"right":"12px"}}}} /-->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","buttonText":"Search","buttonPosition":"button-inside","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-filter-box","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group banner-filter-box"><!-- wp:paragraph {"className":"banner-filter-text","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontSize":"18px","fontStyle":"Thin","fontWeight":"600","lineHeight":"1.3"}},"textColor":"background","fontFamily":"poppins"} -->
<p class="banner-filter-text has-background-color has-text-color has-link-color has-poppins-font-family" style="font-size:18px;font-style:Thin;font-weight:600;line-height:1.3;text-transform:capitalize"><?php echo esc_html__( 'filters :', 'online-documentation' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"banner-filter-btn-box"} -->
<div class="wp-block-buttons banner-filter-btn-box"><!-- wp:button {"textColor":"background","className":"banner-filter-btn","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"Thin","fontWeight":"400","fontSize":"13px"},"color":{"background":"#00000000"},"border":{"width":"1px","color":"#ffffff","radius":"20px"},"spacing":{"padding":{"left":"15px","right":"15px","top":"4px","bottom":"4px"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button banner-filter-btn"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color has-border-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-color:#ffffff;border-width:1px;border-radius:20px;background-color:#00000000;padding-top:4px;padding-right:15px;padding-bottom:4px;padding-left:15px;font-size:13px;font-style:Thin;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'tags', 'online-documentation' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"banner-filter-btn","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"Thin","fontWeight":"400","fontSize":"13px"},"color":{"background":"#00000000"},"border":{"width":"1px","color":"#ffffff","radius":"20px"},"spacing":{"padding":{"left":"15px","right":"15px","top":"4px","bottom":"4px"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button banner-filter-btn"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color has-border-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-color:#ffffff;border-width:1px;border-radius:20px;background-color:#00000000;padding-top:4px;padding-right:15px;padding-bottom:4px;padding-left:15px;font-size:13px;font-style:Thin;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'latest', 'online-documentation' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"banner-filter-btn","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"Thin","fontWeight":"400","fontSize":"13px"},"color":{"background":"#00000000"},"border":{"width":"1px","color":"#ffffff","radius":"20px"},"spacing":{"padding":{"left":"15px","right":"15px","top":"4px","bottom":"4px"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button banner-filter-btn"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color has-border-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-color:#ffffff;border-width:1px;border-radius:20px;background-color:#00000000;padding-top:4px;padding-right:15px;padding-bottom:4px;padding-left:15px;font-size:13px;font-style:Thin;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'most viewed', 'online-documentation' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"banner-filter-btn","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"Thin","fontWeight":"400","fontSize":"13px"},"color":{"background":"#00000000"},"border":{"width":"1px","color":"#ffffff","radius":"20px"},"spacing":{"padding":{"left":"15px","right":"15px","top":"4px","bottom":"4px"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button banner-filter-btn"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color has-border-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-color:#ffffff;border-width:1px;border-radius:20px;background-color:#00000000;padding-top:4px;padding-right:15px;padding-bottom:4px;padding-left:15px;font-size:13px;font-style:Thin;font-weight:400;text-transform:capitalize"><?php echo esc_html__( 'categories', 'online-documentation' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"banner-bottom","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group banner-bottom" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"className":"banner-btm-outer","style":{"border":{"radius":"10px"}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group banner-btm-outer has-background-background-color has-background" style="border-radius:10px"><!-- wp:columns {"className":"banner-bottom-content wow zoomIn","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}}} -->
<div class="wp-block-columns banner-bottom-content wow zoomIn" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"className":"banner-bottom-box","style":{"border":{"right":{"color":"#0000001a","width":"2px"}},"spacing":{"padding":{"right":"30px"}}}} -->
<div class="wp-block-column banner-bottom-box" style="border-right-color:#0000001a;border-right-width:2px;padding-right:30px"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":43,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-1.png" alt="" class="wp-image-43" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'knowledge base', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"banner-bottom-box","style":{"border":{"right":{"color":"#0000001a","width":"2px"}},"spacing":{"padding":{"right":"30px"}}}} -->
<div class="wp-block-column banner-bottom-box" style="border-right-color:#0000001a;border-right-width:2px;padding-right:30px"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":43,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-2.png" alt="" class="wp-image-43" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'community forums', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"banner-bottom-box"} -->
<div class="wp-block-column banner-bottom-box"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":56,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-3.png" alt="" class="wp-image-56" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'documentation', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"banner-bottom-content wow zoomIn secondRow","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}}} -->
<div class="wp-block-columns banner-bottom-content wow zoomIn secondRow" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"className":"banner-bottom-box","style":{"border":{"right":{"color":"#0000001a","width":"2px"}},"spacing":{"padding":{"right":"30px"}}}} -->
<div class="wp-block-column banner-bottom-box" style="border-right-color:#0000001a;border-right-width:2px;padding-right:30px"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":43,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-4.png" alt="" class="wp-image-43" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'working with docs', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"banner-bottom-box","style":{"border":{"right":{"color":"#0000001a","width":"2px"}},"spacing":{"padding":{"right":"30px"}}}} -->
<div class="wp-block-column banner-bottom-box" style="border-right-color:#0000001a;border-right-width:2px;padding-right:30px"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":43,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-5.png" alt="" class="wp-image-43" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'getting started', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"banner-bottom-box"} -->
<div class="wp-block-column banner-bottom-box"><!-- wp:columns {"verticalAlignment":"center","className":"banner-info"} -->
<div class="wp-block-columns are-vertically-aligned-center banner-info"><!-- wp:column {"verticalAlignment":"center","width":"12%","className":"banner-info-left"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-left" style="flex-basis:12%"><!-- wp:image {"id":56,"width":"auto","height":"30px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-6.png" alt="" class="wp-image-56" style="width:auto;height:30px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"88%","className":"banner-info-right"} -->
<div class="wp-block-column is-vertically-aligned-center banner-info-right" style="flex-basis:88%"><!-- wp:heading {"level":6,"className":"banner-info-title","style":{"typography":{"textTransform":"capitalize","fontSize":"16px","fontStyle":"Thin","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<h6 class="wp-block-heading banner-info-title has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:Thin;font-weight:600;text-transform:capitalize"><?php echo esc_html__( 'account management', 'online-documentation' ); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"banner-info-desc","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"fontSize":"13px","fontStyle":"Thin","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading-color","fontFamily":"poppins"} -->
<p class="banner-info-desc has-heading-color-color has-text-color has-link-color has-poppins-font-family" style="margin-top:0px;margin-bottom:0px;font-size:13px;font-style:Thin;font-weight:400"><?php echo esc_html__( 'Lorem Ipsum is simply dummy text of the printing.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" id="toggleSecondRow" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"gradient":"icon-background-color","className":"show-btn","style":{"border":{"radius":"100px","width":"0px","style":"none"},"spacing":{"padding":{"left":"12px","right":"12px","top":"10px","bottom":"10px"}}}} -->
<div class="wp-block-button show-btn"><a class="wp-block-button__link has-icon-background-color-gradient-background has-background wp-element-button" style="border-style:none;border-width:0px;border-radius:100px;padding-top:10px;padding-right:12px;padding-bottom:10px;padding-left:12px"><img class="wp-image-126" style="width: 150px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/down.png" alt=""></a></div>
<!-- /wp:button -->

<!-- wp:button {"gradient":"icon-background-color","className":"hide-btn","style":{"border":{"radius":"100px","width":"0px","style":"none"},"spacing":{"padding":{"left":"12px","right":"12px","top":"10px","bottom":"10px"}}}} -->
<div class="wp-block-button hide-btn"><a class="wp-block-button__link has-icon-background-color-gradient-background has-background wp-element-button" style="border-style:none;border-width:0px;border-radius:100px;padding-top:10px;padding-right:12px;padding-bottom:10px;padding-left:12px"><img class="wp-image-133" style="width: 150px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/up.png" alt=""></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->