</main>

<footer>
    <nav class="footer-menu">
        <h2 class="screenreader__only">Navigation secondaire</h2>
        <ul class="footer-menu__container">

            <li class="footer-menu__title">Coordonnées
                <ul>
                    <li class="footer-menu__item"><?= get__option('company_email') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_phone') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_address') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_postal') ?></li>
                    <li class="footer-menu__item"><?= get__option('company_country') ?></li>
                </ul>
            </li>

            <li class="footer-menu__title">Réseaux sociaux
                <ul>
                    <?php foreach (get__option('socials') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target']) ?>"
                               title="<?= esc_attr($link['link']['title']) ?>"><?= esc_html($link['label']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer-menu__title">Navigation
                <ul>
                    <?php foreach (get__option('navigation') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target']) ?>"
                               title="<?= esc_attr($link['link']['title']) ?>"><?= esc_html($link['label']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer-menu__qr-code">
                <p class="footer-menu__p">Faire un don rapide</p>
                <img src="<?=get__option('qr_code')['url']?>" alt="<?=get__option('qr_code')['alt']?>">
            </li>

        </ul>
        <div class="footer-menu__partner__container">
            <?php foreach (get__option('partner') as $image) : ?>
                <img src="<?=$image['image']['url']?>" alt="<?=$image['image']['alt']?>" class="footer-menu__partner__img">
            <?php endforeach; ?>
        </div>

        <div class="footer-menu__copyright__container">
            <p class="copyright">
                <?= '© ' . date('Y') . ' ' . get__option('copyrights') ?>
            </p>
        </div>
</footer>
</body>
</html>