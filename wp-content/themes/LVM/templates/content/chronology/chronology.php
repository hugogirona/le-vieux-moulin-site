<?php
$headline = get_sub_field('title');
$paragraphs = get_sub_field('title_paragraph');
?>

<?php if ($paragraphs): ?>
    <section class="section chronology"
             aria-labelledby="chronology-title-<?= get_row_index() ?>"
             itemscope
             itemtype="https://schema.org/HowTo">
        <div class="size-wrapper">

            <h2 class="chronology__title"
                id="chronology-title-<?= get_row_index() ?>"
                itemprop="name">
                <?= esc_html($headline) ?>
            </h2>

            <div class="chronology__wrapper">
                <?php foreach ($paragraphs as $paragraph): ?>
                    <?php
                    $title = $paragraph['title'];
                    $content = $paragraph['paragraph'];
                    $position = $paragraph['position'];
                    ?>

                    <article class="chronology__bloc chronology__bloc--<?= esc_attr($position) ?>"
                             itemscope
                             itemprop="step"
                             itemtype="https://schema.org/HowToStep">
                        <h3 class="chronology__bloc--title" itemprop="name"><?= esc_html($title) ?></h3>
                        <p class="chronology__bloc--content" itemprop="text"><?= esc_html($content) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php endif; ?>