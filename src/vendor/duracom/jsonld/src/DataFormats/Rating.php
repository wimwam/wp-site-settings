<?php

namespace Duracom\JsonLd\DataFormats;

class Rating
{
	/**
	 * @var float
	 */
	protected $ratingAverage;

	/**
	 * @var int
	 */
	protected $ratingTotal;

	/**
	 * @return float
	 */
	public function getRatingAverage(): float
	{
		return $this->ratingAverage;
	}

	/**
	 * @param float $ratingAverage
	 * @return Rating
	 */
	public function setRatingAverage(float $ratingAverage): Rating
	{
		$this->ratingAverage = $ratingAverage;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRatingTotal(): int
	{
		return $this->ratingTotal;
	}

	/**
	 * @param int $ratingTotal
	 * @return Rating
	 */
	public function setRatingTotal(int $ratingTotal): Rating
	{
		$this->ratingTotal = $ratingTotal;
		return $this;
	}

}
