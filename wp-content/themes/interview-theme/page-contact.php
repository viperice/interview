<?php
/**
 * Template Name: Contact Page
 */
get_header();

$hero_title = get_field('hero_title') ?: get_the_title();
$hero_description = get_field('hero_description') ?: '';
$contact_phone = get_field('contact_phone');
$contact_email = get_field('contact_email');
$contact_address = get_field('contact_address');
$map_embed = get_field('contact_map_embed');
$form_shortcode = get_field('contact_form_shortcode');

get_template_part(
    'template-parts/hero',
    null,
    array(
        'title' => $hero_title,
        'description' => $hero_description,
    )
);
?>

<section class="section section--contact">
    <div class="container">
        <div class="pill-grid">
            <div class="pill">
                <span><?php echo esc_html($contact_email ?: 'info@estatein.com'); ?></span>
                <span class="pill__arrow">↗</span>
            </div>
            <div class="pill">
                <span><?php echo esc_html($contact_phone ?: '+1 (123) 456-7890'); ?></span>
                <span class="pill__arrow">↗</span>
            </div>
            <div class="pill">
                <span><?php esc_html_e('Main Headquarters', 'interview-theme'); ?></span>
                <span class="pill__arrow">↗</span>
            </div>
            <div class="pill">
                <span><?php esc_html_e('Instagram · LinkedIn · Facebook', 'interview-theme'); ?></span>
                <span class="pill__arrow">↗</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--contact">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e("Let's Connect", 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Tell us about your goals and we will reach out shortly.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="form-card">
            <?php if (!empty($form_shortcode)) : ?>
                <?php echo do_shortcode($form_shortcode); ?>
            <?php else : ?>
                <form class="contact-form__grid">
                    <div class="input-group">
                        <input class="input" type="text" placeholder="<?php esc_attr_e('First Name', 'interview-theme'); ?>">
                        <input class="input" type="text" placeholder="<?php esc_attr_e('Last Name', 'interview-theme'); ?>">
                        <input class="input" type="email" placeholder="<?php esc_attr_e('Email', 'interview-theme'); ?>">
                        <input class="input" type="tel" placeholder="<?php esc_attr_e('Phone', 'interview-theme'); ?>">
                        <select>
                            <option><?php esc_html_e('Inquiry Type', 'interview-theme'); ?></option>
                        </select>
                        <select>
                            <option><?php esc_html_e('How did you hear about us?', 'interview-theme'); ?></option>
                        </select>
                    </div>
                    <textarea rows="4" placeholder="<?php esc_attr_e('Message', 'interview-theme'); ?>"></textarea>
                    <div>
                        <label>
                            <input type="checkbox"> <?php esc_html_e('I agree with Terms of Use and Privacy Policy', 'interview-theme'); ?>
                        </label>
                    </div>
                    <button class="btn btn--primary" type="button"><?php esc_html_e('Send Your Message', 'interview-theme'); ?></button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($map_embed)) : ?>
    <section class="section section--map">
        <div class="container map-embed">
            <?php echo $map_embed; ?>
        </div>
    </section>
<?php endif; ?>

<section class="section section--offices">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e('Discover Our Office Locations', 'interview-theme'); ?></h2>
                <p><?php esc_html_e('Visit us at one of our convenient office locations.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="office-tabs">
            <button class="tab"><?php esc_html_e('All', 'interview-theme'); ?></button>
            <button class="tab"><?php esc_html_e('Regional', 'interview-theme'); ?></button>
            <button class="tab"><?php esc_html_e('International', 'interview-theme'); ?></button>
        </div>
        <div class="card-grid">
            <article class="card">
                <h3><?php esc_html_e('Main Headquarters', 'interview-theme'); ?></h3>
                <p class="card__text"><?php esc_html_e('123 Estatein Plaza, City Center, Metropolis', 'interview-theme'); ?></p>
                <p class="card__meta"><?php esc_html_e('info@estatein.com · +1 (123) 456-7890', 'interview-theme'); ?></p>
                <a class="btn btn--primary" href="#"><?php esc_html_e('Get Direction', 'interview-theme'); ?></a>
            </article>
            <article class="card">
                <h3><?php esc_html_e('Regional Offices', 'interview-theme'); ?></h3>
                <p class="card__text"><?php esc_html_e('456 Urban Avenue, Downtown District, Metropolis', 'interview-theme'); ?></p>
                <p class="card__meta"><?php esc_html_e('info@estatein.com · +1 (123) 628-7890', 'interview-theme'); ?></p>
                <a class="btn btn--primary" href="#"><?php esc_html_e('Get Direction', 'interview-theme'); ?></a>
            </article>
        </div>
    </div>
</section>

<section class="section section--gallery">
    <div class="container">
        <div class="section__header">
            <div>
                <h2><?php esc_html_e("Explore Estatein's World", 'interview-theme'); ?></h2>
                <p><?php esc_html_e('A glimpse into our team and workspaces.', 'interview-theme'); ?></p>
            </div>
        </div>
        <div class="gallery-grid">
            <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/Contact Page - Desktop.png')); ?>" alt="<?php esc_attr_e('Office preview', 'interview-theme'); ?>">
            <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/Home Page - Desktop.png')); ?>" alt="<?php esc_attr_e('Team preview', 'interview-theme'); ?>">
            <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/Services Page - Desktop.png')); ?>" alt="<?php esc_attr_e('Workspace preview', 'interview-theme'); ?>">
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta">
            <div>
                <h2><?php esc_html_e('Start Your Real Estate Journey Today', 'interview-theme'); ?></h2>
                <p class="cta__text"><?php esc_html_e('We are ready to help you take the next step.', 'interview-theme'); ?></p>
            </div>
            <a class="btn btn--primary" href="<?php echo esc_url(interview_get_page_link('properties', home_url('/'))); ?>">
                <?php esc_html_e('Explore Properties', 'interview-theme'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
