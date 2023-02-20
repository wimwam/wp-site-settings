<?php

require_once __DIR__ . '/../../../../wp-load.php';
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (!is_user_logged_in()) {
    echo json_encode(['status' => 'error', 'msg' => 'nothing to see here']);
    exit;
}

switch ($action) {
    case 'updateOptions':

        $kvknummer = filter_input(INPUT_POST, 'kvknummer', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_kvknummer', $kvknummer);


        $telefoonnummer = filter_input(INPUT_POST, 'telefoonnummer', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_telefoonnummer', $telefoonnummer);


        // optioneel secundair telefoonnummer
        $telefoonnummer2 = filter_input(INPUT_POST, 'telefoonnummer2', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_telefoonnummer2', $telefoonnummer2);

        $emailadres = filter_input(INPUT_POST, 'emailadres', FILTER_VALIDATE_EMAIL);
        update_option('valkemedia_settings_emailadres', $emailadres);


        $straatnaam = filter_input(INPUT_POST, 'straatnaam', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_straatnaam', $straatnaam);

        $plaats = filter_input(INPUT_POST, 'woonplaats', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_woonplaats', $plaats);

        // optionele naam van het postadres
        $postadres = filter_input(INPUT_POST, 'postadres', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_postadres', $postadres);


        $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_postcode', $postcode);


        $postadresnummer = filter_input(INPUT_POST, 'postadresnummer', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_postadresnummer', $postadresnummer);

        $postadresplaats = filter_input(INPUT_POST, 'postadresplaats', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_postadresplaats', $postadresplaats);

        $postadrespostcode = filter_input(INPUT_POST, 'postadrespostcode', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_postadrespostcode', $postadrespostcode);

        $gmapsurl = filter_input(INPUT_POST, 'gmapsurl', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_gmapsurl', $gmapsurl);

        $facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_facebook', $facebook);

        $linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_linkedin', $linkedin);

        $instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_instagram', $instagram);

        $maandag = filter_input(INPUT_POST, 'maandag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_maandag', $maandag);

        $dinsdag = filter_input(INPUT_POST, 'dinsdag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_dinsdag', $dinsdag);

        $woensdag = filter_input(INPUT_POST, 'woensdag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_woensdag', $woensdag);

        $donderdag = filter_input(INPUT_POST, 'donderdag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_donderdag', $donderdag);

        $vrijdag = filter_input(INPUT_POST, 'vrijdag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_vrijdag', $vrijdag);

        $zaterdag = filter_input(INPUT_POST, 'zaterdag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_zaterdag', $zaterdag);

        $zondag = filter_input(INPUT_POST, 'zondag', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_zondag', $zondag);

        $excerptlengthshort = filter_input(INPUT_POST, 'excerptlengthshort', FILTER_VALIDATE_INT);
        update_option('valkemedia_settings_excerptlengthshort', (int)$excerptlengthshort);

        $excerptlengthlong = filter_input(INPUT_POST, 'excerptlengthlong', FILTER_VALIDATE_INT);
        update_option('valkemedia_settings_excerptlengthlong', (int)$excerptlengthlong);

        $headline1 = filter_input(INPUT_POST, 'headline1', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_headline1', $headline1);

        $headline2 = filter_input(INPUT_POST, 'headline2', FILTER_SANITIZE_STRING);
        update_option('valkemedia_settings_headline2', esc_attr($headline2));

        echo json_encode([
           'status' => 'success',
           'msg' => 'Velden geüpdate'
        ]);

        break;
    default:
        echo json_encode(['status' => 'error', 'msg' => 'what are you doing here']);
        exit;
}