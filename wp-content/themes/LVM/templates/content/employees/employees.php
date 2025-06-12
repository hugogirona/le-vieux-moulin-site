<?php
$title = get_sub_field('title');
$employees = get_sub_field('employee_card');
?>

<?php if ($employees): ?>
    <section class="section employees"
             role="region"
             aria-labelledby="employees-title"
             itemscope
             itemtype="https://schema.org/Organization">
        <div class="size-wrapper">

            <?php if ($title): ?>
                <h2 class="employees__title" id="employees-title" itemprop="name">
                    <?= esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <div class="employees__list">
                <div class="employees__list--wrapper">
                    <?php foreach ($employees as $employee): ?>
                        <?php
                        $name = $employee['name'] ?? '';
                        $job = $employee['job'] ?? '';
                        $portrait = $employee['portrait'] ?? null;
                        ?>
                        <div class="employees__card"
                             itemscope
                             itemprop="employee"
                             itemtype="https://schema.org/Person">

                            <?php if ($portrait): ?>
                                <figure class="employees__portrait">
                                    <img src="<?= esc_url($portrait['sizes']['medium']) ?>"
                                         alt="<?= esc_attr($name) ?>"
                                         width="<?= esc_attr($portrait['sizes']['medium-width']) ?>"
                                         height="<?= esc_attr($portrait['sizes']['medium-height']) ?>"
                                         itemprop="image"/>
                                </figure>
                            <?php endif; ?>

                            <?php if ($name): ?>
                                <p class="employees__name" itemprop="name"><?= esc_html($name); ?></p>
                            <?php endif; ?>

                            <?php if ($job): ?>
                                <p class="employees__job" itemprop="jobTitle"><?= esc_html($job); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>