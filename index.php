<?php
/**
 * The main template file
 * 
 * @package HighSo
 */

get_header();
?>

<main id="main-content" class="site-main">
    
    <?php if (is_home() && !is_paged()) : ?>
        <!-- Hero Section -->
        <section class="hero-section">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.jpg" alt="Hero Banner" class="hero-slide">
            <div class="hero-content">
                <h1>30% 40% 50% OFF<br>EVERYTHING</h1>
                <button class="hero-cta">SHOP NOW</button>
            </div>
        </section>

        <!-- Discount Banner -->
        <section class="discount-banner">
            <div class="discount-card">
                <h3>EXTRA 5% OFF</h3>
                <p>On orders $100+</p>
                <p>Use Code:</p>
                <span class="discount-code">5WW</span>
            </div>
            <div class="discount-card">
                <h3>EXTRA 10% OFF</h3>
                <p>On orders $200+</p>
                <p>Use Code:</p>
                <span class="discount-code">10WW</span>
            </div>
            <div class="discount-card">
                <h3>EXTRA 15% OFF</h3>
                <p>On orders $300+</p>
                <p>Use Code:</p>
                <span class="discount-code">15WW</span>
            </div>
        </section>
    <?php endif; ?>

    <!-- Blog Posts / Products -->
    <?php if (have_posts()) : ?>
        <section class="content-section">
            <?php if (is_home() || is_archive()) : ?>
                <h2 class="section-title"><?php 
                    if (is_home()) {
                        echo 'Latest Posts';
                    } else {
                        echo get_the_archive_title();
                    }
                ?></h2>
            <?php endif; ?>

            <div class="blog-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('← Previous', 'highso'),
                'next_text' => __('Next →', 'highso'),
            ));
            ?>
        </section>
    <?php else : ?>
        <section class="no-results">
            <h1><?php _e('Nothing Found', 'highso'); ?></h1>
            <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with different keywords.', 'highso'); ?></p>
            <?php get_search_form(); ?>
        </section>
    <?php endif; ?>

</main>

<?php
get_footer();
