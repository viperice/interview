<?php
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'interview-theme'); ?></a>

<header class="site-header">
    <div class="topbar">
        <div class="container topbar__inner">
            <p class="topbar__text">
                <?php esc_html_e('Discover Your Dream Property with Estatein.', 'interview-theme'); ?>
                <a href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>" class="topbar__link">
                    <?php esc_html_e('Learn More', 'interview-theme'); ?>
                </a>
            </p>
            <span class="topbar__spacer" aria-hidden="true"></span>
            <button class="topbar__close" type="button" aria-label="<?php esc_attr_e('Close announcement', 'interview-theme'); ?>">
                ×
            </button>
        </div>
    </div>
    <div class="container site-header__inner">
        <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/Logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        </a>

        <button class="nav-toggle js-nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu" aria-label="<?php esc_attr_e('Toggle navigation', 'interview-theme'); ?>">
            <span aria-hidden="true"></span>
        </button>

        <nav class="site-nav" aria-label="<?php esc_attr_e('Primary', 'interview-theme'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'site-nav__list',
                    'container' => false,
                )
            );
            ?>
        </nav>

        <a class="btn btn--primary header-cta" href="<?php echo esc_url(interview_get_page_link('contact', home_url('/'))); ?>">
            <?php esc_html_e('Contact Us', 'interview-theme'); ?>
        </a>
    </div>
</header>

<main id="content" class="site-main">
