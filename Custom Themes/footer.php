<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul class="footer-menu">
                <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
                <?php 
                // Get the Our Story page
                $our_story = get_page_by_path('our-story');
                if ($our_story) {
                    echo '<li><a href="' . get_permalink($our_story->ID) . '">Our Story</a></li>';
                }

                // Get the Get in Touch page
                $get_in_touch = get_page_by_path('get-in-touch');
                if ($get_in_touch) {
                    echo '<li><a href="' . get_permalink($get_in_touch->ID) . '">Get in Touch</a></li>';
                }

                if (class_exists('WooCommerce')) : ?>
                    <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>">Cart</a></li>
                    <li><a href="<?php echo esc_url(wc_get_checkout_url()); ?>">Checkout</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">My account</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Contact Info</h3>
            <ul>
                <li><a href="tel:+1234567890">(123) 456-7890</a></li>
                <li><a href="mailto:info@obitobiseats.com">info@obitobiseats.com</a></li>
                <li>123 Restaurant St, Chicago, IL 60601</li>
            </ul>
            <div class="social-links">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Stay Updated</h3>
            <p>Subscribe to our newsletter for updates and special offers.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email">
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> ObiTobi's Eats. All rights reserved. | <a href="/privacy-policy">Privacy Policy</a> | <a href="/terms">Terms</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html> 