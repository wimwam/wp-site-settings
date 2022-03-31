<?php

namespace Duracom\JsonLd\PageTypes;

use Duracom\JsonLd\DataFormats\WebsiteSeoConfig;
use Duracom\JsonLd\DataFormats\BlogPost;
use Duracom\JsonLd\Interfaces\PageTypeInterface;
use Duracom\JsonLd\JsonLd;
use Duracom\JsonLd\Schemas\Address;
use Duracom\JsonLd\Schemas\BlogPosting;
use Duracom\JsonLd\Schemas\ImageObject;
use Duracom\JsonLd\Schemas\MainEntity;
use Duracom\JsonLd\Schemas\Organization;
use Exception;

/**
 * Class ExampleBlogPostPage
 * @package Duracom\JsonLd\PageTypes
 */
class ExampleBlogPostPage implements PageTypeInterface
{
	/**
	 * @var WebsiteSeoConfig
	 */
	private $siteSettings;

	/**
	 * @var BlogPost
	 */
	private $blogPost;

	/**
	 * ExampleBlogPostPage constructor.
	 * @param WebsiteSeoConfig $siteSettings
	 * @param BlogPost $blogPost
	 */
	public function __construct(
		WebsiteSeoConfig $siteSettings,
		BlogPost $blogPost
	) {
		$this->siteSettings = $siteSettings;
		$this->blogPost = $blogPost;
	}

	/**
	 * @return JsonLd
	 * @throws Exception
	 */
	public function toJsonLdObject(): JsonLd
	{
		$blogPost = (new BlogPosting())
			->setMainEntityOfPage(
				(new MainEntity())
					->setType('WebPage')
					->setId($this->siteSettings->getBaseUrl() . '/blog')
			)
			->setHeadline($this->blogPost->getHeadline())
			->setImage($this->blogPost->getImage())
			->setGenre('Article')
			->setKeywords('')
			->setUrl($this->siteSettings->getBaseUrl() . '/blog/' . $this->blogPost->getGetUrl())
			->setDatePublished($this->blogPost->getDatePublished())
			->setDateCreated($this->blogPost->getDateCreated())
			->setDateModified($this->blogPost->getDateModified())
			->setAuthor(
				(new Organization())
					->setType('Organization')
					->setName($this->siteSettings->getCompanyName())
					->setLogo(
						(new ImageObject())
							->setType('ImageObject')
							->setUrl($this->siteSettings->getSiteLogo())
					)
					->setUrl($this->siteSettings->getBaseUrl())
					->setImage($this->siteSettings->getSiteImage())
					->setTelephone($this->siteSettings->getPhoneNumber())
					->setAddress(
						(new Address())
							->setType('PostalAddress')
							->setAddressLocality($this->siteSettings->getLocality())
							->setStreetAddress($this->siteSettings->getAddress())
							->setPostalCode($this->siteSettings->getPostalCode())
							->setAddressRegion($this->siteSettings->getCity())
					)
					->setSameAs($this->siteSettings->getSameAs())
			)
			->setPublisher(
				(new Organization())
					->setType('Organization')
					->setName($this->siteSettings->getCompanyName())
					->setLogo(
						(new ImageObject())
							->setType('ImageObject')
							->setUrl($this->siteSettings->getSiteLogo())
					)
					->setUrl($this->siteSettings->getBaseUrl())
					->setImage($this->siteSettings->getSiteImage())
					->setTelephone($this->siteSettings->getPhoneNumber())
					->setAddress(
						(new Address())
							->setType('PostalAddress')
							->setAddressLocality($this->siteSettings->getLocality())
							->setStreetAddress($this->siteSettings->getAddress())
							->setPostalCode($this->siteSettings->getPostalCode())
							->setAddressRegion($this->siteSettings->getCity())
					)
					->setSameAs($this->siteSettings->getSameAs())
			);

		return (new JsonLd())->addSchema($blogPost);
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
