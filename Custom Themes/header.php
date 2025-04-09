<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <!-- Top Bar with Contact Info and Social Links -->
    <div class="header-top-bar">
        <div class="container">
            <div class="header-contact">
                <span class="contact-item"><i class="fas fa-phone"></i> (123) 456-7890</span>
                <span class="contact-item"><i class="fas fa-envelope"></i> info@obitobiseats.com</span>
                <span class="contact-item"><i class="fas fa-clock"></i> Open Now</span>
            </div>
            <div class="header-social">
                <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Header with Logo and Navigation -->
    <div class="main-header">
        <div class="container">
            <div class="header-wrapper">
                <!-- Site Branding -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                                <?php the_custom_logo(); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-link">
                                ObiTobi's <span class="highlight">Eats</span>
                            </a>
                        </h1>
                    <?php endif; ?>
                </div>

                <!-- Main Navigation -->
                <nav class="main-navigation" role="navigation" aria-label="Main Menu">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-icon"></span>
                        <span class="screen-reader-text">Menu</span>
                    </button>
                    
                    <div class="nav-wrapper">
                        <ul class="nav-menu">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">Home</a></li>
                            
                            <!-- Shop Menu Item with Dropdown -->
                            <li class="menu-item-has-children">
                                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="nav-link">Shop</a>
                                <ul class="sub-menu">
                                    <?php
                                    // Appetizers
                                    $appetizers = get_term_by('slug', 'appetizers', 'product_cat');
                                    if ($appetizers) {
                                        echo '<li><a href="' . esc_url(get_term_link($appetizers)) . '">Appetizers</a></li>';
                                    }

                                    // Beverages and sub-categories
                                    $beverages = get_term_by('slug', 'beverages', 'product_cat');
                                    if ($beverages) {
                                        echo '<li class="menu-item-has-children">';
                                        echo '<a href="' . esc_url(get_term_link($beverages)) . '">Beverages</a>';
                                        echo '<ul class="sub-menu">';
                                        
                                        // Alcoholic Drinks
                                        $alcoholic = get_term_by('slug', 'alcoholic-drinks', 'product_cat');
                                        if ($alcoholic) {
                                            echo '<li><a href="' . esc_url(get_term_link($alcoholic)) . '">Alcoholic Drinks</a></li>';
                                        }
                                        
                                        // Non-Alcoholic Drinks
                                        $non_alcoholic = get_term_by('slug', 'non-alcoholic-drinks', 'product_cat');
                                        if ($non_alcoholic) {
                                            echo '<li><a href="' . esc_url(get_term_link($non_alcoholic)) . '">Non-Alcoholic Drinks</a></li>';
                                        }
                                        
                                        echo '</ul>';
                                        echo '</li>';
                                    }

                                    // Desserts
                                    $desserts = get_term_by('slug', 'desserts', 'product_cat');
                                    if ($desserts) {
                                        echo '<li><a href="' . esc_url(get_term_link($desserts)) . '">Desserts</a></li>';
                                    }

                                    // Main Course and sub-categories
                                    $main_course = get_term_by('slug', 'main-course', 'product_cat');
                                    if ($main_course) {
                                        echo '<li class="menu-item-has-children">';
                                        echo '<a href="' . esc_url(get_term_link($main_course)) . '">Main Course</a>';
                                        echo '<ul class="sub-menu">';
                                        
                                        // Pasta Dishes
                                        $pasta = get_term_by('slug', 'pasta-dishes', 'product_cat');
                                        if ($pasta) {
                                            echo '<li><a href="' . esc_url(get_term_link($pasta)) . '">Pasta Dishes</a></li>';
                                        }
                                        
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </li>

                            <?php
                            // Get Our Story page
                            $our_story = get_page_by_path('our-story');
                            if ($our_story) : ?>
                                <li><a href="<?php echo esc_url(get_permalink($our_story->ID)); ?>" class="nav-link">Our Story</a></li>
                            <?php else: ?>
                                <li><a href="#" class="nav-link" style="color: red;">Our Story (Page not found)</a></li>
                            <?php endif; ?>

                            <?php
                            // Get Get in Touch page
                            $get_in_touch = get_page_by_path('get-in-touch');
                            if ($get_in_touch) : ?>
                                <li><a href="<?php echo esc_url(get_permalink($get_in_touch->ID)); ?>" class="nav-link">Get in Touch</a></li>
                            <?php else: ?>
                                <li><a href="#" class="nav-link" style="color: red;">Get in Touch (Page not found)</a></li>
                            <?php endif; ?>

                            <?php if (class_exists('WooCommerce')) : ?>
                                <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="nav-link cart-link">
                                    Cart <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>

                <!-- Header Actions (Cart) -->
                <?php if (class_exists('WooCommerce')) : ?>
                    <div class="header-actions">
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-button" aria-label="Shopping Cart">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main class="site-content"> 