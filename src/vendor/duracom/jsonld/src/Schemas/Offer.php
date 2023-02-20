<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Offer
 * @package Duracom\JsonLd\Schemas
 */
class Offer implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $itemprop = 'offers';

	/**
	 * @var string
	 */
	protected $itemType = 'Offer';

	/**
	 * @var Price
	 */
	protected $price;

	/**
	 * @var string
	 */
	protected $priceCurrency;

	/**
	 * @var string
	 */
	protected $itemCondition;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var bool
	 */
	protected $availability;

	/**
	 * @var string
	 */
	protected $sku;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @return string
	 */
	public function getItemprop(): string
	{
		return $this->itemprop;
	}

	/**
	 * @param string $itemprop
	 * @return Offer
	 */
	public function setItemprop(string $itemprop): Offer
	{
		$this->itemprop = $itemprop;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItemType(): string
	{
		return $this->itemType;
	}

	/**
	 * @param string $itemType
	 * @return Offer
	 */
	public function setItemType(string $itemType): Offer
	{
		$this->itemType = $itemType;
		return $this;
	}

	/**
	 * @return Price
	 */
	public function getPrice(): Price
	{
		return $this->price;
	}

	/**
	 * @param Price $price
	 * @return Offer
	 */
	public function setPrice(Price $price): Offer
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPriceCurrency(): string
	{
		return $this->priceCurrency;
	}

	/**
	 * @param string $priceCurrency
	 * @return Offer
	 */
	public function setPriceCurrency(string $priceCurrency): Offer
	{
		$this->priceCurrency = $priceCurrency;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItemCondition(): string
	{
		return $this->itemCondition;
	}

	/**
	 * @param string $itemCondition
	 * @return Offer
	 */
	public function setItemCondition(string $itemCondition): Offer
	{
		$this->itemCondition = $itemCondition;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return Offer
	 */
	public function setUrl(string $url): Offer
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getAvailability(): bool
	{
		return $this->availability;
	}

	/**
	 * @param bool $availability
	 * @return Offer
	 */
	public function setAvailability(bool $availability): Offer
	{
		$this->availability = $availability;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSku(): string
	{
		return $this->sku;
	}

	/**
	 * @param string $sku
	 * @return Offer
	 */
	public function setSku(string $sku): Offer
	{
		$this->sku = $sku;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Offer
	 */
	public function setDescription(string $description): Offer
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$jsonLdObject = [
			'@type' => $this->getItemType(),
			'priceCurrency' => $this->getPriceCurrency(),
			'itemCondition' => $this->getItemCondition(),
			'url' => $this->getUrl(),
			'sku' => $this->getSku(),
			'description' => $this->getDescription()

		];
		if ($this->getAvailability()) {
			$jsonLdObject['availability'] = 'https://schema.org/InStock';
		} else {
			$jsonLdObject['availability'] = 'https://schema.org/OutOfStock';
		}

		if (isset($this->getPrice()->asArray()[0])) {
			$jsonLdObject['price'] = $this->getPrice()->asArray()[0];
		}

		return $jsonLdObject;
	}
}
