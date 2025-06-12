<?php /* Template Name: Page "Foyer" */ ?>

<?php $headline = get_field('page_title') ?>
<?php $banner = get_field('banner') ?>

<?php get_header() ?>



<section class="foster__header">
    <h2 class="foster__title"><?= $headline ?></h2>
    <?= responsive_image($banner, [
        'classes' => ['foster__banner'],
        'lazy' => 'eager',
        'size' => 'banner'
    ]) ?>
    <ul class="foster__info">
        <li class="foster__info__item"><?=get__option('company_address')?></li>
        <li class="foster__info__item"><?=get__option('company_postal')?></li>
    </ul>
</section>

<?php include 'templates/content/flexible.php'; ?>

<?php get_footer() ?>

