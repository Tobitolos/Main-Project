<?php
/**
 * Template Name: Get in Touch
 * Description: A custom template for the Get in Touch page
 */

get_header(); ?>

<div class="contact-wrapper">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="hero-content">
            <h1 class="animate-on-scroll fade-in">Get in Touch</h1>
            <p class="tagline animate-on-scroll fade-in-delay">We'd Love to Hear From You</p>
        </div>
    </section>

    <!-- Contact Options -->
    <section class="contact-options">
        <div class="container">
            <div class="options-grid">
                <div class="contact-card animate-on-scroll fade-in-up">
                    <div class="card-icon">📞</div>
                    <h3>Call Us</h3>
                    <p>Speak directly with our team</p>
                    <a href="tel:+1234567890" class="contact-button">+1 (234) 567-890</a>
                </div>

                <div class="contact-card animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                    <div class="card-icon">✉️</div>
                    <h3>Email Us</h3>
                    <p>Send us a message</p>
                    <a href="mailto:info@restaurant.com" class="contact-button">info@restaurant.com</a>
                </div>

                <div class="contact-card animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <div class="card-icon">📍</div>
                    <h3>Visit Us</h3>
                    <p>Come see us in person</p>
                    <a href="#" class="contact-button">View Location</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="form-wrapper animate-on-scroll fade-in">
                <h2>Send Us a Message</h2>
                <form id="contact-form" class="contact-form">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="reservation">Reservation Inquiry</option>
                            <option value="feedback">Feedback</option>
                            <option value="event">Event Planning</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-button">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title animate-on-scroll fade-in">Frequently Asked Questions</h2>
            <div class="faq-grid">
                <div class="faq-item animate-on-scroll fade-in-up">
                    <div class="faq-question">
                        <h3>What are your opening hours?</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We're open Monday to Sunday from 11:00 AM to 10:00 PM. Our kitchen closes at 9:30 PM.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                    <div class="faq-question">
                        <h3>Do you take reservations?</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we accept reservations for parties of all sizes. You can book online or call us directly.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <div class="faq-question">
                        <h3>Is there parking available?</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we have complimentary valet parking and a self-parking lot available for our guests.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll fade-in-up" style="animation-delay: 0.6s;">
                    <div class="faq-question">
                        <h3>Do you accommodate dietary restrictions?</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer vegetarian, vegan, and gluten-free options. Please inform us of any dietary requirements when making your reservation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-section">
        <div class="container">
            <h2 class="section-title animate-on-scroll fade-in">Connect With Us</h2>
            <div class="social-grid">
                <a href="#" class="social-card animate-on-scroll fade-in-up">
                    <div class="social-icon">📱</div>
                    <h3>Instagram</h3>
                    <p>@restaurant</p>
                </a>

                <a href="#" class="social-card animate-on-scroll fade-in-up" style="animation-delay: 0.2s;">
                    <div class="social-icon">📘</div>
                    <h3>Facebook</h3>
                    <p>/restaurant</p>
                </a>

                <a href="#" class="social-card animate-on-scroll fade-in-up" style="animation-delay: 0.4s;">
                    <div class="social-icon">🐦</div>
                    <h3>Twitter</h3>
                    <p>@restaurant</p>
                </a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?> 