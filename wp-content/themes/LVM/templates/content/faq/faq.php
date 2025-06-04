<?php
$title = get_sub_field('title');
$questions = get_sub_field('content');
?>

<section class="section faq" aria-labelledby="faq-title">
    <?php if ($title): ?>
        <h2 id="faq-title" class="faq__title"><?= esc_html($title) ?></h2>
    <?php endif; ?>

    <?php if ($questions): ?>
        <div class="faq__list">
            <?php foreach ($questions as $index => $question): ?>
                <?php
                $question_id = 'faq-q' . $index;
                $answer_id = 'faq-a' . $index;
                ?>
                <details class="faq__item" role="group" aria-labelledby="<?= $question_id ?>" aria-describedby="<?= $answer_id ?>">
                    <summary id="<?= $question_id ?>" class="faq__question">
                        <?= esc_html($question['question']) ?>
                    </summary>
                    <div id="<?= $answer_id ?>" class="faq__answer">
                        <p><?= esc_html($question['answer']) ?></p>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>