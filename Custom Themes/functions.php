<?php
if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
function gourmet_delight_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gourmet-delight'),
        'footer' => __('Footer Menu', 'gourmet-delight'),
    ));

    // Add image sizes
    add_image_size('menu-item-thumbnail', 400, 300, true);
    add_image_size('hero-image', 1920, 1080, true);
}
add_action('after_setup_theme', 'gourmet_delight_setup');

// Register Menu Items Custom Post Type
function register_menu_items_post_type() {
    $labels = array(
        'name'               => 'Menu Items',
        'singular_name'      => 'Menu Item',
        'menu_name'          => 'Menu Items',
        'add_new'            => 'Add New Item',
        'add_new_item'       => 'Add New Menu Item',
        'edit_item'          => 'Edit Menu Item',
        'new_item'           => 'New Menu Item',
        'view_item'          => 'View Menu Item',
        'search_items'       => 'Search Menu Items',
        'not_found'          => 'No menu items found',
        'not_found_in_trash' => 'No menu items found in trash',
        'all_items'          => 'All Menu Items'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'menu-items'),
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-food',
        'show_in_rest'       => true,
    );

    register_post_type('menu_item', $args);

    // Register Menu Category Taxonomy
    $category_labels = array(
        'name'              => 'Menu Categories',
        'singular_name'     => 'Menu Category',
        'search_items'      => 'Search Menu Categories',
        'all_items'         => 'All Menu Categories',
        'parent_item'       => 'Parent Menu Category',
        'parent_item_colon' => 'Parent Menu Category:',
        'edit_item'         => 'Edit Menu Category',
        'update_item'       => 'Update Menu Category',
        'add_new_item'      => 'Add New Menu Category',
        'new_item_name'     => 'New Menu Category Name',
        'menu_name'         => 'Menu Categories'
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'menu-category'),
        'show_in_rest'     => true
    );

    register_taxonomy('menu_category', 'menu_item', $category_args);

    // Register Dietary Options Taxonomy
    $dietary_labels = array(
        'name'              => 'Dietary Options',
        'singular_name'     => 'Dietary Option',
        'search_items'      => 'Search Dietary Options',
        'all_items'         => 'All Dietary Options',
        'edit_item'         => 'Edit Dietary Option',
        'update_item'       => 'Update Dietary Option',
        'add_new_item'      => 'Add New Dietary Option',
        'new_item_name'     => 'New Dietary Option Name',
        'menu_name'         => 'Dietary Options'
    );

    $dietary_args = array(
        'hierarchical'      => false,
        'labels'            => $dietary_labels,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'dietary-option'),
        'show_in_rest'     => true
    );

    register_taxonomy('dietary_option', 'menu_item', $dietary_args);
}
add_action('init', 'register_menu_items_post_type');

// Create Shortcode for Featured Menu Items
function featured_menu_items_shortcode($atts) {
    $atts = shortcode_atts(array(
        'number' => 3,
    ), $atts);

    $args = array(
        'post_type' => 'menu_item',
        'posts_per_page' => $atts['number'],
        'meta_key' => 'featured',
        'meta_value' => 'yes'
    );

    $query = new WP_Query($args);
    
    $output = '<div class="featured-menu-items">';
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="menu-item animate-on-scroll">';
            $output .= '<h3>' . get_the_title() . '</h3>';
            if (has_post_thumbnail()) {
                $output .= get_the_post_thumbnail(null, 'menu-item-thumbnail');
            }
            $output .= '<div class="menu-item-description">' . get_the_excerpt() . '</div>';
            $output .= '</div>';
        }
    }
    
    $output .= '</div>';
    
    wp_reset_postdata();
    return $output;
}
add_shortcode('featured_menu_items', 'featured_menu_items_shortcode');

// Enqueue scripts and styles
function gourmet_delight_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap', array(), null);
    
    // Theme stylesheet
    wp_enqueue_style('gourmet-delight-style', get_stylesheet_uri());
    
    // Custom JavaScript
    wp_enqueue_script('gourmet-delight-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
    
    // Animations JavaScript
    wp_enqueue_script('custom-animations', get_template_directory_uri() . '/js/animations.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'gourmet_delight_scripts');

// Add customizer settings
function gourmet_delight_customize_register($wp_customize) {
    // Add section for theme colors
    $wp_customize->add_section('gourmet_delight_colors', array(
        'title' => __('Theme Colors', 'gourmet-delight'),
        'priority' => 30,
    ));

    // Primary color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#e67e22',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'gourmet-delight'),
        'section' => 'gourmet_delight_colors',
        'settings' => 'primary_color',
    )));

    // Secondary color
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary Color', 'gourmet-delight'),
        'section' => 'gourmet_delight_colors',
        'settings' => 'secondary_color',
    )));
}
add_action('customize_register', 'gourmet_delight_customize_register');

