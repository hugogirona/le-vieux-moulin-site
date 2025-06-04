<?php


get_header(); ?>

<article class="single-new">
    <h2 class="single-new__title"><?= get_field('title') ?></h2>

    <?php if (get_field('image_under')): ?>
    <?= responsive_image(get_field('image_under'), [
        'classes' => ['single-new__image'],
        'lazy' => 'lazy',
    ]) ?>
    <?php endif; ?>

    <div class="single-new__content">
        <?= get_field('content') ?>
    </div>
</article>


<aside class="aside aside-actu">
    <div class="aside-actu__container">
        <h2 class="aside-actu__title">Dernières actualités</h2>

        <div class=aside-actu__grid">
            <?php
            $actu = new WP_Query([
                'post_type' => 'actu',
                'posts_per_page' => 4,
                'orderby' => 'desc'
            ]);

            if ($actu->have_posts()) :
                while ($actu->have_posts()) : $actu->the_post();
                    include get_template_directory() . '/templates/content/latest-news/actu-card.php';
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune actualité trouvée.</p>';
            endif;
            ?>
        </div>
    </div>
</aside>


<?php get_footer(); ?>
