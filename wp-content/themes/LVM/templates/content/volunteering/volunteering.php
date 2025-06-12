<?php
$title = get_sub_field('title');
$paragraph = get_sub_field('paragraph');
$profile_cards = get_sub_field('profil_cards');
?>

<section class="section volunteering"
         aria-labelledby="volunteer-title-<?= get_row_index() ?>">
    <div class="size-wrapper">

        <div class="volunteering__left">
            <h2 class="volunteering__title" id="volunteer-title-<?= get_row_index() ?>">
                <?= esc_html($title) ?>
            </h2>
            <p class="volunteering__content"><?= esc_html($paragraph) ?></p>
        </div>

        <?php if ($profile_cards): ?>
            <div class="volunteering__right">

                <?php foreach ($profile_cards as $profile_card) :
                    $mission_title = $profile_card['mission']['title'];
                    $mission_description = $profile_card['mission']['description'];
                    $frequence_title = $profile_card['frequence']['title'];
                    $frequence_description = $profile_card['frequence']['description'];
                    $location_title = $profile_card['location']['title'];
                    $location_description = $profile_card['location']['description'];
                    ?>

                    <article class="volunteering__card"
                             itemscope
                             itemtype="https://schema.org/VolunteerOpportunity">

                        <h3 class="volunteering__card--headline" itemprop="name">
                            <?= esc_html($mission_title) ?>
                        </h3>

                        <p class="volunteering__card--text" itemprop="description">
                            <?= esc_html($mission_description) ?>
                        </p>

                        <p class="volunteering__card--title"><?= esc_html($frequence_title) ?></p>
                        <p class="volunteering__card--text" itemprop="scheduleFrequency">
                            <?= esc_html($frequence_description) ?>
                        </p>

                        <p class="volunteering__card--title"><?= esc_html($location_title) ?></p>
                        <p class="volunteering__card--text" itemprop="location">
                            <?= esc_html($location_description) ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>
</section>