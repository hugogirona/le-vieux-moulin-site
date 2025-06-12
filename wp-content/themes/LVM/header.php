<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100..700&family=Kaushan+Script&family=Roboto:wght@100..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= lvm_asset('css'); ?>">
    <script src="<?= lvm_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>

<?php
$current_url = home_url(add_query_arg([], $_SERVER['REQUEST_URI']));
?>

<body class="the_body">
<header class="header">

    <div class="header__wrapper">
        <?php if (get_the_title()) : ?>
        <h1 class="screenreader__only">
            <?= get_the_title() ?>
        </h1>
        <?php endif; ?>
        <a class="nav__logo" href="<?= home_url() ?>" title="Se diriger vers la page d’accueil">
            <img src="<?= get__option('company_logo')['url'] ?>" alt="" height="auto" width="48">
        </a>
        <nav class="nav">
            <h2 class="screenreader__only">Navigation principale</h2>

            <input type="checkbox" id="burger-toggle" class="nav__checkbox" aria-label="Ouvrir le menu"/>
            <label for="burger-toggle" class="nav__burger">
                <span class="nav__burger--line"></span>
            </label>

            <ul class="nav__container">
                <?php foreach (get__option('primary_nav') as $item) : ?>

                    <?php $has_submenu = !empty($item['submenu']); ?>

                    <?php $active_class = (is_array($item['link']) && $item['link']['url'] === $current_url) ? 'nav__link--current' : ''; ?>

                    <li class="nav__item <?= $has_submenu ? 'nav__item--dropdown' : '' ?>">
                        <?php if (!$has_submenu && !empty($item['link'])): ?>
                            <a href="<?= esc_url(is_array($item['link']) ? $item['link']['url'] : '#') ?>"
                               title="<?= esc_attr(is_array($item['link']) ? $item['link']['title'] : '') ?>"
                               target="<?= esc_attr(is_array($item['link']) && $item['link']['target'] ? $item['link']['target'] : '_self') ?>"
                               class="nav__link <?= $active_class ?>">
                                <?= esc_html($item['label']) ?>
                            </a>

                        <?php else: ?>
                            <input class="nav__toggle"
                                   type="checkbox" id="<?= strtolower($item['label']) ?>">
                            <label class="screenreader__only"
                                   for="<?= strtolower($item['label']) ?>"><?= $item['label'] ?></label>
                            <span class="nav__dropdown" tabindex="0"><?= $item['label'] ?></span>

                            <ul class="nav__submenu">
                                <?php foreach ($item['submenu'] as $sub): ?>
                                    <?php $active_sub_class = (is_array($sub['link']) && $sub['link']['url'] === $current_url) ? 'nav__link--current' : ''; ?>
                                    <li class="nav__submenu__item">
                                        <a href="<?= esc_url($sub['link']['url']) ?>"
                                           title="<?= esc_attr($sub['link']['title']) ?>"
                                           target="<?= esc_attr($sub['link']['target'] ? $sub['link']['target'] : '_self') ?>"
                                           class="nav__link <?= $active_sub_class ?>">
                                            <?= esc_html($sub['label']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

    </div>
</header>

    <main id="content">
