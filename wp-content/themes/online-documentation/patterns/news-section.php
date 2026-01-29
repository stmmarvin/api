<?php
/**
 * Title: News Section
 * Slug: online-documentation/news-section
 * Categories: template
 */
?>
<!-- wp:group {"className":"news-section","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0rem","bottom":"0rem"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group news-section" style="margin-top:0px;margin-bottom:0px;padding-top:0rem;padding-bottom:0rem"><!-- wp:columns {"className":"news-heading-box wow fadeInDown","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns news-heading-box wow fadeInDown" style="margin-bottom:var(--wp--preset--spacing--70)"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","className":"news-heading-inner-box"} -->
<div class="wp-block-column news-heading-inner-box" style="flex-basis:50%"><!-- wp:paragraph {"align":"center","className":"news-small-title","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0rem","right":"0rem"},"margin":{"bottom":"0px"}},"border":{"radius":"5px"}},"fontSize":"medium"} -->
<p class="has-text-align-center news-small-title has-medium-font-size" style="border-radius:5px;margin-bottom:0px;padding-top:0px;padding-right:0rem;padding-bottom:0px;padding-left:0rem;font-style:normal;font-weight:500;text-transform:capitalize"><?php echo esc_html__( 'news & blogs', 'online-documentation' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":4,"className":"news-sec-heading","style":{"typography":{"textTransform":"capitalize","fontSize":"25px","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center news-sec-heading" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0rem;font-size:25px;font-style:normal;font-weight:700;text-transform:capitalize"><?php echo esc_html__( 'our latest news & blogs', 'online-documentation' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","lineHeight":1.4},"spacing":{"margin":{"top":"12px"}}}} -->
<p class="has-text-align-center" style="margin-top:12px;font-size:15px;line-height:1.4"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi elit, consequat pharetra elementum nec, eleifend non turpis.', 'online-documentation' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:query {"queryId":11,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"metadata":{"categories":["posts"],"patternName":"core/query-standard-posts","name":"Standard"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"news-box owl-carousel wow fadeInUp","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"news-img","style":{"dimensions":{"minHeight":"230px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"color":{"background":"#797979"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group news-img has-background" style="border-radius:20px;background-color:#797979;min-height:230px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"isLink":true,"height":"230px","align":"wide","style":{"border":{"radius":"20px"},"color":[]}} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":5,"isLink":true,"className":"news-box-title","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|30"}}}} /-->

<!-- wp:post-excerpt {"className":"news-box-desc","style":{"typography":{"fontSize":"15px","lineHeight":1.4},"spacing":{"margin":{"top":"0px","bottom":"5px"}}}} /-->

<!-- wp:group {"className":"news-meta","fontFamily":"inter","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group news-meta has-inter-font-family"><!-- wp:post-author-name {"style":{"typography":{"textTransform":"capitalize","lineHeight":"1.2","fontStyle":"normal","fontWeight":"600","fontSize":"15px"},"spacing":{"padding":{"left":"var:preset|spacing|50","top":"3px"}}}} /-->

<!-- wp:post-date {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"padding":{"left":"var:preset|spacing|50","top":"3px"}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"15px"}}} /-->

<!-- wp:comments -->
<div class="wp-block-comments"><!-- wp:comments-title {"showPostTitle":false,"level":6,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"15px","textTransform":"capitalize"},"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"left":"var:preset|spacing|50","top":"3px"}}}} /--></div>
<!-- /wp:comments --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->