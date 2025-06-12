<?php
$title = get_sub_field('title');
$questions = get_sub_field('content');
?>

<section class="section faq">
    <div class="size-wrapper">
    <?php if ($title): ?>
        <h2 class="faq__title"><?= esc_html($title) ?></h2>
    <?php endif; ?>

    <?php if ($questions): ?>
        <ul class="faq__list">
            <?php foreach ($questions as $question): ?>

                <li class="faq__item">
                    <span class="faq__arrow">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.5L7 6.5L1 11.5" stroke="#FFFFFE" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="faq__question">
                        <?= esc_html($question['question']) ?>
                    </span>
                    <div class="faq__answer">
                        <p><?= esc_html($question['answer']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </div>
</section>