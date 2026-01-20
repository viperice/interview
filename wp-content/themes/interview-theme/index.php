<?php
get_header();
?>

<section class="section section--default">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="post-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article <?php post_class('post-card'); ?>>
                        <a class="post-card__link" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-card__media">
                                    <?php the_post_thumbnail('card-md'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="post-card__body">
                                <h2 class="post-card__title"><?php the_title(); ?></h2>
                                <p class="post-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'interview-theme'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
