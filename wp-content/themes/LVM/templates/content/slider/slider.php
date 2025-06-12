<?php
$title = get_sub_field('title');
$paragraphs = get_sub_field('paragraphs');
$images = get_sub_field('slider_gallery');
?>

<section class="section slider"
         aria-labelledby="slider-title-<?= get_row_index() ?>"
         itemscope
         itemtype="https://schema.org/ImageGallery">
    <div class="size-wrapper">
        <div class="slider__divider">
            <?php if ($title): ?>
                <h2 class="slider__title" id="slider-title-<?= get_row_index() ?>" itemprop="name">
                    <?= esc_html($title) ?>
                </h2>
            <?php endif; ?>

            <?php if ($paragraphs): ?>
                <div class="slider__container" itemprop="description">
                    <?php foreach ($paragraphs as $paragraph): ?>
                        <p class="slider__content"><?= esc_html($paragraph['content']) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($images): ?>
            <div class="slider__wrapper" role="group" aria-label="Galerie d’images de la résidence">

                <?php foreach ($images as $i => $image): ?>
                    <input type="radio" name="slider" id="slide-<?= $i ?>"
                           class="slider__radio"
                        <?= $i === 0 ? 'checked' : '' ?>>
                <?php endforeach; ?>

                <div class="slider__track">
                    <?php foreach ($images as $i => $image): ?>
                        <label class="slider__slide"
                               for="slide-<?= $i ?>"
                               itemprop="associatedMedia"
                               itemscope
                               itemtype="https://schema.org/ImageObject">

                            <span class="screenreader__only">Voir la diapositive <?= $i + 1 ?></span>

                            <img src="<?= esc_url($image['url']) ?>"
                                 alt="<?= esc_attr($image['alt']) ?>"
                                 width="<?= esc_attr($image['width']) ?>"
                                 height="<?= esc_attr($image['height']) ?>"
                                 class="slider__img"
                                 itemprop="contentUrl">

                            <meta itemprop="description" content="<?= esc_attr($image['alt']) ?>">
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="slider__dots">
                    <?php foreach ($images as $i => $_): ?>
                        <label for="slide-<?= $i ?>" class="slider__dot">
                            <span class="screenreader__only">Aller à la diapositive <?= $i + 1 ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>