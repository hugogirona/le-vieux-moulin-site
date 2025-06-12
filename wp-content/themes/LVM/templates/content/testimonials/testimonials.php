<?php
$headline = get_sub_field('title');
$testimonials = get_sub_field('testimonial');
?>

<section class="section testimonials"
         role="region"
         aria-labelledby="testimonial-title-<?= get_row_index() ?>"
         itemscope
         itemtype="https://schema.org/Review">
    <div class="size-wrapper">

        <h2 class="testimonials__title" id="testimonial-title-<?= get_row_index() ?>">
            <?= esc_html($headline) ?>
        </h2>

        <?php if ($testimonials): ?>
            <div class="testimonials__wrapper">
                <?php foreach ($testimonials as $testimonial): ?>
                    <?php $content = $testimonial['content']; ?>
                    <blockquote class="testimonials__p" itemprop="reviewBody">
                        <?= esc_html($content) ?>
                    </blockquote>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
