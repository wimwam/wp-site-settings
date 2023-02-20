<?php

namespace Duracom\JsonLd\DataFormats;

use Duracom\JsonLd\Schemas\Price;

class Product
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var array
	 */
	private $images;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $sku;

	/**
	 * @var string
	 */
	private $brand;

	/**
	 * @var string|null
	 */
	private $gtin13;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @var Price
	 */
	private $price;

	/**
	 * @var string
	 */
	private $itemCondition = 'https://schema.org/NewCondition';

	/**
	 * @var bool
	 */
	private $inStock;

	/**
	 * @var Rating|null
	 */
	private $aggregateRating;

	/**
	 * @var ProductReview[]
	 */
	private $reviews;

	/**
	 * @return Price
	 */
	public function getPrice(): Price
	{
		return $this->price;
	}

	/**
	 * @param Price $price
	 * @return Product
	 */
	public function setPrice(Price $price): Product
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Product
	 */
	public function setName(string $name): Product
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getImages(): array
	{
		return $this->images;
	}

	/**
	 * @param array $images
	 * @return Product
	 */
	public function setImages(array $images): Product
	{
		$this->images = $images;
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
	 * @return Product
	 */
	public function setDescription(string $description): Product
	{
		$this->description = $description;
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
	 * @return Product
	 */
	public function setSku(string $sku): Product
	{
		$this->sku = $sku;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBrand(): string
	{
		return $this->brand;
	}

	/**
	 * @param string $brand
	 * @return Product
	 */
	public function setBrand(string $brand): Product
	{
		$this->brand = $brand;
		return $this;
	}

    /**
     * @return string|null
     */
	public function getGtin13(): ?string
	{
		return $this->gtin13;
	}

    /**
     * @param string|null $gtin13
     *
     * @return Product
     */
	public function setGtin13(?string $gtin13): Product
	{
		$this->gtin13 = $gtin13;
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
	 * @return Product
	 */
	public function setUrl(string $url): Product
	{
		$this->url = $url;
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
	 * @return Product
	 */
	public function setItemCondition(string $itemCondition): Product
	{
		$this->itemCondition = $itemCondition;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isInStock(): bool
	{
		return $this->inStock;
	}

	/**
	 * @param bool $inStock
	 * @return Product
	 */
	public function setInStock(bool $inStock): Product
	{
		$this->inStock = $inStock;
		return $this;
	}

	/**
	 * @return Rating|null
	 */
	public function getAggregateRating(): ?Rating
	{
		return $this->aggregateRating;
	}

	/**
	 * @param Rating|null $aggregateRating
	 * @return Product
	 */
	public function setAggregateRating(?Rating $aggregateRating): Product
	{
		$this->aggregateRating = $aggregateRating;
		return $this;
	}

	/**
	 * @return ProductReview[]
	 */
	public function getReviews(): array
	{
		return $this->reviews;
	}

	/**
	 * @param ProductReview $reviews
	 * @return Product
	 */
	public function setReviews(ProductReview $reviews): Product
	{
		$this->reviews[] = $reviews;
		return $this;
	}
}
