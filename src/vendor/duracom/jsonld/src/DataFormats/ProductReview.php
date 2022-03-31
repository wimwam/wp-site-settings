<?php

namespace Duracom\JsonLd\DataFormats;

use DateTime;

class ProductReview
{
	/**
	 * @var int
	 */
	private $ratingValue;

	/**
	 * @var string
	 */
	private $customerName;

	/**
	 * @var string
	 */
	private $customerAddress;

	/**
	 * @var DateTime
	 */
	private $reviewDate;

	/**
	 * @var string
	 */
	private $reviewBody;

	/**
	 * @return int
	 */
	public function getRatingValue(): int
	{
		return $this->ratingValue;
	}

	/**
	 * @param int $ratingValue
	 * @return ProductReview
	 */
	public function setRatingValue(int $ratingValue): ProductReview
	{
		$this->ratingValue = $ratingValue;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCustomerName(): string
	{
		return $this->customerName;
	}

	/**
	 * @param string $customerName
	 * @return ProductReview
	 */
	public function setCustomerName(string $customerName): ProductReview
	{
		$this->customerName = $customerName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCustomerAddress(): string
	{
		return $this->customerAddress;
	}

	/**
	 * @param string $customerAddress
	 * @return ProductReview
	 */
	public function setCustomerAddress(string $customerAddress): ProductReview
	{
		$this->customerAddress = $customerAddress;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getReviewDate(): DateTime
	{
		return $this->reviewDate;
	}

	/**
	 * @param DateTime $reviewDate
	 * @return ProductReview
	 */
	public function setReviewDate(DateTime $reviewDate): ProductReview
	{
		$this->reviewDate = $reviewDate;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getReviewBody(): string
	{
		return $this->reviewBody;
	}

	/**
	 * @param string $reviewBody
	 * @return ProductReview
	 */
	public function setReviewBody(string $reviewBody): ProductReview
	{
		$this->reviewBody = $reviewBody;
		return $this;
	}
}
