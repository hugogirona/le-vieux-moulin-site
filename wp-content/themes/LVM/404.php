<?php get_header(); ?>

    <section class="not-found">
        <div class="size-wrapper">
        <h1 class="not-found__title">Page non trouvée</h1>
        <p class="not-found__message">Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
        <p class="not-found__message">
            <a href="<?= home_url(); ?>"
               title="Retour à la page d'accueil"
               class="not-found__link cta cta--secondary">Retour à la page d'accueil</a>
        </p>
        </div>
    </section>

<?php get_footer(); ?>