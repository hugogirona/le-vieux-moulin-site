<?php /* Template Name: Page "Ressources" */ ?>

<?php get_header() ?>

<?php
$headline = get_field('title');
$documents_section = get_field('downloads');
$files = $documents_section['documents'];
$project_section = get_field('project');
?>

<section class="section resources">
    <div class="size-wrapper">
    <h2 class="resources__title"><?= $headline ?></h2>

    <?php if ($documents_section): ?>
        <article class="resources__downloads">
            <h3 class="resources__downloads--title"><?= $documents_section['title'] ?></h3>
            <ul>
                <?php foreach ($files as $file): ?>
                    <?php
                    $file_url = $file['document']['url'];
                    $file_id = $file['document']['ID'];
                    $file_path = get_attached_file($file_id); // Chemin absolu sur le serveur
                    $file_size = format_file_size(filesize($file_path));
                    $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                    $file_name = $file['document']['title'];
                    $file_name_display = $file['label']
                    ?>

                    <li class="resources__downloads__item resources__downloads__item--<?= $file_ext ?>">
                        <a class="resources__downloads__file"
                           href="<?= $file_url ?>"
                           download
                           title="<?= 'Télécharger le document' . ' ' .  $file_name?>">
                        </a>
                        <span class="resources__downloads__file--name" ><?= $file_name_display ?></span>
                        <span class="resources__downloads__file--size"><?= $file_size ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </article>
    <?php endif; ?>

    <?php if ($project_section): ?>
        <article class="resources__project">
            <h3 class="resources__project--title"><?= $project_section['title'] ?></h3>
            <div class="resources__project--content">
                <?= $project_section['content'] ?>
            </div>
        </article>
    <?php endif; ?>
    </div>
</section>


<?php get_footer() ?>
