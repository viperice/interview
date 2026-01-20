<?php
$title = isset($args['title']) ? $args['title'] : '';
$location = isset($args['location']) ? $args['location'] : '';
$price = isset($args['price']) ? $args['price'] : '';
$badge = isset($args['badge']) ? $args['badge'] : '';
$image = isset($args['image']) ? $args['image'] : null;
$features = isset($args['features']) ? $args['features'] : array();
$description = isset($args['description']) ? $args['description'] : '';
$tags = isset($args['tags']) ? $args['tags'] : array();
$tag_icons = isset($args['tag_icons']) ? $args['tag_icons'] : array();
$cta_label = isset($args['cta_label']) ? $args['cta_label'] : __('View Property Details', 'interview-theme');
$cta_url = isset($args['cta_url']) ? $args['cta_url'] : '#';
?>
<article class="card card--property">
    <?php if (!empty($image) && !empty($image['url'])) : ?>
        <div class="card__media">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $title); ?>" loading="lazy" decoding="async">
            <?php if (!empty($badge)) : ?>
                <span class="card__badge"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="card__body">
        <h3 class="card__title"><?php echo esc_html($title); ?></h3>
        <?php if (!empty($description)) : ?>
            <p class="card__text"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
        <?php if (!empty($tags)) : ?>
            <div class="tag-list">
                <?php foreach ($tags as $index => $tag) : ?>
                    <span class="tag">
                        <?php if (!empty($tag_icons[$index])) : ?>
                            <img src="<?php echo esc_url($tag_icons[$index]); ?>" alt="" loading="lazy" decoding="async">
                        <?php endif; ?>
                        <?php echo esc_html($tag); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php elseif (!empty($features)) : ?>
            <div class="tag-list">
                <?php foreach ($features as $feature) : ?>
                    <span class="tag"><?php echo esc_html($feature); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="card__footer">
            <div class="card__price-block">
                <?php if (!empty($price)) : ?>
                    <p class="card__meta"><?php esc_html_e('Price', 'interview-theme'); ?></p>
                    <p class="card__price"><?php echo esc_html($price); ?></p>
                <?php endif; ?>
            </div>
            <div class="card__actions">
                <a class="btn btn--primary" href="<?php echo esc_url($cta_url); ?>">
                    <?php echo esc_html($cta_label); ?>
                </a>
            </div>
        </div>
    </div>
</article>
