<?php
//about theme info

/* Add to Dashboard main menu */
function online_documentation_dashboard_menu() {
    add_menu_page(
        esc_html__( 'Online Documentation', 'online-documentation' ), // Page title
        esc_html__( 'Online Documentation', 'online-documentation' ), // Menu title
        'manage_options',                                             // Capability
        'online-documentation-info',                                  // Menu slug (same)
        'online_documentation_theme_page_display',                    // Callback
         get_template_directory_uri() . '/images/menu-icon.svg', // Image icon
        59                                           // Position
    );
}
add_action( 'admin_menu', 'online_documentation_dashboard_menu' );

// Add a Custom CSS file to WP Admin Area
function online_documentation_admin_theme_style() {
	wp_enqueue_style('online-documentation-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('online-documentation-tabs', esc_url(get_template_directory_uri()) . '/inc/core/js/tab.js');
}
add_action('admin_enqueue_scripts', 'online_documentation_admin_theme_style');

//guidline for about theme
function online_documentation_theme_page_display() { 
	//custom function about theme customizer
	$online_documentation_return = add_query_arg( array()) ;
	$online_documentation_theme = wp_get_theme( 'online-documentation' );
?>

<div class="wrapper-info">
	<div class="tab-sec">
    	
    	<div class="tab">
			<button class="tablinks" onclick="online_documentation_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'online-documentation' ); ?></button>
			<button class="tablinks" onclick="online_documentation_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'online-documentation' ); ?></button>
  			<button class="tablinks" onclick="online_documentation_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'online-documentation' ); ?></button>
  			<button class="tablinks" onclick="online_documentation_open_tab(event, 'get_bundle')"><?php esc_html_e( 'WP Theme Bundle', 'online-documentation' ); ?></button>
		</div>

		<?php 
			$online_documentation_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$online_documentation_plugin_custom_css ='display: block';
			}
		?>

		<div id="lite_theme" class="tabcontent open">
			<div class="lite-theme-tab">
				<h3><?php esc_html_e( 'Online Documentation', 'online-documentation' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('The Online Documentation Theme is a powerful, user-friendly solution designed for businesses, developers, SaaS companies, product owners, and ecommerce brands to create professional help centers, knowledge bases, product guides, API documentation, and support portals while also supporting ecommerce functionality for selling digital products, premium guides, online courses, and training materials through WooCommerce, making it ideal for dropshipping shops, POD stores, and ecommerce templates; the theme offers a clean, intuitive, and fast-loading layout optimized for desktops, tablets, and smartphones, with advanced search functionality, categorized content, interactive navigation, code highlighting for developers, and bbPress compatibility for community forums to enhance engagement and troubleshooting discussions, while Contact Form 7 enables quick support inquiries and Yoast SEO ensures higher search visibility, boosting user experience and trust; lightweight and flexible, it allows brand customization, structured onboarding, tutorials, FAQs, and product knowledge presentation, making the Online Documentation Theme a conversion-focused, professional platform to increase customer satisfaction, streamline support, and generate additional revenue through integrated online store capabilities.','online-documentation'); ?></p>
			  	<div class="col-left-inner">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'online-documentation'); ?></a>
					</div>
					<div class="support-forum-col-section">
						<div class="support-forum-col">
							<h4><?php esc_html_e('Having Trouble, Need Support?', 'online-documentation'); ?></h4>
							<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'online-documentation'); ?></p>
							<div class="info-link">
								<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'online-documentation'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Reviews & Testimonials', 'online-documentation'); ?></h4>
							<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'online-documentation'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'online-documentation'); ?></a>
							</div>
						</div>
						<div class="support-forum-col">
							<h4><?php esc_html_e('Theme Documentation', 'online-documentation'); ?></h4>
							<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'online-documentation'); ?>  </p>
							<div class="info-link">
								<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'online-documentation'); ?></a>
							</div>
						</div>
					</div>
			  	</div>
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">		  	
			<div class="pro-info">
				<div class="col-left-pro">
					<h3><?php esc_html_e( 'Premium Theme Information', 'online-documentation' ); ?></h3>
					<hr class="h3hr">
			    	<p><?php esc_html_e('Our Documentation WordPress Theme is a modern, responsive, and highly functional theme designed to help SaaS companies, startups, and businesses build professional online documentation with ease. Featuring a clean layout, intuitive navigation, and flexible customization options, this theme makes it simple for users to access tutorials, guides, and knowledge bases without distraction. Whether you’re creating documentation for apps, software, or digital services, it ensures an enhanced user experience with smooth navigation and organized content flow. The theme comes with multiple layout options, allowing you to adapt it across industries while maintaining readability and a polished design. With its mobile-friendly structure, users can easily view your documentation on smartphones, tablets, or desktops. Built on a lightweight and optimized framework, it delivers fast load times, improving both performance and SEO rankings. The theme integrates with leading page builders and includes advanced search functionality, enabling users to quickly find what they’re looking for. Blending usability, speed, and design, it’s the perfect choice for businesses that want to provide clear, accessible, and professional documentation.','online-documentation'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'online-documentation'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/premium-img.jpg" alt="" class="pro-img" />		    	
			    </div>
			</div>		    
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'online-documentation' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th><?php esc_html_e('Features', 'online-documentation'); ?></th>
								<th><?php esc_html_e('Free Themes', 'online-documentation'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'online-documentation'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Easy Setup', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('SEO Friendly', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Banner Settings', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'online-documentation'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'online-documentation'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'online-documentation'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'online-documentation'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'online-documentation'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'online-documentation'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'online-documentation'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'online-documentation'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Influence Registration', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Detailed Influencer Portfolio', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Pricing Plan', 'online-documentation'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
							<td></td>
							<td class="table-img"></td>
							<td class="update-link"><a href="<?php echo esc_url( ONLINE_DOCUMENTATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'online-documentation'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">	
			<div class="bundle-info">
				<div class="col-left-pro">
			   		<h3><?php esc_html_e( 'WP Theme Bundle', 'online-documentation' ); ?></h3>
			   		<hr class="h3hr">
			    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 400+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','online-documentation'); ?></p>
			    	<div class="feature">
			    		<h4><?php esc_html_e( 'Features:', 'online-documentation' ); ?></h4>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('400+ Premium Themes & 5+ Plugins.', 'online-documentation'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Seamless Integration.', 'online-documentation'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Customization Flexibility.', 'online-documentation'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Regular Updates.', 'online-documentation'); ?></p>
			    		<p><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tick.png" alt="" /><?php esc_html_e('Dedicated Support.', 'online-documentation'); ?></p>
			    	</div>
			    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'online-documentation'); ?></p>
			    	<div class="pro-links">
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank" class="bundle-buy"><?php esc_html_e('Get Bundle', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_THEME_BUNDLE_DOC ); ?>" target="_blank" class="bundle-doc"><?php esc_html_e('Documentation', 'online-documentation'); ?></a>
					</div>
			   	</div>
			   	<div class="col-right-pro scroll-image-wrapper">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle.jpg" alt="" />
			   	</div>
			</div>	  	
		</div>
	</div>
	<div class="coupen-code-section">
		<div class="sshot-section">
			<div class="sshot-inner">
				<h2><?php esc_html_e('Welcome To Online Documentation','online-documentation'); ?> </h2>
				<div class="on-pro">
					<span class="version"><?php esc_html_e( 'Version', 'online-documentation' ); ?>: <?php echo esc_html($online_documentation_theme['Version']);?></span>
					<span class="coupon-code"><?php esc_html_e('Get 20% Of On Pro Theme-Use Code: ','online-documentation'); ?><span class="code-highlight"><?php esc_html_e('VWPRO20','online-documentation'); ?></span>
				</div>
		    	<p><?php esc_html_e('All Our Wordpress Themes Are Modern, Minimalist, 100% Responsive, Seo-Friendly,Feature-Rich, And Multipurpose That Best Suit Designers, Bloggers And Other Professionals Who Are Working In The Creative Fields.','online-documentation'); ?></p>
		    	<div class="btn-section">
			    	<div class="proo-links">
				    	<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_LIVE_DEMO ); ?>" target="_blank" class="demo-btn"><?php esc_html_e('Live Demo', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_BUY_NOW ); ?>" target="_blank" class="prem-btn"><?php esc_html_e('Buy Premium', 'online-documentation'); ?></a>
						<a href="<?php echo esc_url( ONLINE_DOCUMENTATION_PRO_DOC ); ?>" target="_blank" class="doc-btn"><?php esc_html_e('Documentation', 'online-documentation'); ?></a>
						
					</div>
			    	
			    </div>
			</div>
	    	<div class="bundle-banner">
	    		<div class="bundle-img">
	    			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/bundle-notice.png" alt="" />
	    		</div>
	    		<div class="bundle-text">
		  			<h2><?php esc_html_e('WP THEME BUNDLE','online-documentation'); ?></h2>
					<h4><?php esc_html_e('Get Access to 400+ Premium WordPress Themes At Just $99','online-documentation'); ?></h4>
					<div class="bundle-button">
			  			<a href="<?php echo esc_url( 'https://www.vwthemes.com/discount/FREEBREF?redirect=/products/wp-theme-bundle'); ?>" target="_blank"><?php esc_html_e('Get 10% OFF On Bundle', 'online-documentation'); ?></a>
			  		</div>
		  		</div>
	    	</div>
	    </div>
	    <div class="coupen-section">
	    	<div class="logo-section">
			  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		  	</div>
		  	<div class="logo-right">	
		  		<div class="logo-text">
		  			<h2><?php esc_html_e('GET PRO','online-documentation'); ?></h2>
					<h4><?php esc_html_e('20% Off','online-documentation'); ?></h4>
		  		</div>						
			</div>
	    </div>
	</div>
</div>

<?php } ?>