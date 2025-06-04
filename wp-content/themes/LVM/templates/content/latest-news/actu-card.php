<article class="actu-card">
    <a href="<?= esc_url(get_permalink()); ?>" class="actu-card__link">

        <h3 class="project-card__title"><?= esc_html(get_the_title()); ?></h3>

        <?php if (has_post_thumbnail()) : ?>
            <div class="actu-card__image">
                <?= get_the_post_thumbnail(null, 'medium'); ?>
            </div>
        <?php endif; ?>
    </a>
</article>