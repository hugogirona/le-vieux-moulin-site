<?php

$title = get_sub_field('title');
$content = get_sub_field('content');
$title_aside = get_sub_field('title_aside');
$content_list = get_sub_field('content_aside');
$image = get_sub_field('image');
?>


<section class="section single-paragraph"
         aria-labelledby="don-title-<?= get_row_index() ?>"
         itemscope
         itemtype="https://schema.org/DonateAction">
    <div class="size-wrapper">

        <div class="single-paragraph__divider--left">
            <h2 class="single-paragraph__title"
                id="don-title-<?= get_row_index() ?>"
                itemprop="name">
                <?= esc_html($title) ?>
            </h2>

            <?php if ($content): ?>
                <p class="single-paragraph__content" itemprop="description">
                    <?= esc_html($content) ?>
                </p>
            <?php endif; ?>
        </div>

        <aside class="single-paragraph__divider--right"
               aria-labelledby="aside-don-title-<?= get_row_index() ?>">
            <?php if ($title_aside): ?>
                <h3 class="single-paragraph__subtitle"
                    id="aside-don-title-<?= get_row_index() ?>">
                    <?= esc_html($title_aside) ?>
                </h3>
            <?php endif; ?>

            <?php if ($content_list): ?>
                <ul>
                    <?php foreach ($content_list as $item): ?>
                        <li class="single-paragraph__item"><?= esc_html($item['content_line']) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($image): ?>
                <img src="<?= esc_url($image['url']) ?>"
                     alt="<?= esc_attr($image['alt']) ?>"
                     width="<?= esc_attr($image['width']) ?>"
                     height="<?= esc_attr($image['height']) ?>"
                     itemprop="image">
            <?php endif; ?>
        </aside>

    </div>
</section>
