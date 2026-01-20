<?php
/**
 * Template Name: Home Page
 */
get_header();

$hero_title = get_field('hero_title') ?: __('Discover Your Dream Property with Estatein', 'interview-theme');
$hero_description = get_field('hero_description') ?: '';
$hero_cta = get_field('hero_cta_link');
$hero_primary = $hero_cta ?: array(
    'url' => interview_get_page_link('contact', home_url('/')),
    'title' => __('Learn More', 'interview-theme'),
    'target' => '_self',
);
$hero_image = get_field('hero_image');

$services_heading = get_field('services_heading') ?: __('Our Services', 'interview-theme');
$services_items = get_field('services_items') ?: array();

$properties_heading = get_field('properties_heading') ?: __('Featured Properties', 'interview-theme');

$hero_secondary = array(
    'url' => interview_get_page_link('properties', home_url('/')),
    'title' => __('Browse Properties', 'interview-theme'),
    'target' => '_self',
);

$hero_stats = array(
    array('value' => '200+', 'label' => __('Happy Customers', 'interview-theme')),
    array('value' => '10k+', 'label' => __('Properties for Clients', 'interview-theme')),
    array('value' => '16+', 'label' => __('Years of Experience', 'interview-theme')),
);

$quick_services = !empty($services_items) ? $services_items : array(
    array(
        'title' => __('Find Your Dream Home', 'interview-theme'),
        'icon' => interview_get_asset_url('assets/reference/Find Your Dream Home.svg'),
    ),
    array(
        'title' => __('Unlock Property Value', 'interview-theme'),
        'icon' => interview_get_asset_url('assets/reference/Unlock Property Value.svg'),
    ),
    array(
        'title' => __('Effortless Property Management', 'interview-theme'),
        'icon' => interview_get_asset_url('assets/reference/Effortless Property Management.svg'),
    ),
    array(
        'title' => __('Smart Investments, Informed Decisions', 'interview-theme'),
        'icon' => interview_get_asset_url('assets/reference/Smart Investments, Informed Decisions.svg'),
    ),
);

$service_posts = get_posts(
    array(
        'post_type' => 'service',
        'posts_per_page' => 6,
    )
);

$property_posts = get_posts(
    array(
        'post_type' => 'property',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
    )
);

get_template_part(
    'template-parts/hero',
    null,
    array(
        'title' => $hero_title,
        'description' => $hero_description,
        'cta' => $hero_primary,
        'cta_secondary' => $hero_secondary,
        'image' => $hero_image,
        'badge' => __('Trusted by 10k+ clients', 'interview-theme'),
        'stats' => $hero_stats,
    )
);
?>

