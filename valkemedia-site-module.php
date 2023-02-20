<?php
/*
Plugin Name: Valkemedia site module
Plugin URI: https://valkemedia.nl/
Description: Beheer je contactgegevens, openingstijden & locatie d.m.v. Json LD, disable comments, trackback & spam, remove wp_generator
Version: 2.0
Author: Wiebe-Jan Valkema
Author URI: https://valkemedia.nl/
Gemaakt door: WJ Valkema
License: GPLv2 or later
Text Domain: valkemedia
*/

use Duracom\JsonLd\JsonLd;
use Duracom\JsonLd\Schemas\Address;
use Duracom\JsonLd\Schemas\BlogPosting;
use Duracom\JsonLd\Schemas\ImageObject;
use Duracom\JsonLd\Schemas\MainEntity;
use Duracom\JsonLd\Schemas\Organization;
use Duracom\JsonLd\Schemas\WebPage;
use Duracom\JsonLd\Schemas\WebSite;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

require_once plugin_dir_path(__FILE__) . 'src/config/config.php';
require_once plugin_dir_path(__FILE__) . 'src/vendor/autoload.php';

/**
 * Class siteModule
 */
class siteModule
{
    /**
     * siteModule constructor.
     */
    public function __construct()
    {
        remove_action('wp_head', 'wp_generator');
        /**
         * Valkemedia menu item
         */
        add_action('admin_menu', 'valkemedia_add_menu_page');

        /**
         * comments blok uit menu halen
         */
        add_action('admin_init', function () {
            // Redirect any user trying to access comments page
            global $pagenow;

            if ($pagenow === 'edit-comments.php') {
                wp_redirect(admin_url());
                exit;
            }

            // Remove comments metabox from dashboard
            remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

            // Disable support for comments and trackbacks in post types
            foreach (get_post_types() as $post_type) {
                if (post_type_supports($post_type, 'comments')) {
                    remove_post_type_support($post_type, 'comments');
                    remove_post_type_support($post_type, 'trackbacks');
                }
            }
        });

        // Close comments on the front-end
        add_filter('comments_open', '__return_false', 20, 2);
        add_filter('pings_open', '__return_false', 20, 2);

        // Hide existing comments
        add_filter('comments_array', '__return_empty_array', 10, 2);

        // Remove comments page in menu
        add_action('admin_menu', function () {
            remove_menu_page('edit-comments.php');
        });

        // Remove comments links from admin bar
        add_action('init', function () {
            if (is_admin_bar_showing()) {
                remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
            }
        });
    }
}

add_action( 'admin_enqueue_scripts', 'valkemedia_load_admin_styles' );
function valkemedia_load_admin_styles() {
    wp_enqueue_style( 'admin_css_valkemedia', plugins_url('valkemedia-site-module') . '/assets/css/style.css', false, '1.0.0' );
}

/**
 * valkemedia settings page
 * Settings worden o.a. gebruikt om templates op te bouwen, als in ook in de JsonLD module die we in de templates
 * gebruiken. Alle modules worden dan vanuit de /vendor/ map in het custom thema geladen.
 */
