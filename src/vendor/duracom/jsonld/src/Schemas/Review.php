<?php

namespace Duracom\JsonLd\Schemas;

use DateTime;
use Duracom\JsonLd\Interfaces\SchemaInterface;
/**
 * Class Review
 * @package Duracom\JsonLd\Schemas
 */
class Review implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = 'Review';

	/**
	 * @var Rating
	 */
	protected $reviewRating;

	/**
	 * @var Person
	 */
	protected $author;

	/**
	 * @var SchemaInterface
	 */
	protected $publisher;

	/**
	 * @var DateTime;
	 */
	protected $datePublished;

	/**
	 * @var ItemReviewed|null
	 */
	protected $itemReviewed;

	/**
	 * @var string|null
	 */
	protected $reviewBody;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Review
	 */
	public function setType(string $type): Review
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return Rating
	 */
	public function getReviewRating(): Rating
	{
		return $this->reviewRating;
	}

	/**
	 * @param Rating $reviewRating
	 * @return Review
	 */
	public function setReviewRating(Rating $reviewRating): Review
	{
		$this->reviewRating = $reviewRating;
		return $this;
	}

	/**
	 * @return Person
	 */
	public function getAuthor(): Person
	{
		return $this->author;
	}

	/**
	 * @param Person $author
	 * @return Review
	 */
	public function setAuthor(Person $author): Review
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return SchemaInterface
	 */
	public function getPublisher(): SchemaInterface
	{
		return $this->publisher;
	}

	/**
	 * @param SchemaInterface $publisher
	 * @return Review
	 */
	public function setPublisher(SchemaInterface $publisher): Review
	{
		$this->publisher = $publisher;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDatePublished(): DateTime
	{
		return $this->datePublished;
	}

	/**
	 * @param DateTime $datePublished
	 * @return Review
	 */
	public function setDatePublished(DateTime $datePublished): Review
	{
		$this->datePublished = $datePublished;
		return $this;
	}

	/**
	 * @return ItemReviewed|null
	 */
	public function getItemReviewed(): ?ItemReviewed
	{
		return $this->itemReviewed;
	}

	/**
	 * @param ItemReviewed|null $itemReviewed
	 * @return Review
	 */
	public function setItemReviewed(?ItemReviewed $itemReviewed): Review
	{
		$this->itemReviewed = $itemReviewed;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getReviewBody(): ?string
	{
		return $this->reviewBody;
	}

	/**
	 * @param string|null $reviewBody
	 * @return Review
	 */
	public function setReviewBody(?string $reviewBody): Review
	{
		$this->reviewBody = $reviewBody;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$review = [
			'@type' => $this->getType(),
			'datePublished' => $this->getDatePublished()->format('Y-m-d'),
			'reviewRating' => $this->getReviewRating()->asArray(),
			'author' => $this->getAuthor()->asArray(),
			'publisher' => $this->getPublisher()->asArray()
		];

		if ($this->getItemReviewed()) {
			$review['itemReviewed'] = $this->getItemReviewed()->asArray();
		}

		if ($this->getReviewBody()) {
			$review['reviewBody'] = $this->getReviewBody();
		}

		return $review;
	}
}
