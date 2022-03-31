<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Rating
 * @package Duracom\JsonLd\Schemas
 */
class Rating implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $itemType = 'Rating';

	/**
	 * @var int
	 */
	protected $ratingValue;

	/**
	 * @var int
	 */
	protected $bestRating;

	/**
	 * @var int
	 */
	protected $worstRating;

	/**
	 * @var Person
	 */
	protected $author;

	/**
	 * @return string
	 */
	public function getItemType(): string
	{
		return $this->itemType;
	}

	/**
	 * @param string $itemType
	 * @return Rating
	 */
	public function setItemType(string $itemType): Rating
	{
		$this->itemType = $itemType;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRatingValue(): int
	{
		return $this->ratingValue;
	}

	/**
	 * @param int $ratingValue
	 * @return Rating
	 */
	public function setRatingValue(int $ratingValue): Rating
	{
		$this->ratingValue = $ratingValue;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getBestRating(): int
	{
		return $this->bestRating;
	}

	/**
	 * @param int $bestRating
	 * @return Rating
	 */
	public function setBestRating(int $bestRating): Rating
	{
		$this->bestRating = $bestRating;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getWorstRating(): int
	{
		return $this->worstRating;
	}

	/**
	 * @param int $worstRating
	 * @return Rating
	 */
	public function setWorstRating(int $worstRating): Rating
	{
		$this->worstRating = $worstRating;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getItemType(),
			'ratingValue' => $this->getRatingValue(),
			'bestRating' => $this->getBestRating(),
			'worstRating' => $this->getWorstRating()
		];
	}
}
