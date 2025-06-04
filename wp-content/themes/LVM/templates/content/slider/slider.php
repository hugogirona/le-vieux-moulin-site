<?php $title = get_sub_field('title') ?>
<?php $paragraphs = get_sub_field('paragraphs') ?>
<?php $images = get_sub_field('slider_gallery'); ?>

<section class="section slider">
    <?php if ($title): ?>
        <h2 class="slider__title"><?= $title ?></h2>
    <?php endif; ?>

    <?php if ($paragraphs): ?>
    <div class="slider__container">
    <?php foreach ($paragraphs as $paragraph): ?>

        <p class="slider__content"> <?= $paragraph['content'] ?>  </p>

    <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ($images): ?>
<div class="slider__wrapper">

    <?php foreach ($images as $i => $image): ?>
        <input type="radio" name="slider" id="slide-<?= $i ?>" <?= $i === 0 ? 'checked' : '' ?>
               class="slider__radio">
    <?php endforeach; ?>

    <div class="slider__track">
        <?php foreach ($images as $i => $image): ?>
            <label class="slider__slide" for="slide-<?= $i ?>">
                <img src="<?= esc_url($image['url']) ?>"
                     alt="<?= esc_attr($image['alt']) ?>"
                     width="<?= esc_attr($image['width']); ?>"
                     height="<?= esc_attr($image['height']); ?>"
                     class="slider__img">
            </label>
        <?php endforeach; ?>
    </div>


    <div class="slider__dots">
        <?php foreach ($images as $i => $_): ?>
            <label for="slide-<?= $i ?>" class="slider__dot"></label>
        <?php endforeach; ?>
    </div>
</div>


</section>
<?php endif; ?>

