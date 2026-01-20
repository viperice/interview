<?php
?>
</main>

<footer class="site-footer">
    <div class="container site-footer__inner">
        <div class="site-footer__brand">
            <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(interview_get_asset_url('assets/reference/Logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
            <form class="footer-form" action="#" method="post">
                <input type="email" name="footer_email" placeholder="<?php esc_attr_e('Enter Your Email', 'interview-theme'); ?>" aria-label="<?php esc_attr_e('Email address', 'interview-theme'); ?>">
                <button type="submit" aria-label="<?php esc_attr_e('Submit', 'interview-theme'); ?>">➜</button>
            </form>
        </div>

        <nav class="site-footer__nav" aria-label="<?php esc_attr_e('Footer', 'interview-theme'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'menu_id' => 'footer-menu',
                    'container' => false,
                )
            );
            ?>
        </nav>
    </div>

    <div class="container site-footer__bottom">
        <p class="site-footer__copy">
            <?php echo esc_html(sprintf(__('© %1$s %2$s. All rights reserved.', 'interview-theme'), date('Y'), get_bloginfo('name'))); ?>
        </p>
        <a class="site-footer__link" href="#"><?php esc_html_e('Terms & Conditions', 'interview-theme'); ?></a>
        <div class="site-footer__socials">
            <a href="#" aria-label="<?php esc_attr_e('Facebook', 'interview-theme'); ?>">f</a>
            <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'interview-theme'); ?>">in</a>
            <a href="#" aria-label="<?php esc_attr_e('Twitter', 'interview-theme'); ?>">x</a>
            <a href="#" aria-label="<?php esc_attr_e('YouTube', 'interview-theme'); ?>">yt</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
