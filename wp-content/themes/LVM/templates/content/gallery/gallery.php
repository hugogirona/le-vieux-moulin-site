
<?php
$title = get_sub_field('title');
$images = get_sub_field('gallery');
?>
<?php if ($images) : ?>
    <section class="gallery">
        <div class="gallery__container">
            <?php if ($title) : ?>
                <h2 class="gallery__title"><?= esc_html($title); ?></h2>
            <?php endif; ?>

            <div class="gallery__grid">
                <?php foreach ($images as $image) : ?>
                    <?= responsive_image($image, [
                        'classes' => ['gallery__image'],
                        'lazy' => 'lazy',
                        'size' => 'medium'
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>