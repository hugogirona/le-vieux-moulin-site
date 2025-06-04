<?php /* Template Name: Page "Bénévole" */ ?>

<?php get_header() ?>

<?php include_once 'templates/content/flexible.php'; ?>

<section class="volunteering-contact">
    <h2 class="volunteering-contact__title">Vous souhaitez devenir bénévole&nbsp;?</h2>
    <article class="volunteering-contact__info">
        <h3 class="volunteering-contact__info--title">Coordonnées</h3>
        <ul class="volunteering-contact__info--list">
            <li><?= get__option('company_email') ?></li>
            <li><?= get__option('company_phone') ?></li>
            <li><?= get__option('company_address') ?></li>
            <li><?= get__option('company_postal') ?></li>
            <li><?= get__option('company_country') ?></li>
        </ul>
    </article>
    <article class="contact__form">
        <h3 class="contact__form--title">Formulaire de contact</h3>
        <?php include 'templates/content/form/form.php'; ?>
    </article>
</section>

<?php get_footer() ?>
