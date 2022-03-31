<?php

namespace Duracom\JsonLd\PageTypes;

use Duracom\JsonLd\DataFormats\WebsiteSeoConfig;
use Duracom\JsonLd\DataFormats\Job;
use Duracom\JsonLd\Interfaces\PageTypeInterface;
use Duracom\JsonLd\JsonLd;
use Duracom\JsonLd\Schemas\Address;
use Duracom\JsonLd\Schemas\JobPosting;
use Duracom\JsonLd\Schemas\Organization;
use Exception;

/**
 * Class ExampleJobPage
 * @package Duracom\JsonLd\PageTypes
 */
class ExampleJobPage implements PageTypeInterface
{
	/**
	 * @var WebsiteSeoConfig
	 */
	protected $siteSettings;

	/**
	 * @var Job
	 */
	protected $job;

	/**
	 * ExampleJobPage constructor.
	 * @param WebsiteSeoConfig $siteSettings
	 * @param array $job
	 */
	public function __construct(WebsiteSeoConfig $siteSettings, array $job)
	{
		$this->siteSettings = $siteSettings;
		$this->job = $job;
	}

	/**
	 * @return JsonLd
	 * @throws Exception
	 */
	public function toJsonLdObject(): JsonLd
	{
		$jobPosting = (new JobPosting())
			->setTitle($this->job->getTitle())
			->setName($this->job->getHeadline())
			->setDatePosted($this->job->getDatePosted())
			->setValidThrough($this->job->getDateEnding())
			->setJobLocation(
				(new Address())
					->setType('')
					->setStreetAddress($this->siteSettings->getAddress())
					->setAddressLocality($this->siteSettings->getLocality())
					->setAddressRegion($this->siteSettings->getLocality())
					->setPostalCode($this->siteSettings->getPostalCode())

			)
			->setHiringOrganization(
				(new Organization())
					->setType('AutoPartsStore')
					->setName('ExampleShop')
					->setUrl($this->siteSettings->getBaseUrl())
					->setLogo($this->siteSettings->getSiteLogo())
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

		if (!$this->job->getDescription()) {
			$jobPosting->setDescription($this->job->getHeadline());
		} else {
			$jobPosting->setDescription($this->job->getDescription());
		}

		return (new JsonLd())->addSchema($jobPosting);
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	public function output(): string
	{
		return $this->toJsonLdObject();
	}

	/**
	 * @return string
	 * @throws Exception
	 */
	public function __toString(): string
	{
		return (string)$this->output();
	}
}
