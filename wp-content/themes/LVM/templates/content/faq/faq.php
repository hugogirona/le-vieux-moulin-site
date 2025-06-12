<?php
$title = get_sub_field('title');
$questions = get_sub_field('content');
?>

<?php if ($questions): ?>
    <section class="section faq"
             aria-labelledby="faq-title-<?= get_row_index() ?>"
             itemscope
             itemtype="https://schema.org/FAQPage">
        <div class="size-wrapper">

            <?php if ($title): ?>
                <h2 class="faq__title" id="faq-title-<?= get_row_index() ?>">
                    <?= esc_html($title) ?>
                </h2>
            <?php endif; ?>

            <ul class="faq__list">
                <?php foreach ($questions as $question): ?>
                    <li class="faq__item"
                        itemscope
                        itemprop="mainEntity"
                        itemtype="https://schema.org/Question">

                    <span class="faq__arrow" aria-hidden="true">
                        <!-- Flèche décorative -->
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.5L7 6.5L1 11.5" stroke="#FFFFFE" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>

                        <span class="faq__question" itemprop="name">
                        <?= esc_html($question['question']) ?>
                    </span>

                        <div class="faq__answer"
                             itemscope
                             itemprop="acceptedAnswer"
                             itemtype="https://schema.org/Answer">
                            <p itemprop="text"><?= esc_html($question['answer']) ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>