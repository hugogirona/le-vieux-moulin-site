<?php
$title = get_sub_field('title');
$logos = get_sub_field('images_links');
?>

<?php if ($logos): ?>
    <section class="sponsor-strip" aria-label="Partenaires">


        <?php if ($title): ?>
            <h2 class="sponsor-strip__title"><?= esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="sponsor-strip__logos">

            <?php foreach ($logos as $logo): ?>

                <?php $image = $logo['image'] ?>
                <?php $link = $logo['link'] ?>

                <div class="sponsor-strip__logo">
                    <?= responsive_image($image, [
                        'classes' => ['sponsor-strip__img'],
                        'lazy' => 'lazy',
                    ]) ?>

                    <?php if ($link): ?>
                        <a href="<?= esc_url($link['url'])?>"
                           title="<?= esc_attr($link['title'])?>"
                           target="<?= esc_attr($link['target'] ? : '_self')?>"
                           class="sponsor-strip__link"></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>


    </section>
<?php endif; ?>
