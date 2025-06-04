<?php

$title = get_sub_field('title');
$content = get_sub_field('content');
$title_aside = get_sub_field('title_aside');
$content_list = get_sub_field('content_aside');
$image = get_sub_field('image');
?>


<section class="section single-paragraph">
    <div class="single-paragraph__divider--left">
        <h2 class="single-paragraph__title"><?= $title ?></h2>

        <?php if ($content): ?>
            <p class="single-paragraph__content"><?= $content ?></p>
        <?php endif; ?>

    </div>

    <div class="single-paragraph__divider--right">
        <ul>
            <?php foreach ($content_list as $item): ?>
                <li class="single-paragraph__item"><?= $item['content_line'] ?></li>
            <?php endforeach; ?>
        </ul>

        <?php if ($image): ?>
            <img src="<?= $image['url'] ?>"
                 alt="<?= $image['alt'] ?>"
                 width="<?= $image['width'] ?>"
                 height="<?= $image['height'] ?>">
        <?php endif; ?>

    </div>
</section>
