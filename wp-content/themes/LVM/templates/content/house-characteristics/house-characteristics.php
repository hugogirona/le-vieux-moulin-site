<?php
$title = get_sub_field('title');
$cards = get_sub_field('house_card');
$cta = get_sub_field('cta');
$slider_id = uniqid('slider_');
?>

<?php if ($cards) : ?>
    <section class="section house-characteristics" aria-label="<?= esc_attr($title); ?>">

        <?php if ($title) : ?>
            <h2 class="house-characteristics__title"><?= esc_html($title); ?></h2>
        <?php endif; ?>

        <?php foreach ($cards as $index => $card): ?>
            <input type="radio"
                   name="<?= $slider_id ?>"
                   id="<?= $slider_id ?>_<?= $index ?>"
                <?= $index === 0 ? 'checked' : '' ?>
            />
        <?php endforeach; ?>
        <div class="house-characteristics__slider--wrapper">

            <div class="house-characteristics__slider">
                <?php foreach ($cards as $index => $card) : ?>
                    <?php
                    $card_title = $card['house_card_title'] ?? '';
                    $features = $card['characteristics'] ?? [];
                    ?>

                    <article class="house-characteristics__card slide">
                        <?php if ($card_title) : ?>
                            <h3 class="house-characteristics__card-title"><?= esc_html($card_title); ?></h3>
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

            <div class="house-characteristics__arrows">
                <?php foreach ($cards as $index => $card): ?>
                    <?php
                    $total = count($cards);
                    $prev_index = $index - 1 >= 0 ? $index - 1 : $total - 1;
                    $next_index = $index + 1 < $total ? $index + 1 : 0;
                    ?>

                    <label for="<?= $slider_id ?>_<?= $prev_index ?>"
                           class="house-characteristics__arrow house-characteristics__arrow--prev house-characteristics__arrow--<?= $index ?>">
                        ◀
                    </label>

                    <label for="<?= $slider_id ?>_<?= $next_index ?>"
                           class="house-characteristics__arrow house-characteristics__arrow--next house-characteristics__arrow--<?= $index ?>">
                        ▶
                    </label>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- CTA (optionnel) -->
        <?php if ($cta) : ?>
            <a href="<?= esc_url($cta['link']['url']) ?>"
               title="<?= esc_attr($cta['link']['title']) ?>"
               target="<?= esc_attr($cta['link']['target'] ?: '_self') ?>"
               class="house-characteristics__cta cta cta--<?= esc_attr($cta['style']) ?>">
                <?= esc_html($cta['label']) ?>
            </a>
        <?php endif; ?>
    </section>
<?php endif; ?>