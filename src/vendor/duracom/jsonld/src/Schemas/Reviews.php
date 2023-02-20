<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Reviews
 * @package Duracom\JsonLd\Schemas
 */
class Reviews implements SchemaInterface
{
	/**
	 * @var Review[]
	 */
	protected $reviews;

	/**
	 * @return Review[]
	 */
	public function getReviews(): array
	{
		return $this->reviews;
	}

	/**
	 * @param Review $review
	 * @return Reviews
	 */
	public function addReview(Review $review): Reviews
	{
		$this->reviews[] = $review;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$reviewArray = [];
		foreach($this->getReviews() as $review){
			$reviewArray[] = $review->asArray();
		}
		return $reviewArray;
	}
}
