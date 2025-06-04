<?php
$headline = get_sub_field('title');
$testimonials = get_sub_field('testimonial');
?>

<section class="testimonials">
    <h2 class="testimonials__title"><?= $headline ?></h2>

    <?php if ($testimonials): ?>
        <div class="testimonials__wrapper">
            <?php foreach ($testimonials as $testimonial): ?>
                <?php $content = $testimonial['content']; ?>
                <p class="testimonials__p"><?= $content ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
