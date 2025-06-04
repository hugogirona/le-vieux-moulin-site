<?php
$headline = get_sub_field('title');
$paragraphs = get_sub_field('title_paragraph');
?>

<section class="section chronology">
    <h2 class="chronology__title"><?= $headline ?></h2>
    <?php if ($paragraphs): ?>
        <div class="chronology_wrapper">
            <?php foreach ($paragraphs as $paragraph): ?>
                <?php
                $title = $paragraph['title'];
                $content = $paragraph['paragraph'];
                $position = $paragraph['position'];
                ?>

                <article class="chronology__bloc chronology__bloc--<?= $position ?>">
                    <h3 class="chronology__bloc--title"><?= $title ?></h3>
                    <p class="chronology__bloc--content"><?= $content ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>
