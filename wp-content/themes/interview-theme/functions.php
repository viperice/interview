<?php

if (!defined('INTERVIEW_THEME_VERSION')) {
    define('INTERVIEW_THEME_VERSION', '1.0.0');
}

function interview_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support(
        'html5',
        array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script')
    );

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'interview-theme'),
            'footer' => __('Footer Menu', 'interview-theme'),
        )
    );

    add_image_size('card-md', 640, 420, true);
}
add_action('after_setup_theme', 'interview_theme_setup');

function interview_theme_assets() {
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style(
        'interview-theme-fonts',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'interview-theme-main',
        $theme_uri . '/assets/css/main.css',
        array('interview-theme-fonts'),
        INTERVIEW_THEME_VERSION
    );

    wp_enqueue_script(
        'interview-theme-main',
        $theme_uri . '/assets/js/main.js',
        array(),
        INTERVIEW_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'interview_theme_assets');

function interview_theme_resource_hints($urls, $relation_type) {
    if ($relation_type === 'preconnect') {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = 'https://fonts.gstatic.com';
    }
    return $urls;
}
add_filter('wp_resource_hints', 'interview_theme_resource_hints', 10, 2);

function interview_theme_acf_json_save_path($path) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'interview_theme_acf_json_save_path');

function interview_theme_acf_json_load_path($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'interview_theme_acf_json_load_path');

function interview_register_service_cpt() {
    $labels = array(
        'name' => __('Services', 'interview-theme'),
        'singular_name' => __('Service', 'interview-theme'),
        'add_new_item' => __('Add New Service', 'interview-theme'),
        'edit_item' => __('Edit Service', 'interview-theme'),
        'view_item' => __('View Service', 'interview-theme'),
        'search_items' => __('Search Services', 'interview-theme'),
    );

    register_post_type(
        'service',
        array(
            'labels' => $labels,
            'public' => true,
            'menu_icon' => 'dashicons-admin-generic',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'has_archive' => false,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'interview_register_service_cpt');

function interview_register_property_cpt() {
    $labels = array(
        'name' => __('Properties', 'interview-theme'),
        'singular_name' => __('Property', 'interview-theme'),
        'add_new_item' => __('Add New Property', 'interview-theme'),
        'edit_item' => __('Edit Property', 'interview-theme'),
        'view_item' => __('View Property', 'interview-theme'),
        'search_items' => __('Search Properties', 'interview-theme'),
    );

    register_post_type(
        'property',
        array(
            'labels' => $labels,
            'public' => true,
            'menu_icon' => 'dashicons-admin-home',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'has_archive' => false,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'interview_register_property_cpt');

function interview_get_asset_url($path) {
    return esc_url(get_template_directory_uri() . '/' . ltrim($path, '/'));
}

function interview_get_page_link($slug, $fallback = '#') {
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page->ID);
    }
    return $fallback;
}

function interview_theme_output_seo_meta() {
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');
    $title = wp_get_document_title();
    $description = $site_description;
    $url = home_url('/');
    $image = interview_get_asset_url('assets/reference/Container.png');

    if (is_singular()) {
        $url = get_permalink();
        $excerpt = get_the_excerpt();
        if (!empty($excerpt)) {
            $description = $excerpt;
        }
        if (has_post_thumbnail()) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            if (!empty($image_data[0])) {
                $image = $image_data[0];
            }
        }
    }

    echo '<meta name="description" content="' . esc_attr(wp_strip_all_tags($description)) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($description)) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="' . (is_singular() ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr(wp_strip_all_tags($description)) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";

    $org_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $site_name,
        'url' => home_url('/'),
        'logo' => interview_get_asset_url('assets/reference/Logo.png'),
    );

    $site_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $site_name,
        'url' => home_url('/'),
    );

    echo '<script type="application/ld+json">' . wp_json_encode($org_schema) . '</script>' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode($site_schema) . '</script>' . "\n";
}
add_action('wp_head', 'interview_theme_output_seo_meta', 1);
