<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Brand
 * @package Duracom\JsonLd\Schemas
 */
class Brand implements SchemaInterface
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var ImageObject
	 */
	private $logo;

	/**
	 * @var Reviews|null
	 */
	private $review;

	/**
	 * @var AggregateRating|null
	 */
	private $aggregateRating;

	/**
	 * @var string|null
	 */
	private $url;

	/**
	 * @var string|null
	 */
	private $description;

	/**
	 * @var string|null
	 */
	private $image;

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Brand
	 */
	public function setName(string $name): Brand
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return ImageObject
	 */
	public function getLogo(): ImageObject
	{
		return $this->logo;
	}

	/**
	 * @param ImageObject $logo
	 * @return Brand
	 */
	public function setLogo(ImageObject $logo): Brand
	{
		$this->logo = $logo;
		return $this;
	}

	/**
	 * @return Reviews|null
	 */
	public function getReview(): ?Reviews
	{
		return $this->review;
	}

	/**
	 * @param Reviews|null $review
	 * @return Brand
	 */
	public function setReview(?Reviews $review): Brand
	{
		$this->review = $review;
		return $this;
	}

	/**
	 * @return AggregateRating|null
	 */
	public function getAggregateRating(): ?AggregateRating
	{
		return $this->aggregateRating;
	}

	/**
	 * @param AggregateRating|null $aggregateRating
	 * @return Brand
	 */
	public function setAggregateRating(?AggregateRating $aggregateRating): Brand
	{
		$this->aggregateRating = $aggregateRating;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}

	/**
	 * @param string|null $url
	 * @return Brand
	 */
	public function setUrl(?string $url): Brand
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string|null $description
	 * @return Brand
	 */
	public function setDescription(?string $description): Brand
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getImage(): ?string
	{
		return $this->image;
	}

	/**
	 * @param string|null $image
	 * @return Brand
	 */
	public function setImage(?string $image): Brand
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$brand = [
			'@type' => 'Brand',
			'name' => $this->getName(),
			'logo' => $this->getLogo()->asArray()
		];

		if ($this->getReview()) {
			$brand['reviews'] = $this->getReview()->asArray();
		}

		if ($this->getAggregateRating()) {
			$brand['aggregateRating'] = $this->getAggregateRating()->asArray();
		}

		if ($this->getUrl()) {
			$brand['url'] = $this->getUrl();
		}

		if ($this->getDescription()) {
			$brand['description'] = $this->getDescription();
		}

		if ($this->getImage()) {
			$brand['image'] = $this->getImage();
		}

		return $brand;
	}
}
