<?php

$title = get_sub_field('title'); ?>

<section class="section section-actu">
    <div class="actu__container">
        <h2 class="actu__title"><?= $title ?></h2>

        <div class=actu__grid">
            <?php
            $actu = new WP_Query([
                'post_type' => 'actu',
                'posts_per_page' => 4,
                'orderby' => 'desc'
            ]);

            if ($actu->have_posts()) :
                while ($actu->have_posts()) : $actu->the_post();
                    include get_template_directory() . '/templates/content/latest-news/actu-card.php';
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune actualité trouvée.</p>';
            endif;
            ?>
        </div>
    </div>
</section>