<?php
/**
 * Template Name: Our Story
 * Description: A custom template for the Our Story page
 */

get_header(); ?>

<div class="our-story-wrapper">
    <!-- Hero Section -->
    <section class="story-hero">
        <div class="hero-content">
            <h1 class="animate-on-scroll fade-in">Our Story</h1>
            <p class="tagline animate-on-scroll fade-in-delay">A Journey of Passion & Flavor</p>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="story-timeline">
        <div class="container">
            <div class="timeline-item animate-on-scroll slide-in-left">
                <div class="timeline-year">2015</div>
                <div class="timeline-content">
                    <h3>Where It All Began</h3>
                    <p>From a small family kitchen to a beloved restaurant, our journey started with a simple passion for bringing people together through food.</p>
                </div>
            </div>

            <div class="timeline-item animate-on-scroll slide-in-right">
                <div class="timeline-year">2018</div>
                <div class="timeline-content">
                    <h3>Growing Together</h3>
                    <p>As our community grew, so did our menu. We began incorporating more local ingredients and creating signature dishes that would become neighborhood favorites.</p>
                </div>
            </div>

            <div class="timeline-item animate-on-scroll slide-in-left">
                <div class="timeline-year">2021</div>
                <div class="timeline-content">
                    <h3>Expanding Our Family</h3>
                    <p>With the support of our loyal customers, we expanded our restaurant and launched our online store, bringing our flavors to homes across the country.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="our-values">
        <div class="container">
            <h2 class="section-title animate-on-scroll fade-in">Our Values</h2>
            <div class="values-grid">
                <div class="value-card animate-on-scroll fade-in-up">
                    <div class="value-icon">🌱</div>
                    <h3>Fresh Ingredients</h3>
                    <p>We source the finest local ingredients to ensure every dish tells a story of quality and care.</p>
                </div>

                <div class="value-card animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                    <div class="value-icon">👨‍👩‍👧‍👦</div>
                    <h3>Family First</h3>
                    <p>Every customer who walks through our doors becomes part of our extended family.</p>
                </div>

                <div class="value-card animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <div class="value-icon">♥️</div>
                    <h3>Passion in Every Plate</h3>
                    <p>Each dish is crafted with love and attention to detail, ensuring a memorable dining experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="our-team">
        <div class="container">
            <h2 class="section-title animate-on-scroll fade-in">Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member animate-on-scroll fade-in-up">
                    <div class="member-icon">👨‍🍳</div>
                    <h3>Chef Michael</h3>
                    <p class="member-role">Head Chef</p>
                    <p class="member-bio">With over 15 years of culinary experience, Chef Michael brings creativity and passion to every dish.</p>
                </div>

                <div class="team-member animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                    <div class="member-icon">👩‍🍳</div>
                    <h3>Sarah Williams</h3>
                    <p class="member-role">Sous Chef</p>
                    <p class="member-bio">Sarah's innovative approach to traditional recipes adds a unique twist to our menu.</p>
                </div>

                <div class="team-member animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <div class="member-icon">🧁</div>
                    <h3>Emma Chen</h3>
                    <p class="member-role">Pastry Chef</p>
                    <p class="member-bio">Emma's delicate touch creates desserts that are both visually stunning and delicious.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title animate-on-scroll fade-in">What Our Customers Say</h2>
            <div class="testimonials-slider">
                <div class="testimonial-item animate-on-scroll fade-in">
                    <div class="testimonial-content">
                        <p>"The perfect blend of traditional flavors and modern creativity. Every visit feels like coming home."</p>
                        <cite>- Maria S.</cite>
                    </div>
                </div>

                <div class="testimonial-item animate-on-scroll fade-in" style="animation-delay: 0.3s;">
                    <div class="testimonial-content">
                        <p>"Their passion for food and hospitality shines through in every detail. A true culinary gem!"</p>
                        <cite>- James R.</cite>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="story-cta">
        <div class="container">
            <div class="cta-content animate-on-scroll fade-in">
                <h2>Join Us for an Unforgettable Experience</h2>
                <p>Come be a part of our story and create memories that last a lifetime.</p>
                <a href="<?php echo esc_url(home_url('/reservations')); ?>" class="cta-button">Make a Reservation</a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?> 