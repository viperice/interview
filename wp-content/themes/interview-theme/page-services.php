<?php
/**
 * Template Name: Services Page
 */
get_header();

$hero_title = get_field('hero_title') ?: get_the_title();
$hero_description = get_field('hero_description') ?: '';

$service_posts = get_posts(
    array(
        'post_type' => 'service',
        'posts_per_page' => 12,
    )
);

$service_cards = get_field('service_cards') ?: array();

$quick_services = array(
    __('Find Your Dream Home', 'interview-theme'),
    __('Unlock Property Value', 'interview-theme'),
    __('Effortless Property Management', 'interview-theme'),
    __('Smart Investments, Informed Decisions', 'interview-theme')
);

get_template_part(
    'template-parts/hero',
    null,
    array(
        'title' => $hero_title,
        'description' => $hero_description,
    )
);
?>

<section class="section section--services">
    <div class="container">
        <div class="pill-grid">
            <?php foreach ($quick_services as $label) : ?>
                <div class="pill">
                    <span><?php echo esc_html($label); ?></span>
                    <span class="pill__arrow">↗</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--services">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e('Unlock Property Value', 'interview-theme'); ?></h2>
                <p><?php esc_html_e('A curated set of services to maximize the value of your property.', 'interview-theme'); ?></p>
            </div>
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
            <?php elseif (!empty($service_cards)) : ?>
                <?php foreach ($service_cards as $card) : ?>
                    <?php
                    get_template_part(
                        'template-parts/card-service',
                        null,
                        array(
                            'title' => $card['title'] ?? '',
                            'description' => $card['description'] ?? '',
                            'icon' => $card['icon'] ?? null,
                        )
                    );
                    ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?php esc_html_e('Add services from the dashboard.', 'interview-theme'); ?></p>
            <?php endif; ?>
        </div>
        <div class="cta cta--spaced">
            <div>
                <h3><?php esc_html_e('Unlock the Value of Your Property Today', 'interview-theme'); ?></h3>
                <p class="cta__text"><?php esc_html_e('Explore our selling solutions designed to deliver the best possible outcome.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="<?php echo esc_url(interview_get_page_link('contact', home_url('/'))); ?>">
                <?php esc_html_e('Learn More', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<section class="section section--services">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e('Effortless Property Management', 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Manage your portfolio with confidence and ease.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="card-grid">
            <?php
            $management_cards = array(
                array('title' => __('Tenant Harmony', 'interview-theme'), 'description' => __('We ensure smooth tenant experiences and reduced vacancies.', 'interview-theme')),
                array('title' => __('Maintenance Ease', 'interview-theme'), 'description' => __('We handle upkeep and repairs end-to-end.', 'interview-theme')),
                array('title' => __('Financial Peace of Mind', 'interview-theme'), 'description' => __('Transparent reporting and steady cashflow.', 'interview-theme')),
                array('title' => __('Legal Guardian', 'interview-theme'), 'description' => __('Stay compliant with property laws effortlessly.', 'interview-theme')),
            );
            foreach ($management_cards as $card) :
                get_template_part(
                    'template-parts/card-service',
                    null,
                    array(
                        'title' => $card['title'],
                        'description' => $card['description'],
                    )
                );
            endforeach;
            ?>
        </div>
        <div class="cta cta--spaced">
            <div>
                <h3><?php esc_html_e('Experience Effortless Property Management', 'interview-theme'); ?></h3>
                <p class="cta__text"><?php esc_html_e('Let us handle the details while you enjoy the benefits.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--ghost" href="<?php echo esc_url(interview_get_page_link('contact', home_url('/'))); ?>">
                <?php esc_html_e('Learn More', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<section class="section section--services">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e('Smart Investments, Informed Decisions', 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Make confident decisions backed by expert insights.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="card-grid">
            <?php
            $investment_cards = array(
                array('title' => __('Market Insight', 'interview-theme'), 'description' => __('Stay ahead of market trends with expert analysis.', 'interview-theme')),
                array('title' => __('ROI Assessment', 'interview-theme'), 'description' => __('Evaluate the returns on your investment choices.', 'interview-theme')),
                array('title' => __('Customized Strategies', 'interview-theme'), 'description' => __('Tailored investment plans to reach your goals.', 'interview-theme')),
                array('title' => __('Diversification Mastery', 'interview-theme'), 'description' => __('Balance risk and reward across property types.', 'interview-theme')),
            );
            foreach ($investment_cards as $card) :
                get_template_part(
                    'template-parts/card-service',
                    null,
                    array(
                        'title' => $card['title'],
                        'description' => $card['description'],
                    )
                );
            endforeach;
            ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta">
            <div>
                <h2><?php esc_html_e('Start Your Real Estate Journey Today', 'interview-theme'); ?></h2>
                <p class="cta__text"><?php esc_html_e('Partner with Estatein for expert guidance and support.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--primary" href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>">
                <?php esc_html_e('Explore Properties', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
