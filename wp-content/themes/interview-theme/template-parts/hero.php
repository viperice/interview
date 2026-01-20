<?php
$title = isset($args['title']) ? $args['title'] : get_the_title();
$description = isset($args['description']) ? $args['description'] : '';
$cta = isset($args['cta']) ? $args['cta'] : null;
$cta_secondary = isset($args['cta_secondary']) ? $args['cta_secondary'] : null;
$image = isset($args['image']) ? $args['image'] : null;
$badge = isset($args['badge']) ? $args['badge'] : '';
$stats = isset($args['stats']) ? $args['stats'] : array();
$fallback_image = interview_get_asset_url('assets/reference/Container.png');
$image_url = (!empty($image) && !empty($image['url'])) ? $image['url'] : null;
$image_alt = (!empty($image) && !empty($image['alt'])) ? $image['alt'] : $title;
$should_show_fallback = is_page_template('page-home.php');
$is_home_hero = $should_show_fallback;
if (empty($image_url) && $should_show_fallback) {
    $image_url = $fallback_image;
}
?>
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__content">
            <p class="hero__eyebrow"><?php echo esc_html(get_bloginfo('name')); ?></p>
            <?php if (!empty($badge)) : ?>
                <div class="hero__badge" aria-label="<?php echo esc_attr($badge); ?>">
                    <svg class="hero__badge-svg" viewBox="0 0 120 120" role="img" aria-hidden="true">
                        <defs>
                            <path id="hero-badge-path" d="M60,10 a50,50 0 1,1 0,100 a50,50 0 1,1 0,-100" />
                        </defs>
                        <text class="hero__badge-text">
                            <textPath href="#hero-badge-path" startOffset="0%">
                                <?php echo esc_html($badge); ?> · <?php echo esc_html($badge); ?> ·
                            </textPath>
                        </text>
                        <g class="hero__badge-arrow" transform="translate(60 60) rotate(-45)">
                            <circle r="18" fill="none" stroke="currentColor" stroke-width="1.5" />
                            <path d="M-4 6 L12 -10 M12 -10 L2 -10 M12 -10 L12 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </div>
            <?php endif; ?>
            <h1 class="hero__title"><?php echo esc_html($title); ?></h1>
            <?php if (!empty($description)) : ?>
                <p class="hero__description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <div class="hero__actions">
                <?php if (!empty($cta) && !empty($cta['url'])) : ?>
                    <a class="btn btn--primary" href="<?php echo esc_url($cta['url']); ?>" target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                        <?php echo esc_html($cta['title'] ?: __('Learn More', 'interview-theme')); ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($cta_secondary) && !empty($cta_secondary['url'])) : ?>
                    <a class="btn btn--ghost" href="<?php echo esc_url($cta_secondary['url']); ?>" target="<?php echo esc_attr($cta_secondary['target'] ?: '_self'); ?>">
                        <?php echo esc_html($cta_secondary['title'] ?: __('Learn More', 'interview-theme')); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if (!empty($stats)) : ?>
                <div class="hero__stats">
                    <?php foreach ($stats as $stat) : ?>
                        <div class="stat-card">
                            <p class="stat-card__value"><?php echo esc_html($stat['value'] ?? ''); ?></p>
                            <p class="stat-card__label"><?php echo esc_html($stat['label'] ?? ''); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($image_url)) : ?>
            <div class="hero__media">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="<?php echo $is_home_hero ? 'eager' : 'lazy'; ?>" decoding="async" fetchpriority="<?php echo $is_home_hero ? 'high' : 'auto'; ?>">
            </div>
        <?php endif; ?>
    </div>
</section>
