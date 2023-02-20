<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Price
 * @package Duracom\JsonLd\Schemas
 */
class Price implements SchemaInterface
{
	/**
	 * @var float
	 */
	protected $price;

	public function __construct(float $price)
	{
		$this->price = $price;
	}

	/**
	 * @return float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * @param int $decimals
	 * @return Price
	 */
	public function format(int $decimals = 2): Price
	{
        return new Price(number_format($this->price, $decimals, '.', ''));
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return (string)$this->getPrice();
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [$this->getPrice()];
	}
}
