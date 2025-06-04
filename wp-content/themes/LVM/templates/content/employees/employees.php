<?php
$title = get_sub_field('title');
$employees = get_sub_field('employee_card');
?>

<?php if ($employees): ?>
    <section class="section employees" aria-labelledby="employees-title">
        <?php if ($title): ?>
            <h2 id="employees-title" class="employees__title"><?= esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="employees__list">
            <?php foreach ($employees as $employee): ?>
                <?php
                $name = $employee['name'] ?? '';
                $job = $employee['job'] ?? '';
                $portrait = $employee['portrait'] ?? null;
                ?>
                <div class="employees__card">
                    <?php if ($portrait): ?>
                        <figure class="employees__portrait">
                            <img src="<?= esc_url($portrait['sizes']['medium']) ?>"
                                 alt="<?= esc_attr($name) ?>"
                                 width="<?= esc_attr($portrait['sizes']['medium-width']) ?>"
                                 height="<?= esc_attr($portrait['sizes']['medium-height']) ?>" />
                        </figure>
                    <?php endif; ?>

                    <?php if ($name): ?>
                        <p class="employees__name"><?= esc_html($name); ?></p>
                    <?php endif; ?>

                    <?php if ($job): ?>
                        <p class="employees__job"><?= esc_html($job); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>