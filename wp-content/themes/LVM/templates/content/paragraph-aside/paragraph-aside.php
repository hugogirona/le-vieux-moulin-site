<?php

$title = get_sub_field('title');
$content = get_sub_field('content');
$title_aside = get_sub_field('title_aside');
$content_list = get_sub_field('content_aside');
$image = get_sub_field('image');
?>


<section class="section single-paragraph">
    <div class="size-wrapper">

    <div class="single-paragraph__divider--left">
        <h2 class="single-paragraph__title"><?= $title ?></h2>

        <?php if ($content): ?>
            <p class="single-paragraph__content"><?= $content ?></p>
        <?php endif; ?>

    </div>

    <article class="single-paragraph__divider--right">
        <?php if ($title_aside): ?>
            <h3 class="single-paragraph__subtitle"><?= $title_aside ?></h3>
        <?php endif; ?>

        <?php if ($content_list): ?>
            <ul>
                <?php foreach ($content_list as $item): ?>
                    <li class="single-paragraph__item"><?= $item['content_line'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ($image): ?>
            <img src="<?= $image['url'] ?>"
                 alt="<?= $image['alt'] ?>"
                 width="<?= $image['width'] ?>"
                 height="<?= $image['height'] ?>">
        <?php endif; ?>

    </article>
    </div>
</section>