<section class="section section--services">
    <div class="container">
        <div class="service-tiles">
            <?php foreach ($quick_services as $item) : ?>
                <article class="service-tile">
                    <span class="service-tile__arrow">
                        <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/arrow.svg')); ?>" alt="" loading="lazy" decoding="async">
                    </span>
                    <div class="service-tile__icon">
                        <?php if (!empty($item['icon'])) : ?>
                            <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title'] ?? ''); ?>" loading="lazy" decoding="async">
                        <?php endif; ?>
                    </div>
                    <h3 class="service-tile__title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--services">
    <div class="container">
        <div class="section__header">
            <div>
                <h2 class="section__title"><?php echo esc_html($services_heading); ?></h2>
                <p class="section__subtitle"><?php esc_html_e('Discover our full-suite real estate services tailored to your goals.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="<?php echo esc_url(interview_get_page_link('services', home_url('/'))); ?>">
                <?php esc_html_e('View All Services', 'interview-theme'); ?>
            </a>
        </div>
        <div class="card-grid">
            <?php if (!empty($service_posts)) : ?>
                <?php foreach ($service_posts as $service_post) : ?>
                    <?php
                    $icon = get_field('icon', $service_post->ID);
                    get_template_part(
                        'template-parts/card-service',
                        null,
                        array(
                            'title' => get_the_title($service_post),
                            'description' => get_the_excerpt($service_post),
                            'icon' => $icon,
                        )
                    );
                    ?>
                <?php endforeach; ?>
            <?php elseif (!empty($services_items)) : ?>
                <?php foreach ($services_items as $item) : ?>
                    <?php
                    get_template_part(
                        'template-parts/card-service',
                        null,
                        array(
                            'title' => $item['title'] ?? '',
                            'description' => $item['description'] ?? '',
                            'icon' => $item['icon'] ?? null,
                        )
                    );
                    ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?php esc_html_e('Add services from the dashboard.', 'interview-theme'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section section--properties">
    <div class="container">
        <div class="section__header">
            <div>
                <h2 class="section__title"><?php echo esc_html($properties_heading); ?></h2>
                <p class="section__subtitle"><?php esc_html_e('Explore our handpicked selection of homes and investment properties.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>">
                <?php esc_html_e('View All Properties', 'interview-theme'); ?>
            </a>
        </div>
        <div class="card-grid">
            <?php if (!empty($property_posts)) : ?>
                <?php
                $fallback_images = array(
                    interview_get_asset_url('assets/reference/image (14).png'),
                    interview_get_asset_url('assets/reference/image (15).png'),
                    interview_get_asset_url('assets/reference/image (16).png'),
                );
                $index = 0;
                foreach ($property_posts as $property_post) :
                    $tags_rows = get_field('property_tags', $property_post->ID) ?: array();
                    $tags = array();
                    foreach ($tags_rows as $row) {
                        if (!empty($row['tag'])) {
                            $tags[] = $row['tag'];
                        }
                    }
                    $excerpt = get_the_excerpt($property_post);
                    $description = $excerpt ? $excerpt : wp_trim_words($property_post->post_content, 22, '...');
                    $image = get_post_thumbnail_id($property_post->ID)
                        ? wp_get_attachment_image_src(get_post_thumbnail_id($property_post->ID), 'card-md')
                        : null;
                    $image_data = null;
                    if (!empty($image)) {
                        $image_data = array(
                            'url' => $image[0],
                            'alt' => get_the_title($property_post),
                        );
                    } else {
                        $fallback = $fallback_images[$index % count($fallback_images)];
                        $image_data = array(
                            'url' => $fallback,
                            'alt' => get_the_title($property_post),
                        );
                    }
                    get_template_part(
                        'template-parts/card-property',
                        null,
                        array(
                            'title' => get_the_title($property_post),
                            'description' => $description,
                            'price' => get_field('price', $property_post->ID),
                            'badge' => get_field('badge', $property_post->ID),
                            'tags' => !empty($tags) ? $tags : array(__('4-Bedroom', 'interview-theme'), __('3-Bathroom', 'interview-theme'), __('Villa', 'interview-theme')),
                            'tag_icons' => array(
                                interview_get_asset_url('assets/reference/bedroom.svg'),
                                interview_get_asset_url('assets/reference/bath.svg'),
                                interview_get_asset_url('assets/reference/house.svg'),
                            ),
                            'cta_label' => __('View Property Details', 'interview-theme'),
                            'image' => $image_data,
                        )
                    );
                    $index++;
                endforeach;
                ?>
            <?php else : ?>
                <?php
                $property_cards = get_field('property_cards') ?: array();
                foreach ($property_cards as $card) :
                    get_template_part(
                        'template-parts/card-property',
                        null,
                        array(
                            'title' => $card['title'] ?? '',
                            'description' => $card['description'] ?? '',
                            'price' => $card['price'] ?? '',
                            'badge' => $card['badge'] ?? '',
                            'tags' => $card['tags'] ?? array(__('4-Bedroom', 'interview-theme'), __('3-Bathroom', 'interview-theme'), __('Villa', 'interview-theme')),
                            'tag_icons' => array(
                                interview_get_asset_url('assets/reference/bedroom.svg'),
                                interview_get_asset_url('assets/reference/bath.svg'),
                                interview_get_asset_url('assets/reference/house.svg'),
                            ),
                            'cta_label' => __('View Property Details', 'interview-theme'),
                            'image' => $card['image'] ?? null,
                        )
                    );
                endforeach;
                ?>
            <?php endif; ?>
        </div>
        <div class="slider-controls">
            <span><?php esc_html_e('01 of 60', 'interview-theme'); ?></span>
            <button type="button" aria-label="<?php esc_attr_e('Previous', 'interview-theme'); ?>">‹</button>
            <button type="button" aria-label="<?php esc_attr_e('Next', 'interview-theme'); ?>">›</button>
        </div>
    </div>
</section>

<section class="section section--testimonials">
    <div class="container">
        <div class="section__header">
            <div>
                <h2 class="section__title"><?php esc_html_e('What Our Clients Say', 'interview-theme'); ?></h2>
                <p class="section__subtitle"><?php esc_html_e('Real stories from customers who found their dream home with us.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="#"><?php esc_html_e('View All Testimonials', 'interview-theme'); ?></a>
        </div>
        <div class="card-grid">
            <?php
            $testimonials = array(
                array('title' => __('Exceptional Service!', 'interview-theme'), 'text' => __('The team guided us smoothly through every step. Highly recommended.', 'interview-theme'), 'author' => 'Wade Warren'),
                array('title' => __('Efficient and Reliable', 'interview-theme'), 'text' => __('Professional insights and quick responses made all the difference.', 'interview-theme'), 'author' => 'Emelia Thompson'),
                array('title' => __('Trusted Advisors', 'interview-theme'), 'text' => __('We felt supported from day one to move-in day.', 'interview-theme'), 'author' => 'John Mann'),
            );
            foreach ($testimonials as $testimonial) :
                ?>
                <article class="testimonial-card">
                    <div class="testimonial-card__stars">★★★★★</div>
                    <h3><?php echo esc_html($testimonial['title']); ?></h3>
                    <p><?php echo esc_html($testimonial['text']); ?></p>
                    <div class="testimonial-card__author">
                        <span><?php echo esc_html($testimonial['author']); ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--faq">
    <div class="container">
        <div class="section__header">
            <div>
                <h2 class="section__title"><?php esc_html_e('Frequently Asked Questions', 'interview-theme'); ?></h2>
                <p class="section__subtitle"><?php esc_html_e('Find answers to common questions about our services and process.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="#"><?php esc_html_e('View All FAQs', 'interview-theme'); ?></a>
        </div>
        <div class="accordion">
            <?php
            $faqs = array(
                array('q' => __('How do I search for properties?', 'interview-theme'), 'a' => __('Use the search filters to refine by location, type, and price.', 'interview-theme')),
                array('q' => __('What documents are needed?', 'interview-theme'), 'a' => __('Bring identification, proof of income, and any pre-approval letters.', 'interview-theme')),
                array('q' => __('How can I contact an agent?', 'interview-theme'), 'a' => __('Use the contact form or call our support line for immediate help.', 'interview-theme')),
            );
            foreach ($faqs as $faq) :
                ?>
                <div class="accordion__item">
                    <button class="accordion__button js-accordion-toggle" type="button">
                        <span><?php echo esc_html($faq['q']); ?></span>
                        <span>+</span>
                    </button>
                    <div class="accordion__content"><?php echo esc_html($faq['a']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta">
            <div>
                <h2><?php esc_html_e('Start Your Real Estate Journey Today', 'interview-theme'); ?></h2>
                <p class="cta__text"><?php esc_html_e('Whether you are buying, selling, or investing, we are here to help you take the next step.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--primary" href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>">
                <?php esc_html_e('Explore Properties', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
