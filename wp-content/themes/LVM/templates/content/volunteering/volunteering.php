<?php

$title = get_sub_field('title');
$paragraph = get_sub_field('paragraph');
$profile_cards = get_sub_field('profil_cards');
?>

<section class="section volunteering">
    <div class="size-wrapper">
    <div class="volunteering__left">
        <h2 class="volunteering__title"><?= $title ?></h2>
        <p class="volunteering__content"><?= $paragraph ?></p>
    </div>

    <?php if ($profile_cards): ?>
        <div class="volunteering__right">

            <?php foreach ($profile_cards as $profile_card) : ?>

                <?php
                $mission_title = $profile_card['mission']['title'];
                $mission_description = $profile_card['mission']['description'];
                $frequence_title = $profile_card['frequence']['description'];
                $frequence_description = $profile_card['frequence']['description'];
                $location_title = $profile_card['location']['description'];
                $location_description = $profile_card['location']['description']


                ?>

                <article class="volunteering__card">

                    <h3 class="volunteering__card--headline"><?= $mission_title ?></h3>
                    <p class="volunteering__card--text"><?= $mission_description ?></p>
                    <p class="volunteering__card--title"><?= $frequence_title ?></p>
                    <p class="volunteering__card--text"><?= $frequence_description ?></p>
                    <p class="volunteering__card--title"><?= $location_title ?></p>
                    <p class="volunteering__card--text"><?= $location_title ?></p>

                </article>

            <?php endforeach; ?>

        </div>
    <?php endif; ?>
    </div>
</section>
