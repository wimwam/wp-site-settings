<?php

namespace Duracom\JsonLd\PageTypes;

use Duracom\JsonLd\DataFormats\WebsiteSeoConfig;
use Duracom\JsonLd\Schemas\Address;
use Duracom\JsonLd\Schemas\Brand;
use Duracom\JsonLd\Schemas\Organization;
use Duracom\JsonLd\Schemas\Schema;
use Duracom\JsonLd\Schemas\WebPage;
use Duracom\JsonLd\Schemas\WebSite;
use Duracom\JsonLd\Interfaces\PageTypeInterface;
use Duracom\JsonLd\JsonLd;

/**
 * Class ExampleBrandPage
 * @package Duracom\JsonLd\PageTypes
 */
class ExampleBrandPage implements PageTypeInterface
{
	/**
	 * @var WebsiteSeoConfig
	 */
	private $siteSettings;

	/**
	 * @var string
	 */
	private $pageTitle;

	/**
	 * @var string
	 */
	private $pageUrl;

	/**
	 * @var string
	 */
	private $pageId;

	/**
	 * @var string
	 */
	private $pageDescription;

	/**
	 * @var string
	 */
	private $brandLogo;

	/**
	 * ExampleBrandPage constructor.
	 * @param WebsiteSeoConfig $siteSettings
	 * @param string $pageTitle
	 * @param string $pageUrl
	 * @param string $pageId
	 * @param string $pageDescription
	 * @param string $brandLogo
	 */
	public function __construct(
		WebsiteSeoConfig $siteSettings,
		string $pageTitle,
		string $pageUrl,
		string $pageId,
		string $pageDescription,
		string $brandLogo
	) {
		$this->siteSettings = $siteSettings;
		$this->pageTitle = $pageTitle;
		$this->pageUrl = $pageUrl;
		$this->pageId = $pageId;
		$this->pageDescription = $pageDescription;
		$this->brandLogo = $brandLogo;
	}

	/**
	 * @return JsonLd
	 */
	public function toJsonLdObject(): JsonLd
	{
		// basisobject WebPage/WebSite
		$webPage = (new WebPage())
			->setType('WebPage')
			->setInLanguage($this->siteSettings->getLanguage())
			->setName($this->pageTitle)
			->setId($this->siteSettings->getBaseUrl() . $this->pageUrl)
			->setUrl($this->siteSettings->getBaseUrl() . $this->pageUrl)
			->setIsPartOf(
				(new WebSite())
					->setType('WebSite')
					->setName('ExampleShop.' . $this->siteSettings->getLanguage())
					->setAlternateName('ExampleShop')
					->setUrl($this->siteSettings->getBaseUrl())
					->setPotentialAction([
						'@type' => 'SearchAction',
						'target' => $this->siteSettings->getBaseUrl() . '/zoekresultaten?zoek={search_term_string}',
						'query-input' => 'required name=search_term_string'
					])
			)
			->setDescription($this->pageDescription)
			->setAbout(
				(new Organization())
					->setType('AutoPartsStore')
					->setName($this->siteSettings->getCompanyName())
					->setLogo($this->siteSettings->getSiteLogo())
					->setUrl($this->siteSettings->getBaseUrl())
					->setImage($this->siteSettings->getSiteImage())
					->setPriceRange('€€')
					->setTelephone($this->siteSettings->getPhoneNumber())
					->setAddress(
						(new Address())
							->setType('PostalAddress')
							->setAddressLocality($this->siteSettings->getLocality())
							->setStreetAddress($this->siteSettings->getAddress())
							->setPostalCode($this->siteSettings->getPostalCode())
							->setAddressRegion($this->siteSettings->getCity())
					)
			);

		// voor het geval het de Home page betreft, geen pageUrl er achter zetten
		if ($this->pageUrl === $this->siteSettings->getBaseUrl()) {
			$webPage
				->setId($this->siteSettings->getBaseUrl())
				->setUrl($this->siteSettings->getBaseUrl());
		}

		$webPage->setSubSchemas(
			(new Schema())->setSubSchema(
				'mainEntity',
				(new Brand())
					->setName($this->pageTitle)
					->setLogo($this->brandLogo)
			)
		);

		return (new JsonLd())->addSchema($webPage);
	}

	/**
	 * @return string
	 */
	public function output(): string
	{
		return $this->toJsonLdObject();
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return (string)$this->output();
	}
}
