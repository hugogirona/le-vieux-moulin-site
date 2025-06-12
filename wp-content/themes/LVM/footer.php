</main>

<footer itemscope
        itemtype="https://schema.org/WPFooter">
    <nav class="footer-menu"  aria-label="Navigation secondaire">
        <h2 class="screenreader__only">Navigation secondaire</h2>
        <ul class="footer-menu__container">

            <li class="footer-menu__title"
                itemscope
                itemtype="https://schema.org/Organization">
                Coordonnées
                <ul>
                    <li class="footer-menu__item">
                        <a aria-label="Envoyez un mail à cette adresse&nbsp;: <?= get__option('company_email') ?> (nouvelle fenêtre)"
                           href="mailto:<?= get__option('company_email') ?>"
                           itemprop="email"
                           class="footer-menu__link"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="Envoyez un mail à cette adresse: <?= get__option('company_email') ?> (nouvelle fenêtre)"><?= get__option('company_email') ?></a>
                    </li>
                    <li class="footer-menu__item">
                        <a aria-label="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?> (nouvelle fenêtre)"
                           href="tel:063321150"
                           itemprop="telephone"
                           class="footer-menu__link"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="Téléphoner à ce numéro de téléphone : <?= get__option('company_phone') ?>. (nouvelle fenêtre)">
                            <?= get__option('company_phone') ?>
                        </a>
                    </li>
                    <li class="footer-menu__item"
                        itemprop="address"
                        itemscope
                        itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress"><?= get__option('company_address') ?></span><br>
                        <span itemprop="postalCode"><?= get__option('company_postal') ?></span><br>
                        <span itemprop="addressCountry"><?= get__option('company_country') ?></span>
                    </li>
                </ul>
            </li>

            <li class="footer-menu__title">Réseaux sociaux
                <ul>
                    <?php foreach (get__option('socials') as $link) : ?>

                        <li class="footer-menu__item">
                            <a class="footer-menu__link"
                               href="<?= esc_url($link['link']['url']) ?>"
                               target="<?= esc_attr($link['link']['target'] ? : '_self') ?>"
                               title="<?= esc_attr($link['link']['title']) ?>"
                               itemprop="sameAs"><?= esc_html($link['label']) ?></a>
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
                               target="<?= esc_attr($link['link']['target'] ? : '_self') ?>"
                               title="<?= esc_attr($link['link']['title']) ?>"><?= esc_html($link['label']) ?></a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="footer-menu__qr-code">
                <p class="footer-menu__p">Faire un don rapide</p>
                <img src="<?= get__option('qr_code')['url'] ?>"
                     alt="<?= get__option('qr_code')['alt'] ?>"
                     width="180" height="180"
                     aria-label="QR code pour faire un don rapide">
            </li>

        </ul>
        <div class="footer-menu__partner__container" itemscope itemtype="https://schema.org/Organization">
            <?php foreach (get__option('partner') as $image) : ?>
                <img src="<?= $image['image']['url'] ?>" alt="<?= $image['image']['alt'] ?>"
                     class="footer-menu__partner__img"
                     itemprop="logo">

            <?php endforeach; ?>
        </div>

        <div class="footer-menu__copyright__container">
            <p class="copyright" itemprop="copyrightHolder">
                <?= '© ' . date('Y') . ' ' . get__option('copyrights') ?>
            </p>
        </div>
    </nav>
</footer>
</body>
</html>