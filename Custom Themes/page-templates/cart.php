<?php
/**
 * Template Name: Cart
 * Description: A custom template for the shopping cart page
 */

get_header(); ?>

<div class="cart-wrapper">
    <!-- Hero Section -->
    <section class="cart-hero">
        <div class="hero-content">
            <h1 class="animate-on-scroll fade-in">Your Cart</h1>
            <p class="tagline animate-on-scroll fade-in-delay">Review and Checkout</p>
        </div>
    </section>

    <!-- Cart Content -->
    <section class="cart-content">
        <div class="container">
            <div class="cart-grid">
                <!-- Cart Items -->
                <div class="cart-items animate-on-scroll fade-in">
                    <h2>Your Items</h2>
                    <div class="cart-items-list">
                        <!-- Cart Item 1 -->
                        <div class="cart-item animate-on-scroll fade-in-up">
                            <div class="item-details">
                                <h3>Signature Dish</h3>
                                <p class="item-description">Delicious description of the dish</p>
                                <div class="item-options">
                                    <span class="spicy-level">🌶️ Medium Spicy</span>
                                    <span class="prep-time">⏱️ 15 min</span>
                                </div>
                            </div>
                            <div class="item-quantity">
                                <button class="quantity-btn minus">-</button>
                                <input type="number" value="1" min="1" class="quantity-input">
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <div class="item-price">
                                <span class="price">$24.99</span>
                                <button class="remove-item">×</button>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                            <div class="item-details">
                                <h3>Chef's Special</h3>
                                <p class="item-description">Another delicious description</p>
                                <div class="item-options">
                                    <span class="spicy-level">🌶️ Not Spicy</span>
                                    <span class="prep-time">⏱️ 20 min</span>
                                </div>
                            </div>
                            <div class="item-quantity">
                                <button class="quantity-btn minus">-</button>
                                <input type="number" value="2" min="1" class="quantity-input">
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <div class="item-price">
                                <span class="price">$32.99</span>
                                <button class="remove-item">×</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <h2>Order Summary</h2>
                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span class="subtotal">$90.97</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax (8%)</span>
                            <span class="tax">$7.28</span>
                        </div>
                        <div class="summary-row">
                            <span>Delivery Fee</span>
                            <span class="delivery">$5.00</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span class="total-amount">$103.25</span>
                        </div>
                    </div>

                    <!-- Delivery Options -->
                    <div class="delivery-options">
                        <h3>Delivery Options</h3>
                        <div class="option-group">
                            <label class="delivery-option">
                                <input type="radio" name="delivery" value="pickup" checked>
                                <span class="option-content">
                                    <span class="option-title">Pickup</span>
                                    <span class="option-desc">Free - Ready in 30 minutes</span>
                                </span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery" value="delivery">
                                <span class="option-content">
                                    <span class="option-title">Delivery</span>
                                    <span class="option-desc">$5.00 - 45-60 minutes</span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Promo Code -->
                    <div class="promo-code">
                        <h3>Promo Code</h3>
                        <div class="promo-input-group">
                            <input type="text" placeholder="Enter promo code">
                            <button class="apply-promo">Apply</button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button class="checkout-button">
                        Proceed to Checkout
                        <span class="checkout-arrow">→</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Empty Cart State -->
    <div class="empty-cart animate-on-scroll fade-in" style="display: none;">
        <div class="empty-cart-icon">🛒</div>
        <h2>Your Cart is Empty</h2>
        <p>Looks like you haven't added any items yet.</p>
        <a href="<?php echo get_permalink(get_page_by_path('menu')); ?>" class="browse-menu-button">
            Browse Menu
            <span class="arrow">→</span>
        </a>
    </div>
</div>

<?php get_footer(); ?> 