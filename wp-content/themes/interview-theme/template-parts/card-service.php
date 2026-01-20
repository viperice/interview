<?php
$title = isset($args['title']) ? $args['title'] : '';
$description = isset($args['description']) ? $args['description'] : '';
$icon = isset($args['icon']) ? $args['icon'] : null;
?>
<article class="card card--service">
    <?php if (!empty($icon) && !empty($icon['url'])) : ?>
        <img class="card__icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: $title); ?>" loading="lazy" decoding="async">
    <?php endif; ?>
    <h3 class="card__title"><?php echo esc_html($title); ?></h3>
    <?php if (!empty($description)) : ?>
        <p class="card__text"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
</article>
