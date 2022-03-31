<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class AggregateRating
 * @package Duracom\JsonLd\Schemas
 */
class AggregateRating implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $itemprop = 'aggregateRating';

	/**
	 * @var string
	 */
	protected $itemType = 'AggregateRating';

	/**
	 * @var float
	 */
	protected $ratingValue;

	/**
	 * @var int
	 */
	protected $ratingCount;

	/**
	 * @var int
	 */
	protected $bestRating;

	/**
	 * @var int
	 */
	protected $worstRating;

	/**
	 * @var string|null
	 */
	protected $url;

	/**
	 * @return string
	 */
	public function getItemprop(): string
	{
		return $this->itemprop;
	}

	/**
	 * @param string $itemprop
	 * @return AggregateRating
	 */
	public function setItemprop(string $itemprop): AggregateRating
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
	 * @return AggregateRating
	 */
	public function setItemType(string $itemType): AggregateRating
	{
		$this->itemType = $itemType;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getRatingValue(): float
	{
		return $this->ratingValue;
	}

	/**
	 * @param float $ratingValue
	 * @return AggregateRating
	 */
	public function setRatingValue(float $ratingValue): AggregateRating
	{
		$this->ratingValue = $ratingValue;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRatingCount(): int
	{
		return $this->ratingCount;
	}

	/**
	 * @param int $ratingCount
	 * @return AggregateRating
	 */
	public function setRatingCount(int $ratingCount): AggregateRating
	{
		$this->ratingCount = $ratingCount;
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
	 * @return AggregateRating
	 */
	public function setBestRating(int $bestRating): AggregateRating
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
	 * @return AggregateRating
	 */
	public function setWorstRating(int $worstRating): AggregateRating
	{
		$this->worstRating = $worstRating;
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
	 * @return AggregateRating
	 */
	public function setUrl(?string $url): AggregateRating
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$aggregateRating = [
			'@type' => $this->getItemType(),
			'ratingValue' => $this->getRatingValue(),
			'ratingCount' => $this->getRatingCount(),
			'bestRating' => $this->getBestRating(),
			'worstRating' => $this->getWorstRating()
		];

		if ($this->getUrl()) {
			$aggregateRating['url'] = $this->getUrl();
		}

		return $aggregateRating;
	}
}