function obitobi_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('obitobi-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue header JavaScript
    wp_enqueue_script('obitobi-header', get_template_directory_uri() . '/js/header.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'obitobi_scripts');

// Custom Menu Walker
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= ' <span class="dropdown-toggle"></span>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Register Navigation Menus
function register_custom_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'obitobis-eats'),
        'footer-menu' => __('Footer Menu', 'obitobis-eats')
    ));
}
add_action('init', 'register_custom_menus');

// Add test mode notice
function add_test_mode_notice() {
    if (class_exists('WooCommerce') && get_option('woocommerce_stripe_testmode') === 'yes') {
        ?>
        <div class="test-mode-notice">
            <p>⚠️ This site is in test mode. Use test card number: 4242 4242 4242 4242</p>
        </div>
        <?php
    }
}
add_action('woocommerce_before_cart', 'add_test_mode_notice');
add_action('woocommerce_before_checkout_form', 'add_test_mode_notice');

// Add test mode notice styles
function add_test_mode_notice_styles() {
    ?>
    <style>
        .test-mode-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        .test-mode-notice p {
            margin: 0;
            font-weight: 500;
        }
    </style>
    <?php
}
add_action('wp_head', 'add_test_mode_notice_styles');

// Register Custom Product Categories
function register_menu_categories() {
    // Main Menu Categories
    $menu_categories = array(
        'appetizers' => array(
            'name' => 'Appetizers & Starters',
            'slug' => 'appetizers',
            'description' => 'Delicious starters and appetizers to begin your meal'
        ),
        'main-courses' => array(
            'name' => 'Main Courses',
            'slug' => 'main-courses',
            'description' => 'Our signature main dishes and entrees'
        ),
        'desserts' => array(
            'name' => 'Desserts',
            'slug' => 'desserts',
            'description' => 'Sweet treats to end your meal'
        ),
        'beverages' => array(
            'name' => 'Beverages',
            'slug' => 'beverages',
            'description' => 'Refreshing drinks and beverages'
        ),
        'specials' => array(
            'name' => 'Chef\'s Specials',
            'slug' => 'specials',
            'description' => 'Today\'s special dishes and limited-time offers'
        )
    );

    foreach ($menu_categories as $category) {
        if (!term_exists($category['slug'], 'product_cat')) {
            wp_insert_term(
                $category['name'],
                'product_cat',
                array(
                    'description' => $category['description'],
                    'slug' => $category['slug']
                )
            );
        }
    }
}
add_action('init', 'register_menu_categories');

// Add shortcode to display menu categories
function display_menu_categories($atts) {
    $atts = shortcode_atts(array(
        'columns' => '3',
        'limit' => '-1'
    ), $atts);

    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'number' => $atts['limit']
    ));

    if (empty($categories)) {
        return '<p>No menu categories found.</p>';
    }

    $output = '<div class="menu-categories-grid" style="display: grid; grid-template-columns: repeat(' . $atts['columns'] . ', 1fr); gap: 20px;">';
    
    foreach ($categories as $category) {
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        
        $output .= '<div class="menu-category-card">';
        if ($image) {
            $output .= '<div class="category-image"><img src="' . esc_url($image) . '" alt="' . esc_attr($category->name) . '"></div>';
        }
        $output .= '<div class="category-content">';
        $output .= '<h3>' . esc_html($category->name) . '</h3>';
        $output .= '<p>' . esc_html($category->description) . '</p>';
        $output .= '<a href="' . esc_url(get_term_link($category)) . '" class="view-category-btn">View Menu</a>';
        $output .= '</div></div>';
    }
    
    $output .= '</div>';
    
    return $output;
}
add_shortcode('menu_categories', 'display_menu_categories');

// Add styles for menu categories
function add_menu_categories_styles() {
    ?>
    <style>
        .menu-category-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .menu-category-card:hover {
            transform: translateY(-5px);
        }
        
        .category-image {
            height: 200px;
            overflow: hidden;
        }
        
        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .category-content {
            padding: 20px;
        }
        
        .category-content h3 {
            margin: 0 0 10px;
            color: #2c3e50;
        }
        
        .category-content p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .view-category-btn {
            display: inline-block;
            padding: 8px 15px;
            background: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        
        .view-category-btn:hover {
            background: #2980b9;
        }
        
        @media (max-width: 768px) {
            .menu-categories-grid {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'add_menu_categories_styles'); 