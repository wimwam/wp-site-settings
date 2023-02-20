<?php

use Duracom\JsonLd\DataFormats\Rating;
use Duracom\JsonLd\DataFormats\WebsiteSeoConfig;
use Duracom\JsonLd\PageTypes\ExampleDefaultPage;

const BASE_URL = 'https://example.com';

$reviewData = (new Rating())
	->setRatingAverage(4.8)
	->setRatingTotal(1337);

$siteSettings = (new WebsiteSeoConfig())
	->setLanguage('nl')
	->setBaseUrl(BASE_URL)
	->setCompanyName('example BV')
	->setSiteLogo(BASE_URL . '/interface/images/logo.gif')
	->setSiteImage(BASE_URL . '/upload/website/klein.jpg')
	->setPhoneNumber('123456789')
	->setAddress('Example street')
	->setPostalCode('9999 PD')
	->setCity('Example city')
	->setLocality('Example province')
	->setChamberOfCommerceNumber('55555555')
	->setVatNumber('NL1337.1337.B01')
	->setSameAs([
		'kiyoh.nl' => 'https://www.kiyoh.nl/example_nl/',
		'kieskeurig.nl' => 'https://www.kieskeurig.nl/winkels/example.nl/reviews',
		'trustpilot.com' => 'https://nl.trustpilot.com/review/www.example.nl',
		'twitter.com' => 'https://twitter.com/example_nl',
		'facebook.com' => 'https://www.facebook.com/example.nl/',
		'linkedin.com' => 'https://nl.linkedin.com/company/example-b-v-automotive-parts-online',
		'thuiswinkel.org' => 'https://www.thuiswinkel.org/leden/example.nl/'
	]);

try {
	echo (new ExampleDefaultPage(
		$siteSettings,
		'Title example',
		BASE_URL,
		BASE_URL,
		'Page description example',
		$reviewData
	))->output();
} catch (Exception $exception) {
	error_log($exception->getMessage());
}
