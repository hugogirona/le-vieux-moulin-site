<?php
$title = get_sub_field('title');
$cards = get_sub_field('house_card');
$cta = get_sub_field('cta');
$slider_id = uniqid('slider_');
?>

<?php if ($cards) : ?>
    <section class="section house-characteristics"
             role="region"
             aria-labelledby="house-char-title-<?= get_row_index() ?>"
             itemscope
             itemtype="https://schema.org/Place">
        <div class="size-wrapper">

            <?php if ($title) : ?>
                <h2 class="house-characteristics__title"
                    id="house-char-title-<?= get_row_index() ?>"
                    itemprop="name">
                    <?= esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <div class="house-characteristics__slider">

                <div class="house-characteristics__slider--wrapper">
                    <?php foreach ($cards as $index => $card) : ?>
                        <?php
                        $card_title = $card['house_card_title'] ?? '';
                        $features = $card['characteristics'] ?? [];
                        ?>

                        <article class="house-characteristics__card slide"
                                 role="group"
                                 aria-label="<?= esc_attr($card_title); ?>">
                            <?php if ($card_title) : ?>
                                <h3 class="house-characteristics__card--title">
                                    <?= esc_html($card_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($features) : ?>
                                <ul class="house-characteristics__list">
                                    <?php foreach ($features as $feature) : ?>
                                        <li class="house-characteristics__feature">
                                            <?= esc_html($feature['characteristic']) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>

            </div>

            <?php if ($cta) : ?>
                <a href="<?= esc_url($cta['link']['url']) ?>"
                   title="<?= esc_attr($cta['link']['title']) ?>"
                   target="<?= esc_attr($cta['link']['target'] ?: '_self') ?>"
                   class="house-characteristics__cta cta cta--<?= esc_attr($cta['style']) ?>"
                   itemprop="url">
                    <?= esc_html($cta['label']) ?>
                </a>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>