<?php
/**
 * Template Name: Homepage
 * Description: Custom homepage template with featured products section
 */

get_header(); ?>

<div class="homepage-content">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>ObiTobi's Eats</h1>
            <p class="tagline">Where Flavor Meets Friendship</p>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products">
        <h2>Our Signature Dishes</h2>
        <?php echo do_shortcode('[featured_menu_items number="3"]'); ?>
    </section>

    <!-- Shop Featured Products -->
    <section class="shop-featured-products">
        <div class="container">
            <h2>Featured Products</h2>
            <p class="section-description">Discover our handpicked selection of premium products</p>
            
            <?php
            if (class_exists('WooCommerce')) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
                
                $featured_products = new WP_Query($args);

                if ($featured_products->have_posts()) :
                    echo '<div class="shop-products-grid">';
                    while ($featured_products->have_posts()) : $featured_products->the_post();
                        global $product;
                        ?>
                        <div class="shop-product-card">
                            <div class="product-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="product-details">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="price"><?php echo $product->get_price_html(); ?></div>
                                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="add-to-cart-button">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    echo '</div>';
                    echo '<div class="view-all-products">';
                    echo '<a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" class="view-shop-button">View All Products</a>';
                    echo '</div>';
                    wp_reset_postdata();
                else :
                    echo '<p class="no-products">No featured products found.</p>';
                endif;
            } else {
                echo '<p class="woocommerce-notice">Please install and activate WooCommerce to display products.</p>';
            }
            ?>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-content">
            <h2>Our Story</h2>
            <p>Welcome to ObiTobi's Eats, where we combine our passion for food with our love for bringing people together. Our chefs create memorable dining experiences with carefully crafted dishes made from the freshest ingredients.</p>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <h2>Join Us for a Meal</h2>
        <p>Experience the unique flavors of ObiTobi's Eats. Book your table today!</p>
        <a href="<?php echo esc_url(home_url('/reservations')); ?>" class="cta-button">Make a Reservation</a>
    </section>
</div>

<?php get_footer(); ?> 