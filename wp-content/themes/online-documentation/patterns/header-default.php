<?php
/**
 * Title: Header Default
 * Slug: online-documentation/header-default
 * Categories: header
 */
?>
<!-- wp:group {"className":"main-header-section","style":{"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group main-header-section" style="padding-top:10px;padding-bottom:10px"><!-- wp:columns {"className":"header-inner-section","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}}} -->
<div class="wp-block-columns header-inner-section" style="border-radius:6px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-logo"} -->
<div class="wp-block-column is-vertically-aligned-center header-logo" style="flex-basis:20%"><!-- wp:site-title {"textAlign":"center","className":"header-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}},"typography":{"textTransform":"capitalize","fontSize":"22px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"border":{"radius":"100px"},"spacing":{"padding":{"top":"10px"}}},"textColor":"heading-color"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"63%","className":"header-menu-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-menu-box" style="flex-basis:63%"><!-- wp:navigation {"overlayBackgroundColor":"primary","overlayTextColor":"background","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"top-menus","style":{"typography":{"lineHeight":"1.5","textTransform":"capitalize","fontSize":"15px","fontStyle":"Thin","fontWeight":"500"},"spacing":{"blockGap":"50px"}},"fontFamily":"poppins","layout":{"type":"flex","orientation":"horizontal","justifyContent":"center"}} -->
<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Documentation","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Pages","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Buy Now","opensInNewTab":true,"url":"https://www.vwthemes.com/products/documentation-wordpress-theme","kind":"custom","isTopLevelLink":true,"className":"buynow-btn"} /-->

<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"17%","className":"header-btn-box","fontFamily":"inter"} -->
<div class="wp-block-column is-vertically-aligned-center header-btn-box has-inter-font-family" style="flex-basis:17%"><!-- wp:group {"className":"header-btn-inner","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group header-btn-inner"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons" id="theme-toggle"><!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"0px","width":"0px","style":"none"},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"600","textTransform":"capitalize"},"spacing":{"padding":{"left":"0px","right":"0px","top":"0px","bottom":"0px"}},"color":{"background":"#00000000"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;border-radius:0px;background-color:#00000000;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;font-size:15px;font-style:normal;font-weight:600;text-transform:capitalize"><img class="wp-image-241" style="width: 150px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/light-img.png" alt=""><img class="wp-image-242" style="width: 150px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/dark-img.png" alt=""></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:buttons {"className":"header-btn"} -->
<div class="wp-block-buttons header-btn"><!-- wp:button {"backgroundColor":"heading-color","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"15px","textTransform":"capitalize","fontStyle":"Thin","fontWeight":"500"},"border":{"radius":"30px","width":"0px","style":"none"},"spacing":{"padding":{"left":"20px","right":"20px","top":"5px","bottom":"5px"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-heading-color-background-color has-text-color has-background has-link-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-style:none;border-width:0px;border-radius:30px;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px;font-size:15px;font-style:Thin;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'get started', 'online-documentation' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->