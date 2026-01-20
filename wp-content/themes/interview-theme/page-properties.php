<?php
/**
 * Template Name: Properties Page
 */
get_header();

$hero_title = get_field('hero_title') ?: get_the_title();
$hero_description = get_field('hero_description') ?: '';

$property_posts = get_posts(
    array(
        'post_type' => 'property',
        'posts_per_page' => 12,
    )
);

$property_cards = get_field('property_cards') ?: array();

get_template_part(
    'template-parts/hero',
    null,
    array(
        'title' => $hero_title,
        'description' => $hero_description,
    )
);
?>

<section class="section">
    <div class="container">
        <div class="form-card">
            <div class="input-group">
                <input class="input" type="text" placeholder="<?php esc_attr_e('Search For A Property', 'interview-theme'); ?>">
                <button class="btn btn--primary" type="button"><?php esc_html_e('Find Property', 'interview-theme'); ?></button>
            </div>
            <div class="filters">
                <select>
                    <option><?php esc_html_e('Location', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Property Type', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Pricing Range', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Property Size', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Build Year', 'interview-theme'); ?></option>
                </select>
            </div>
        </div>
    </div>
</section>

<section class="section section--properties">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e('Discover a World of Possibilities', 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Explore our curated property listings and find your perfect match.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="card-grid">
            <?php if (!empty($property_posts)) : ?>
                <?php foreach ($property_posts as $property_post) : ?>
                    <?php
                    $image = get_post_thumbnail_id($property_post->ID)
                        ? wp_get_attachment_image_src(get_post_thumbnail_id($property_post->ID), 'card-md')
                        : null;
                    $image_data = null;
                    if (!empty($image)) {
                        $image_data = array(
                            'url' => $image[0],
                            'alt' => get_the_title($property_post),
                        );
                    }
                    get_template_part(
                        'template-parts/card-property',
                        null,
                        array(
                            'title' => get_the_title($property_post),
                            'location' => get_field('location', $property_post->ID),
                            'price' => get_field('price', $property_post->ID),
                            'badge' => get_field('badge', $property_post->ID),
                            'features' => array(__('4 Beds', 'interview-theme'), __('2 Baths', 'interview-theme'), __('Villa', 'interview-theme')),
                            'image' => $image_data,
                        )
                    );
                    ?>
                <?php endforeach; ?>
            <?php elseif (!empty($property_cards)) : ?>
                <?php foreach ($property_cards as $card) : ?>
                    <?php
                    get_template_part(
                        'template-parts/card-property',
                        null,
                        array(
                            'title' => $card['title'] ?? '',
                            'location' => $card['location'] ?? '',
                            'price' => $card['price'] ?? '',
                            'badge' => $card['badge'] ?? '',
                            'features' => array(__('4 Beds', 'interview-theme'), __('2 Baths', 'interview-theme'), __('Villa', 'interview-theme')),
                            'image' => $card['image'] ?? null,
                        )
                    );
                    ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?php esc_html_e('Add properties from the dashboard.', 'interview-theme'); ?></p>
            <?php endif; ?>
        </div>
        <div class="slider-controls">
            <span><?php esc_html_e('01 of 10', 'interview-theme'); ?></span>
            <button type="button" aria-label="<?php esc_attr_e('Previous', 'interview-theme'); ?>">‹</button>
            <button type="button" aria-label="<?php esc_attr_e('Next', 'interview-theme'); ?>">›</button>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e("Let's Make it Happen", 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Tell us your preferences and we will find the right property for you.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="form-card">
            <div class="input-group">
                <input class="input" type="text" placeholder="<?php esc_attr_e('First Name', 'interview-theme'); ?>">
                <input class="input" type="text" placeholder="<?php esc_attr_e('Last Name', 'interview-theme'); ?>">
                <input class="input" type="email" placeholder="<?php esc_attr_e('Email', 'interview-theme'); ?>">
                <input class="input" type="tel" placeholder="<?php esc_attr_e('Phone', 'interview-theme'); ?>">
                <select>
                    <option><?php esc_html_e('Preferred Location', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Property Type', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('No. of Bathrooms', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('No. of Bedrooms', 'interview-theme'); ?></option>
                </select>
                <select>
                    <option><?php esc_html_e('Budget', 'interview-theme'); ?></option>
                </select>
                <input class="input" type="text" placeholder="<?php esc_attr_e('Preferred Contact Method', 'interview-theme'); ?>">
            </div>
            <textarea rows="4" placeholder="<?php esc_attr_e('Message', 'interview-theme'); ?>"></textarea>
            <div>
                <label>
                    <input type="checkbox"> <?php esc_html_e('I agree with Terms of Use and Privacy Policy', 'interview-theme'); ?>
                </label>
            </div>
            <button class="btn btn--primary" type="button"><?php esc_html_e('Send Your Message', 'interview-theme'); ?></button>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta">
            <div>
                <h2><?php esc_html_e('Start Your Real Estate Journey Today', 'interview-theme'); ?></h2>
                <p class="cta__text"><?php esc_html_e('We are ready to help you find the perfect property.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--primary" href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>">
                <?php esc_html_e('Explore Properties', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
