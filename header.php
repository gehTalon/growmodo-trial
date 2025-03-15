<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Announcement Bar -->
    <div class="announcement-bar text-center">
        <span>✨Discover Your Dream Property with Estatein <a href="#">Learn More</a></span>
        <button class="close-announcement" onclick="this.parentElement.style.display='none';">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close-button.png" alt="close">     
        </button>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark main-navbar">
        <div class="container">
            <div class="d-flex w-100 align-items-center">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="logo me-2">                    
                </a>
                <!-- Menu and Button Wrapper -->
                <div class="d-flex align-items-center m-auto">
                    <!-- Menu -->
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav m-auto mb-2 mb-lg-0 gap-4',
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2
                    ]);
                    ?>
                    <!-- Contact Us Button -->
                </div>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline-none  ms-3">Contact Us</a>
            </div>
        </div>
    </nav>