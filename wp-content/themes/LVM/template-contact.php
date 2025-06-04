<?php /* Template Name: Page "Contact" */ ?>

<?php get_header()?>

<section class="contact">
    <h2 class="screenreader__only">Page de contact</h2>

    <article class="contact__form">
        <h3 class="contact__form--title">Formulaire de contact</h3>
        <?php include 'templates/content/form/form.php'; ?>
    </article>
    <div class="contact__wrapper">

        <article class="contact__intro">
            <h3 class="contact__intro--title"><?= get_field('intro_title')?></h3>
            <div class="contact__intro--wrapper">
                <?php foreach (get_field('paragraphs_list') as $paragraph): ?>
                    <p class="contact__intro--content"><?= $paragraph['content'] ?></p>
                <?php endforeach; ?>
            </div>
        </article>


        <article class="contact__info">
            <h3 class="contact__info--title">Nos coordonnées</h3>
            <ul class="contact__info--list">
                <li><?= get__option('company_email') ?></li>
                <li><?= get__option('company_phone') ?></li>
                <li><?= get__option('company_address') ?></li>
                <li><?= get__option('company_postal') ?></li>
                <li><?= get__option('company_country') ?></li>
            </ul>
        </article>
    </div>

</section>

<?php get_footer()?>

