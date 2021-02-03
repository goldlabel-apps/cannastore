<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Cannastore
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="theme-color" content="#255150" />
<meta name="apple-mobile-web-app-title" content="Cannastore.app" />
<meta name="application-name" content="Cannastore.app" />
<link rel="apple-touch-icon" href="https://cannastore.app/wp-content/uploads/2021/02/apple-touch-icon-180x180-1.png" />

<!-- <link rel="manifest" href="/manifest.json" /> -->

<meta name="mobile-web-app-capable" content="yes" />
<meta property="al:android:app_name" content="Cannastore.app" />
<meta property="al:ios:app_name" content="Cannastore.app" />
<meta property="al:windows:app_name" content="Cannastore.app" />

<meta property="og:url" content="https://cannastore.app" />
<meta property="og:site_name" content="Cannastore.app" />
<meta property="og:title" content="Cannastore.app" />
<meta property="og:description" content="The World's First Mobile Cannabis App" />
<meta property="og:image" content="https://cannastore.app/wp-content/uploads/2021/02/open-graph.png" />
<meta property="og:image:alt" content="Cannastore is the World's First Mobile Cannabis App" />
<meta property="og:locale" content="en_pi" />
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="938" />
<meta property="og:image:height" content="530" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Cannastore.app" />
<meta name="twitter:description" content="The World's First Mobile Cannabis App" />
<meta name="twitter:image" content="https://cannastore.app/wp-content/uploads/2021/02/twitter-card.png" />
<meta name="twitter:image:alt" content="Cannastore is the World's First Mobile Cannabis App" />

<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'newsup' ); ?></a>
    <div class="wrapper" id="custom-background-css">
        <header class="mg-headwidget">
            <!--==================== TOP BAR ====================-->


            <?php do_action('newsup_action_header_section');  ?>
            <div class="clearfix"></div>
            
            <!-- Insert Cannastore.app -->
            <?php require (get_template_directory() . '/cannastore/cannastore-header.php');  ?>

    <div class="mg-menu-full">
      <nav class="navbar navbar-expand-lg navbar-wp">
        <div class="container-fluid flex-row-reverse">
          <!-- Right nav -->
                    <div class="m-header d-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                        <?php $home_url = home_url(); ?>
                        <a class="mobilehomebtn" href="<?php echo esc_url($home_url); ?>"><span class="fa fa-home"></span></a>
                        <!-- navbar-toggle -->
                        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbar-wp" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <i class="fa fa-bars"></i>
                        </button>
                        <!-- /navbar-toggle -->
                        <div class="dropdown show mg-search-box pr-2">
                            <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-search"></i>
                            </a>

                            <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                        <?php get_search_form(); ?>
                      </div>
                        </div>
                        
                    </div>
                    <!-- /Right nav -->
         
          
                  <div class="collapse navbar-collapse" id="navbar-wp">
                  	<div class="d-md-block">
                  <?php wp_nav_menu( array(
        								'theme_location' => 'primary',
        								'container'  => 'nav-collapse collapse navbar-inverse-collapse',
        								'menu_class' => 'nav navbar-nav mr-auto',
        								'fallback_cb' => 'newsup_fallback_page_menu',
        								'walker' => new newsup_nav_walker()
        							) ); 
        						?>
        				</div>		
              		</div>
          </div>
      </nav> <!-- /Navigation -->
    </div>
</header>
<div class="clearfix"></div>
<?php  if (is_front_page() || is_home()) { ?>

 <?php }?>
 <?php do_action('newsup_action_banner_exclusive_posts'); 
 do_action('newsup_action_front_page_main_section_1'); ?>