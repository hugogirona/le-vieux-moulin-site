<article class="actu-card" itemscope itemtype="https://schema.org/Article">
    <h3 class="actu-card__title" itemprop="headline"><?= esc_html(get_the_title()); ?></h3>

    <a href="<?= esc_url(get_permalink()); ?>" title="Ouvrir l'actualité" class="actu-card__link">Ouvrir l'actualité</a>

    <?php if (has_post_thumbnail()) : ?>
        <div class="actu-card__image" itemprop="image">
            <?= get_the_post_thumbnail(null, 'medium'); ?>
        </div>
    <?php endif; ?>
</article>