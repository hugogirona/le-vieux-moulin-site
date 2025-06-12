<?php /* Template Name: Page "Ressources" */ ?>

<?php get_header() ?>

<?php
$headline = get_field('title');
$documents_section = get_field('downloads');
$files = $documents_section['documents'];
$project_section = get_field('project');
?>

<section class="section resources" aria-labelledby="resources-title">
    <div class="size-wrapper">
        <h2 class="resources__title" id="resources-title">
            <?= esc_html($headline) ?>
        </h2>

    <?php if ($documents_section): ?>
        <article class="resources__downloads"
                 itemscope
                 itemtype="https://schema.org/CollectionPage"
                 aria-labelledby="documents-title">
            <h3 class="resources__downloads--title" id="documents-title">
                <?= esc_html($documents_section['title']) ?>
            </h3>
            <ul>
                <?php foreach ($files as $file): ?>
                    <?php
                    $file_url = $file['document']['url'];
                    $file_id = $file['document']['ID'];
                    $file_path = get_attached_file($file_id); // Chemin absolu sur le serveur
                    $file_size = format_file_size(filesize($file_path));
                    $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                    $file_name = $file['document']['title'];
                    $mime_type = get_post_mime_type($file_id);
                    $file_name_display = $file['label']
                    ?>

                    <li class="resources__downloads__item resources__downloads__item--<?= $file_ext ?>"
                        itemscope
                        itemtype="https://schema.org/MediaObject">
                        <a class="resources__downloads__file"
                           href="<?= $file_url ?>"
                           download
                           title="Télécharger la ressource"
                           itemprop="contentUrl">

                        </a>
                        <meta itemprop="name" content="<?= esc_attr($file_name) ?>">
                        <meta itemprop="encodingFormat" content="<?= esc_attr($mime_type) ?>">
                        <span class="resources__downloads__file--name" ><?= $file_name_display ?></span>
                        <span class="resources__downloads__file--size"><?= $file_size ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </article>
    <?php endif; ?>

    <?php if ($project_section): ?>
        <article class="resources__project"
                 itemscope
                 itemtype="https://schema.org/EducationalOccupationalProgram"
                 aria-labelledby="project-title">
            <h3 class="resources__project--title" id="project-title" itemprop="name">
                <?= esc_html($project_section['title']) ?>
            </h3>
            <div class="resources__project--content" itemprop="description">
                <?= $project_section['content'] ?>
            </div>
        </article>
    <?php endif; ?>
    </div>
</section>


<?php get_footer() ?>
