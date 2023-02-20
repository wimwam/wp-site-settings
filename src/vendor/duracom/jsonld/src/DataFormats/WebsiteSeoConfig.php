<?php

namespace Duracom\JsonLd\DataFormats;

class WebsiteSeoConfig
{
	/**
	 * @var string
	 */
	private $language;

	/**
	 * @var string
	 */
	private $baseUrl;

	/**
	 * @var string
	 */
	private $companyName;

	/**
	 * @var string
	 */
	private $siteLogo;

	/**
	 * @var string
	 */
	private $siteImage;

	/**
	 * @var string
	 */
	private $phoneNumber;

	/**
	 * @var string
	 */
	private $address;

	/**
	 * @var string
	 */
	private $postalCode;

	/**
	 * @var string
	 */
	private $city;

	/**
	 * @var string
	 */
	private $locality;

	/**
	 * @var string
	 */
	private $chamberOfCommerceNumber;

	/**
	 * @var string
	 */
	private $vatNumber;

	/**
	 * @var array
	 */
	private $sameAs;

	/**
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * @param string $language
	 * @return WebsiteSeoConfig
	 */
	public function setLanguage(string $language): WebsiteSeoConfig
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl(): string
	{
		return $this->baseUrl;
	}

	/**
	 * @param string $baseUrl
	 * @return WebsiteSeoConfig
	 */
	public function setBaseUrl(string $baseUrl): WebsiteSeoConfig
	{
		$this->baseUrl = $baseUrl;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCompanyName(): string
	{
		return $this->companyName;
	}

	/**
	 * @param string $companyName
	 * @return WebsiteSeoConfig
	 */
	public function setCompanyName(string $companyName): WebsiteSeoConfig
	{
		$this->companyName = $companyName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSiteLogo(): string
	{
		return $this->siteLogo;
	}

	/**
	 * @param string $siteLogo
	 * @return WebsiteSeoConfig
	 */
	public function setSiteLogo(string $siteLogo): WebsiteSeoConfig
	{
		$this->siteLogo = $siteLogo;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSiteImage(): string
	{
		return $this->siteImage;
	}

	/**
	 * @param string $siteImage
	 * @return WebsiteSeoConfig
	 */
	public function setSiteImage(string $siteImage): WebsiteSeoConfig
	{
		$this->siteImage = $siteImage;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhoneNumber(): string
	{
		return $this->phoneNumber;
	}

	/**
	 * @param string $phoneNumber
	 * @return WebsiteSeoConfig
	 */
	public function setPhoneNumber(string $phoneNumber): WebsiteSeoConfig
	{
		$this->phoneNumber = $phoneNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAddress(): string
	{
		return $this->address;
	}

	/**
	 * @param string $address
	 * @return WebsiteSeoConfig
	 */
	public function setAddress(string $address): WebsiteSeoConfig
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPostalCode(): string
	{
		return $this->postalCode;
	}

	/**
	 * @param string $postalCode
	 * @return WebsiteSeoConfig
	 */
	public function setPostalCode(string $postalCode): WebsiteSeoConfig
	{
		$this->postalCode = $postalCode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * @param string $city
	 * @return WebsiteSeoConfig
	 */
	public function setCity(string $city): WebsiteSeoConfig
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLocality(): string
	{
		return $this->locality;
	}

	/**
	 * @param string $locality
	 * @return WebsiteSeoConfig
	 */
	public function setLocality(string $locality): WebsiteSeoConfig
	{
		$this->locality = $locality;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getChamberOfCommerceNumber(): string
	{
		return $this->chamberOfCommerceNumber;
	}

	/**
	 * @param string $chamberOfCommerceNumber
	 * @return WebsiteSeoConfig
	 */
	public function setChamberOfCommerceNumber(string $chamberOfCommerceNumber): WebsiteSeoConfig
	{
		$this->chamberOfCommerceNumber = $chamberOfCommerceNumber;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getVatNumber(): string
	{
		return $this->vatNumber;
	}

	/**
	 * @param string $vatNumber
	 * @return WebsiteSeoConfig
	 */
	public function setVatNumber(string $vatNumber): WebsiteSeoConfig
	{
		$this->vatNumber = $vatNumber;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getSameAs(): array
	{
		return $this->sameAs;
	}

	/**
	 * @param array $sameAs
	 * @return WebsiteSeoConfig
	 */
	public function setSameAs(array $sameAs): WebsiteSeoConfig
	{
		$this->sameAs = $sameAs;
		return $this;
	}
}
