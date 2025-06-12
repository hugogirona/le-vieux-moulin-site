<?php $headline = get_sub_field('title') ?>
<?php $first_text = get_sub_field('first_text') ?>
<?php $second_text = get_sub_field('second_text') ?>
<?php $cta = get_sub_field('cta') ?>
<?php $image = get_sub_field('image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<section class="section text-media"
         aria-labelledby="titre-bloc-<?= get_row_index() ?>"
         itemscope itemtype="https://schema.org/Service">

    <div class="size-wrapper">
        <?php if ($image): ?>
            <div class="text-media__image-wrapper text-media__image-wrapper--<?= esc_attr($media_position) ?>">
                <?= responsive_image($image, [
                    'classes' => ['text-media__image'],
                    'lazy' => 'lazy',
                    'attributes' => [
                        'itemprop' => 'image',
                        'alt' => $image['alt'] ?? 'Illustration',
                    ],
                ]) ?>
            </div>
        <?php endif; ?>

        <div class="text-media__content-container">
            <h2 class="text-media__content-headline" id="titre-bloc-<?= get_row_index() ?>" itemprop="name">
                <?= $headline ?>
            </h2>

            <div class="text-media__content-text" itemprop="description">
                <?= $first_text ?>
            </div>

            <?php if ($second_text): ?>
                <div class="text-media__content-text">
                    <?= $second_text ?>
                </div>
            <?php endif; ?>

            <?php if ($cta): ?>
                <div class="text-media__content-divider">
                    <?php foreach ($cta as $the_cta): ?>
                        <a class="text-media__content-link cta cta--<?= $the_cta['style'] ?>"
                           href="<?= $the_cta['link']['url'] ?>"
                           title="<?= $the_cta['link']['title'] ?>">
                            <?= $the_cta['label'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