function valkemedia_settings_menu_page()
{
    ?>
    <div class="valkemedia-container">
        <div class="col-12 px-20">
            <h1>Website instellingen</h1>
        </div>
        <div class="col-12 px-20">
            <div class="col-12">
                <label>
                    <i>Beheer je contactgegevens, openingstijden & locatie d.m.v. Json LD, disable comments, trackback & spam, remove wp_generator.</i><br/>
                    <i>Hoewel niet elk thema gebruik maakt van deze settings (maatwerk), zullen de disable comments, trackbacks & spam + remove wp_generator wel bij elk thema werken.</i>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="col-12">
                <h3>Contactgegevens</h3>
            </div>
            <div class="col-12">
                <label for="kvknummer">KVK nummer:</label>
            </div>
            <div class="col-12">
                <input type="text" name="kvknummer" id="kvknummer" value="<?= get_option('valkemedia_settings_kvknummer') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="telefoonnummer">Telefoonnummer:</label>
            </div>
            <div class="col-12">
                <input type="text" name="telefoonnummer" id="telefoonnummer" value="<?= get_option('valkemedia_settings_telefoonnummer') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="telefoonnummer2">Telefoonnummer 2:</label>
            </div>
            <div class="col-12">
                <input type="text" name="telefoonnummer2" id="telefoonnummer2" value="<?= get_option('valkemedia_settings_telefoonnummer2') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="emailadres">E-mail adres:</label>
            </div>
            <div class="col-12">
                <input type="email" name="emailadres" id="emailadres" value="<?= get_option('valkemedia_settings_emailadres') ?>" />
            </div>
        </div>
        <div class="col-12">
            <div class="col-12 border-top mt-20">
                <h3>Adresgegevens</h3>
            </div>
            <div class="col-12">
                <label for="plaats">Straatnaam:</label>
            </div>
            <div class="col-12">
                <input type="text" name="straatnaam" id="straatnaam" value="<?= get_option('valkemedia_settings_straatnaam') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="postcode">Postcode:</label>
            </div>
            <div class="col-12">
                <input type="text" name="postcode" id="postcode" value="<?= get_option('valkemedia_settings_postcode') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="woonplaats">Woonplaats:</label>
            </div>
            <div class="col-12">
                <input type="text" name="woonplaats" id="woonplaats" value="<?= get_option('valkemedia_settings_woonplaats') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="postadres">Postadres:</label>
            </div>
            <div class="col-12">
                <input type="text" name="postadres" id="postadres" value="<?= get_option('valkemedia_settings_postadres') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="postadresnummer">Postadres huisnummer/postbusnummer:</label>
            </div>
            <div class="col-12">
                <input type="text" name="postadresnummer" id="postadresnummer" value="<?= get_option('valkemedia_settings_postadresnummer') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="postadresplaats">Postadres plaats:</label>
            </div>
            <div class="col-12">
                <input type="text" name="postadresplaats" id="postadresplaats" value="<?= get_option('valkemedia_settings_postadresplaats') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="postadrespostcode">Postadres postcode:</label>
            </div>
            <div class="col-12">
                <input type="text" name="postadrespostcode" id="postadrespostcode" value="<?= get_option('valkemedia_settings_postadrespostcode') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="gmapsurl">Google maps url:</label>
            </div>
            <div class="col-12">
                <input type="text" name="gmapsurl" id="gmapsurl" value="<?= get_option('valkemedia_settings_gmapsurl') ?>" />
            </div>
        </div>
        <div class="col-12 mt-20">
            <div class="col-12 border-top mt-20">
                <h3>Social media</h3>
            </div>
            <div class="col-12">
                <label for="facebook">Facebook url:</label>
            </div>
            <div class="col-12">
                <input type="text" name="facebook" id="facebook" value="<?= get_option('valkemedia_settings_facebook') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="facebook">LinkedIn url:</label>
            </div>
            <div class="col-12">
                <input type="text" name="linkedin" id="linkedin" value="<?= get_option('valkemedia_settings_linkedin') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="facebook">Instragram url:</label>
            </div>
            <div class="col-12">
                <input type="text" name="instagram" id="instagram" value="<?= get_option('valkemedia_settings_instagram') ?>" />
            </div>
        </div>
        <div class="col-12 mt-20">
            <div class="col-12 border-top mt-20">
                <h3>Openingstijden</h3>
            </div>
            <div class="col-12">
                <label for="maandag">Maandag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="maandag" id="maandag" value="<?= get_option('valkemedia_settings_maandag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="dinsdag">Dinsdag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="dinsdag" id="dinsdag" value="<?= get_option('valkemedia_settings_dinsdag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="woensdag">Woensdag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="woensdag" id="woensdag" value="<?= get_option('valkemedia_settings_woensdag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="donderdag">Donderdag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="donderdag" id="donderdag" value="<?= get_option('valkemedia_settings_donderdag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="vrijdag">Vrijdag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="vrijdag" id="vrijdag" value="<?= get_option('valkemedia_settings_vrijdag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="zaterdag">Zaterdag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="zaterdag" id="zaterdag" value="<?= get_option('valkemedia_settings_zaterdag') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="zondag">Zondag:</label>
            </div>
            <div class="col-12">
                <input type="text" name="zondag" id="zondag" value="<?= get_option('valkemedia_settings_zondag') ?>" />
            </div>
        </div>
        <div class="col-12 mt-20">
            <div class="col-12 border-top mt-20">
                <h3>Headlines</h3>
            </div>
            <div class="col-12">
                <label for="headline1">Headline 1:</label>
            </div>
            <div class="col-12">
                <textarea name="headline1" id="headline1"><?= get_option('valkemedia_settings_headline1') ?></textarea>
            </div>
            <div class="col-12 mt-20">
                <label for="headline2">Headline 2:</label>
            </div>
            <div class="col-12">
                <textarea name="headline2" id="headline2"><?= get_option('valkemedia_settings_headline2') ?></textarea>
            </div>
        </div>
        <div class="col-12 mt-20">
            <div class="col-12 border-top mt-20">
                <h3>Berichten</h3>
            </div>
            <div class="col-12">
                <label for="excerptlengthshort">Excerpt length (short):</label>
            </div>
            <div class="col-12">
                <input type="number" name="excerptlengthshort" id="excerptlengthshort" value="<?= get_option('valkemedia_settings_excerptlengthshort') ?>" />
            </div>
            <div class="col-12 mt-20">
                <label for="excerptlengthlong">Excerpt length (long):</label>
            </div>
            <div class="col-12">
                <input type="number" name="excerptlengthlong" id="excerptlengthlong" value="<?= get_option('valkemedia_settings_excerptlengthlong') ?>" />
            </div>
        </div>
        <div class="col-12 mt-20">
                <span class="button button-large" onclick="updateOptions()" title="Opslaan">
                    Opslaan
                </span>
        </div>
        <div class="col-12 mt-20">
            <i>Module door <a href="https://www.valkemedia.nl" target="_blank" title="Valkemedia">Valkemedia</a></i>
        </div>
    </div>
    <script type="text/javascript">
        var $ = jQuery;

        function updateOptions()
        {
            var options = $('.valkemedia-container');
            $.post(
                '<?=plugin_dir_url(__FILE__) . 'settings/action.php'?>',
                {
                    action: 'updateOptions',
                    kvknummer: options.find('input[name=kvknummer]').val(),
                    telefoonnummer: options.find('input[name=telefoonnummer]').val(),
                    telefoonnummer2: options.find('input[name=telefoonnummer2]').val(),
                    emailadres: options.find('input[name=emailadres]').val(),
                    straatnaam: options.find('input[name=straatnaam]').val(),
                    postcode: options.find('input[name=postcode]').val(),
                    woonplaats: options.find('input[name=woonplaats]').val(),
                    postadres: options.find('input[name=postadres]').val(),
                    postadresnummer: options.find('input[name=postadresnummer]').val(),
                    postadresplaats: options.find('input[name=postadresplaats]').val(),
                    postadrespostcode: options.find('input[name=postadrespostcode]').val(),
                    gmapsurl: options.find('input[name=gmapsurl]').val(),
                    facebook: options.find('input[name=facebook]').val(),
                    linkedin: options.find('input[name=linkedin]').val(),
                    instagram: options.find('input[name=instagram]').val(),
                    maandag: options.find('input[name=maandag]').val(),
                    dinsdag: options.find('input[name=dinsdag]').val(),
                    woensdag: options.find('input[name=woensdag]').val(),
                    donderdag: options.find('input[name=donderdag]').val(),
                    vrijdag: options.find('input[name=vrijdag]').val(),
                    zaterdag: options.find('input[name=zaterdag]').val(),
                    zondag: options.find('input[name=zondag]').val(),
                    excerptlengthshort: options.find('input[name=excerptlengthshort]').val(),
                    excerptlengthlong: options.find('input[name=excerptlengthlong]').val(),
                    headline1: options.find('textarea[name=headline1]').val(),
                    headline2: options.find('textarea[name=headline2]').val(),
                }, function (data) {
                    //console.log(data);
                }).done(function (response) {
                response = $.parseJSON(response);
                if (response.status !== 'success') {
                    alert('Er ging iets mis');
                } else {
                    alert(response.msg);
                    window.location.reload();
                }

            }).fail(function () {
                alert('failed');
            });
        }
    </script>
    <?php
}

function valkemedia_add_menu_page()
{
    add_menu_page(
        __('Site settings', 'valkemedia'),
        __('Site settings', 'valkemedia'),
        'manage_options',
        'valkemedia-site-module',
        'valkemedia_settings_menu_page',
        plugins_url('valkemedia-site-module') . '/assets/img/v.png',
        3
    );
}

/**
 * valkemedia theme support inladen
 */
add_action('after_setup_theme', 'valkemedia_theme_support');
if (!function_exists('valkemedia_theme_support')) {
    function valkemedia_theme_support()
    {
        if (class_exists('WooCommerce')) {
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        }
        add_theme_support('title-tag');
        //add_theme_support('post-thumbnails');
        // Header
        register_sidebar([
            'name' => esc_attr__('Header', 'valkemedia'),
            'id' => 'sidebar-header',
            'description' => esc_attr__('Add widgets here to appear in your header.', 'valkemedia'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
        // Footer
        register_sidebar([
            'name' => esc_attr__('Footer', 'valkemedia'),
            'id' => 'sidebar-footer1',
            'description' => esc_attr__('Add widgets here to appear in your footer.', 'valkemedia'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
    }
}

/**
 * @param $length
 *
 * @return int
 */
function my_excerpt_length($length)
{
    if (get_option('valkemedia_settings_excerptlengthshort')) {
        return get_option('valkemedia_settings_excerptlengthshort');
    }
    return $length;
}

add_filter('excerpt_length', 'my_excerpt_length');
/**
 * @return bool
 */
function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * @param array $settings
 * @param string $type
 *
 * @return JsonLd|string
 */
function valkemedia_json_ld(array $settings, $type = 'home')
{
    global $post;
    $schemas = [];
    try {
        $schemas[] = (new WebPage())
            ->setId(get_bloginfo('url'))
            ->setUrl(get_bloginfo('url'))
            ->setInLanguage('nl')
            ->setName(get_bloginfo('name'))
            ->setDescription(get_bloginfo('description'))
            ->setIsPartOf(
                (new WebSite())
                    ->setName(get_bloginfo('name'))
                    ->setAlternateName(get_bloginfo('name'))
                    ->setUrl(get_bloginfo('url'))
                    ->setPotentialAction(
                        [
                            '@type' => 'searchAction',
                            'target' => get_bloginfo('url') . '?s={search_term_string}',
                            'query-input' => 'required name=search_term_string'
                        ]
                    )
            )
            ->setAbout(
                (new Organization())
                    ->setName(get_bloginfo('name'))
                    ->setUrl(get_bloginfo('url'))
                    ->setAddress(
                        (new Address())
                            ->setType('PostalAddress')
                            ->setAddressRegion($settings['woonplaats'])
                            ->setStreetAddress($settings['straatnaam'])
                            ->setAddressLocality($settings['woonplaats'])
                            ->setPostalCode($settings['postcode'])
                    )
                    ->setTelephone($settings['telefoonnummer'])
                    ->setImage(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                    ->setPriceRange('€€€')
                    ->setLogo(
                        (new ImageObject())
                            ->setUrl(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                    )
                    ->setSameAs([$settings['facebook']])
            );
    } catch (Throwable $exception) {
        if (is_user_logged_in()) {
            return 'Admin foutmelding: ' . $exception->getMessage();
        } else {
            return null;
        }
    }
    if (is_blog() && is_single()) {
        if (class_exists('ACF')) {
            try {
                $schemas[] = (new BlogPosting())
                    ->setHeadline(get_the_title())
                    ->setImage(wp_get_attachment_image_url(get_field('afbeelding'), 'full'))
                    ->setGenre('Article')
                    ->setKeywords(
                        implode(
                            ',',
                            explode(
                                ' ',
                                wp_strip_all_tags(
                                    str_replace(
                                        '.',
                                        '',
                                        str_replace(
                                            ',',
                                            '',
                                            trim(preg_replace('/\s+/', ' ', get_the_content()))
                                        )
                                    )
                                )
                            )
                        )
                    )
                    ->setUrl(get_the_permalink())
                    ->setDateCreated(date_create(get_the_date('Y-m-d')))
                    ->setDatePublished(date_create(get_the_date('Y-m-d')))
                    ->setDateModified(date_create(get_the_date('Y-m-d')))
                    ->setAuthor(
                        (new Organization())
                            ->setName(get_bloginfo('name'))
                            ->setUrl(get_bloginfo('url'))
                            ->setAddress(
                                (new Address())
                                    ->setType('PostalAddress')
                                    ->setAddressRegion($settings['woonplaats'])
                                    ->setStreetAddress($settings['straatnaam'])
                                    ->setAddressLocality($settings['woonplaats'])
                                    ->setPostalCode($settings['postcode'])
                            )
                            ->setTelephone($settings['telefoonnummer'])
                            ->setImage(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                            ->setLogo(
                                (new ImageObject())
                                    ->setUrl(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                            )
                            ->setSameAs([$settings['facebook']])
                    )
                    ->setPublisher(
                        (new Organization())
                            ->setName(get_bloginfo('name'))
                            ->setUrl(get_bloginfo('url'))
                            ->setAddress(
                                (new Address())
                                    ->setType('PostalAddress')
                                    ->setAddressRegion($settings['woonplaats'])
                                    ->setStreetAddress($settings['straatnaam'])
                                    ->setAddressLocality($settings['woonplaats'])
                                    ->setPostalCode($settings['postcode'])
                            )
                            ->setTelephone($settings['telefoonnummer'])
                            ->setImage(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                            ->setLogo(
                                (new ImageObject())
                                    ->setUrl(get_bloginfo('url') . THEME_URL . "/img/logo.png")
                            )
                            ->setSameAs([$settings['facebook']])
                    )
                    ->setMainEntityOfPage(
                        (new MainEntity())
                            ->setType('WebPage')
                            ->setId(get_bloginfo('url') . '/blog')
                    );
            } catch (Throwable $exception) {
                if (is_user_logged_in()) {
                    return 'Admin foutmelding: ' . $exception->getMessage();
                } else {
                    return null;
                }
            }
        }
    }

    $jsonLD = new JsonLd();
    foreach ($schemas as $schema) {
        try {
            $jsonLD->addSchema($schema);
        } catch (Throwable $exception) {
            if (is_user_logged_in()) {
                return 'Admin foutmelding: ' . $exception->getMessage();
            } else {
                return null;
            }
        }
    }

    return $jsonLD;
}

add_shortcode('contactgegevens', 'valkemedia_contactgegevens_block');
function valkemedia_contactgegevens_block()
{
    $html = '<div class="py-20 row w-100"> 
                <div class="col-12 col-md-6 my-20">
                    <strong>'.get_bloginfo('name').'</strong><br/><br/>
                    <i class="fas fa-map-marker-alt mr-10"></i> <strong>'.get_option('valkemedia_settings_woonplaats').'</strong><br/>
                    '.get_option('valkemedia_settings_straatnaam').'<br/>
                    '.get_option('valkemedia_settings_postcode').' '.get_option('valkemedia_settings_woonplaats').'<br/>
                    <a href="tel:'.get_option('valkemedia_settings_telefoonnummer').'">'.get_option('valkemedia_settings_telefoonnummer').'</a><br/>
                    <a href="mailto:'.get_option('valkemedia_settings_emailadres').'">'.get_option('valkemedia_settings_emailadres').'</a>
                    <br/><br/>
                    
                    <i class="fas fa-map-marker-alt mr-10"></i> <strong>'.get_option('valkemedia_settings_postadresplaats').'</strong><br/>
                    '.get_option('valkemedia_settings_postadres').' '.get_option('valkemedia_settings_postadresnummer').'<br/>
                    '.get_option('valkemedia_settings_postadrespostcode').' '.get_option('valkemedia_settings_postadresplaats').'
                    <br/><br/>
                    
                    <strong>KVK</strong><br/>
                    '.get_option('valkemedia_settings_kvknummer').'<br/>
                </div> 
                <div class="col-12 col-md-6 my-20">
                    <h3>Openingstijden</h3><br/>
                    <table class="table w-100">
                        <tr>
                            <td>Maandag</td><td>'.get_option('valkemedia_settings_maandag').'</td>
                        </tr>
                        <tr>
                            <td>Dinsdag</td><td>'.get_option('valkemedia_settings_dinsdag').'</td>
                        </tr>
                        <tr>
                            <td>Woensdag</td><td>'.get_option('valkemedia_settings_woensdag').'</td>
                        </tr>
                        <tr>
                            <td>Donderdag</td><td>'.get_option('valkemedia_settings_donderdag').'</td>
                        </tr>
                        <tr>
                            <td>Vrijdag</td><td>'.get_option('valkemedia_settings_vrijdag').'</td>
                        </tr>
                        <tr>
                            <td>Zaterdag</td><td>'.get_option('valkemedia_settings_zaterdag').'</td>
                        </tr>
                        <tr>
                            <td>Zondag</td><td>'.get_option('valkemedia_settings_zondag').'</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 my-20"> 
                    <h3>Kaart & route</h3><br/>
                    <iframe src="'.get_option('valkemedia_settings_gmapsurl').'" width="100%" height="350" style="border:0;width:calc(100% - 15px)" allowfullscreen="" loading="lazy"></iframe>
                </div>
    
            </div>';
    return $html;
}

$valkemedia = new siteModule();