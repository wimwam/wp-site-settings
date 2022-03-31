<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class LocalBusiness
 * @package Duracom\JsonLd\Schemas
 */
class LocalBusiness implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 * @see https://schema.org/LocalBusiness
	 */
	protected $type = 'AutoPartsStore';

	/**
	 * @var Address
	 */
	protected $address;

	/**
	 * @var AggregateRating
	 * @see https://schema.org/AggregateRating
	 */
	protected $aggregateRating;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var array
	 */
	protected $openingHours;

	/**
	 * @var string
	 */
	protected $priceRange;

	/**
	 * @var string
	 */
	protected $telephone;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return LocalBusiness
	 */
	public function setContext(string $context): LocalBusiness
	{
		$this->context = $context;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return LocalBusiness
	 */
	public function setType(string $type): LocalBusiness
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return Address
	 */
	public function getAddress(): Address
	{
		return $this->address;
	}

	/**
	 * @param Address $address
	 * @return LocalBusiness
	 */
	public function setAddress(Address $address): LocalBusiness
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return AggregateRating
	 */
	public function getAggregateRating(): AggregateRating
	{
		return $this->aggregateRating;
	}

	/**
	 * @param AggregateRating $aggregateRating
	 * @return LocalBusiness
	 */
	public function setAggregateRating(AggregateRating $aggregateRating): LocalBusiness
	{
		$this->aggregateRating = $aggregateRating;
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
	 * @return LocalBusiness
	 */
	public function setDescription(string $description): LocalBusiness
	{
		$this->description = $description;
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
	 * @return LocalBusiness
	 */
	public function setName(string $name): LocalBusiness
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getOpeningHours(): array
	{
		return $this->openingHours;
	}

	/**
	 * @param array $openingHours
	 * @return LocalBusiness
	 */
	public function setOpeningHours(array $openingHours): LocalBusiness
	{
		$this->openingHours = $openingHours;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPriceRange(): string
	{
		return $this->priceRange;
	}

	/**
	 * @param string $priceRange
	 * @return LocalBusiness
	 */
	public function setPriceRange(string $priceRange): LocalBusiness
	{
		$this->priceRange = $priceRange;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTelephone(): string
	{
		return $this->telephone;
	}

	/**
	 * @param string $telephone
	 * @return LocalBusiness
	 */
	public function setTelephone(string $telephone): LocalBusiness
	{
		$this->telephone = $telephone;
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
	 * @return LocalBusiness
	 */
	public function setUrl(string $url): LocalBusiness
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@context' => $this->getContext(),
			'@type' => $this->getType(),
			'address' => $this->getAddress()->asArray(),
			'aggregateRating' => $this->getAggregateRating()->asArray(),
			'description' => $this->getDescription(),
			'name' => $this->getName(),
			'openingHours' => $this->getOpeningHours(),
			'priceRange' => $this->getPriceRange(),
			'telephone' => $this->getTelephone(),
			'url' => $this->getUrl()
		];
	}
}