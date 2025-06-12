<?php
$title = get_sub_field('title');
$logos = get_sub_field('images_links');
?>

<?php if ($logos): ?>
    <section class="sponsor-strip"
             aria-labelledby="sponsor-strip-title">

        <?php if ($title): ?>
            <h2 class="sponsor-strip__title" id="sponsor-strip-title">
                <?= esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <ul class="sponsor-strip__logos-wrapper">
            <?php
            $logo_count = count($logos);
            $displayed_logos = $logo_count < 6 ? array_merge($logos, $logos, $logos) : $logos;
            $repeated_logos = array_merge($displayed_logos, $displayed_logos);
            ?>

            <?php foreach ($repeated_logos as $logo): ?>
                <?php
                $image = $logo['image'];
                $link = $logo['link'];
                ?>

                <li class="sponsor-strip__logo" itemscope itemtype="https://schema.org/Organization">
                    <?php if ($image): ?>
                        <?= responsive_image($image, [
                            'classes' => ['sponsor-strip__img'],
                            'lazy' => 'lazy',
                            'attributes' => [
                                'itemprop' => 'logo',
                                'alt' => $image['alt'] ?? 'Logo partenaire'
                            ]
                        ]) ?>
                    <?php endif; ?>

                    <?php if ($link): ?>
                        <meta itemprop="url" content="<?= esc_url($link['url']) ?>">
                        <a href="<?= esc_url($link['url']) ?>"
                           title="<?= esc_attr($link['title']) ?>"
                           target="<?= esc_attr($link['target'] ?: '_self') ?>"
                           class="sponsor-strip__link"
                           aria-label="<?= esc_attr($link['title']) ?>"></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>
