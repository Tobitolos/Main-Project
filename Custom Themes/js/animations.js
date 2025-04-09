document.addEventListener('DOMContentLoaded', function() {
    // Get all elements that need to be animated
    const animatedElements = document.querySelectorAll('.animate-on-scroll, .team-member, .value-card, .timeline-item, .hero-content, .contact-card, .form-wrapper, .faq-item, .social-card');

    // Options for the Intersection Observer
    const options = {
        root: null, // use viewport
        rootMargin: '0px',
        threshold: 0.2 // 20% of the element needs to be visible
    };

    // Callback function when element becomes visible
    const handleIntersection = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // Stop observing once animation is triggered
                observer.unobserve(entry.target);
            }
        });
    };

    // Create the observer
    const observer = new IntersectionObserver(handleIntersection, options);

    // Start observing each element
    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Optional: Add animation to elements that are already in view on page load
    animatedElements.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
            element.classList.add('visible');
        }
    });

    // FAQ Toggle Functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            // Close all other FAQ items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current FAQ item
            item.classList.toggle('active');
        });
    });

    // Form Handling
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(contactForm);
            const formObject = {};
            formData.forEach((value, key) => {
                formObject[key] = value;
            });

            // Here you would typically send the form data to your server
            console.log('Form submitted:', formObject);
            
            // Show success message
            const submitButton = contactForm.querySelector('.submit-button');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Message Sent!';
            submitButton.style.backgroundColor = '#2ecc71';
            
            // Reset form
            contactForm.reset();
            
            // Reset button after 3 seconds
            setTimeout(() => {
                submitButton.textContent = originalText;
                submitButton.style.backgroundColor = '#3498db';
            }, 3000);
        });
    }

    // Add stagger delay to team members
    document.querySelectorAll('.team-member').forEach((member, index) => {
        member.style.animationDelay = `${index * 0.2}s`;
    });

    // Add stagger delay to value cards
    document.querySelectorAll('.value-card').forEach((card, index) => {
        card.style.animationDelay = `${index * 0.15}s`;
    });

    // Add stagger delay to timeline items
    document.querySelectorAll('.timeline-item').forEach((item, index) => {
        item.style.animationDelay = `${index * 0.3}s`;
    });

    // Add stagger delay to contact cards
    document.querySelectorAll('.contact-card').forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
    });

    // Add stagger delay to FAQ items
    document.querySelectorAll('.faq-item').forEach((item, index) => {
        item.style.animationDelay = `${index * 0.2}s`;
    });

    // Add stagger delay to social cards
    document.querySelectorAll('.social-card').forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Initial animations on page load
    setTimeout(() => {
        document.querySelector('.hero-content').classList.add('fade-in');
    }, 100);
}); 