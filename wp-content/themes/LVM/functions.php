<?php

// Charger les champs ACF exportés :
use JetBrains\PhpStorm\NoReturn;

//include_once('fields.php');
include_once('forms/ContactForm.php');;

// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}




function get__option($field): mixed
{
    return get_field($field, 'fr');
}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

// Disable default front-end styles.
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

add_action('init', 'init_remove_support', 100);

function init_remove_support(): void
{
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('product', 'editor');
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');



// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function lvm_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/LVM/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/LVM/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/LVM/resources/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/LVM/resources/css/styles.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}

// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
    // Ajout du mime type pour les fichiers SVG
    $mimes['svg'] = 'image/svg+xml';

    // Retourne le tableau des types MIME mis à jour
    return $mimes;
}

// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['actu']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":


register_post_type('actu', [
    'label' => 'Actualités',
    'description' => "Les dernières actualités",
    'menu_position' => 6,
    'menu_icon' => 'dashicons-editor-quote',
    'public' => true,
    'has_archive' => false,
    'rewrite' => [
        'slug' => 'actualites',
    ],
    'supports' => ['title', 'thumbnail', 'excerpt'],
]);


// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header', 'Le menu de navigation principal en haut de la page.');
register_nav_menu('footer', 'Le menu de navigation de fin de page.');

// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

// Ajouter un post-type custom pour sauvegarder les messages de contact

register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title', 'editor'],
]);

// Ajouter la fonctionnalité "POST" pour un formulaire de contact personnalisé :
add_action('admin_post_dw_submit_contact_form', 'lvm_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'lvm_handle_contact_form');

// Chargement de notre class qui va gérer ce formulaire
//require_once(__DIR__ . '/forms/ContactForm.php');

function lvm_handle_contact_form()
{
    $form = (new LVM_Theme\Forms\ContactForm())
        ->rule('fullname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('subject', 'required')
        ->rule('message', 'required')
        ->sanitize('fullname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('subject', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field');

    return $form->handle($_POST);
}

// Créer une fonction qui permet de créer des pages d'options ACF pour le thème :
function create_site_options_page(): void
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options du site',
            'menu_title' => 'Options du site',
            'menu_slug'  => 'site-options',
            'capability' => 'edit_posts',
            'redirect'   => false
        ]);
    }

        acf_add_options_sub_page([
            'page_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper('fr')),
            'menu_title' => sprintf(__('Options du site %s', 'hepl-trad'), strtoupper('fr')),
            'menu_slug' => 'site-options-' . 'fr',
            'post_id' => 'fr',
            'parent' => 'site-options',
        ]);
}


add_action('acf/init', 'create_site_options_page');

function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        $image_id = $image['ID'];
    } else {
        return ''; // fallback en cas d'entrée non reconnue
    }

    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_post = get_post($image_id);
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';



    $src = wp_get_attachment_image_url($image_id, 'large');
    $srcset = wp_get_attachment_image_srcset($image_id, 'large');
    $sizes = wp_get_attachment_image_sizes($image_id, 'large');
    $mime = get_post_mime_type($image_id);

    $lazy = $settings['lazy'] ?? 'eager';
    $classes = !empty($settings['classes'])
        ? (is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'])
        : '';


    if ($mime === 'image/svg+xml') {
        ob_start(); ?>
        <img
                src="<?= esc_url($src) ?>"
                alt="<?= esc_attr($alt) ?>"
                loading="<?= esc_attr($lazy) ?>"
                class="<?= esc_attr($classes) ?>"
        >
        <?php return ob_get_clean();
    }

    // 🔍 Vérifie si une version WebP existe
    $webp_src = preg_replace('/\.(jpe?g|png)$/', '.webp', $src);
    $webp_path = str_replace(home_url('/'), ABSPATH, $webp_src);
    $has_webp = file_exists($webp_path);

    ob_start(); ?>
    <picture>
        <?php if ($has_webp): ?>
            <source srcset="<?= esc_url($webp_src) ?>" type="image/webp">
        <?php endif; ?>
        <img
                src="<?= esc_url($src) ?>"
                alt="<?= esc_attr($alt) ?>"
                loading="<?= esc_attr($lazy) ?>"
                srcset="<?= esc_attr($srcset) ?>"
                sizes="<?= esc_attr($sizes) ?>"
                class="<?= esc_attr($classes) ?>"
        >
    </picture>
    <?php return ob_get_clean();
}

add_filter('show_admin_bar', '__return_false');

add_action('after_setup_theme', function () {
    add_image_size('banner', 1700, 400, true);
});


function format_file_size($bytes) {
    $size_in_mb = $bytes / 1024 / 1024;
    return round($size_in_mb, 2) . ' Mo';
}

