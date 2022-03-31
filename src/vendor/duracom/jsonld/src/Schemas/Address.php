<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Address
 * @package Duracom\JsonLd\Schemas
 */
class Address implements SchemaInterface
{

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string|null
	 */
	protected $addressLocality;

	/**
	 * @var string|null
	 */
	protected $addressRegion;

	/**
	 * @var string
	 */
	protected $postalCode;

	/**
	 * @var string|null
	 */
	protected $streetAddress;

	/**
	 * @var string|null
	 */
	protected $address;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Address
	 */
	public function setType(string $type): Address
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAddressLocality(): ?string
	{
		return $this->addressLocality;
	}

	/**
	 * @param string|null $addressLocality
	 * @return Address
	 */
	public function setAddressLocality(?string $addressLocality): Address
	{
		$this->addressLocality = $addressLocality;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAddressRegion(): ?string
	{
		return $this->addressRegion;
	}

	/**
	 * @param string|null $addressRegion
	 * @return Address
	 */
	public function setAddressRegion(?string $addressRegion): Address
	{
		$this->addressRegion = $addressRegion;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPostalCode(): string
	{
		return $this->postalCode;
	}

	/**
	 * @param string $postalCode
	 * @return Address
	 */
	public function setPostalCode(string $postalCode): Address
	{
		$this->postalCode = $postalCode;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getStreetAddress(): ?string
	{
		return $this->streetAddress;
	}

	/**
	 * @param string|null $streetAddress
	 * @return Address
	 */
	public function setStreetAddress(?string $streetAddress): Address
	{
		$this->streetAddress = $streetAddress;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * @param string|null $address
	 * @return Address
	 */
	public function setAddress(?string $address): Address
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$address = [
			'@type' => $this->getType(),
		];
		if ($this->getAddressRegion()) {
			$address['addressRegion'] = $this->getAddressRegion();
		}
		if ($this->getStreetAddress()) {
			$address['streetAddress'] = $this->getStreetAddress();
		}
		if ($this->getAddressLocality()) {
			$address['addressLocality'] = $this->getAddressLocality();
		}
		if ($this->getAddress()) {
			$address['address'] = $this->getAddress();
		}
		if ($this->getPostalCode()) {
			$address['postalCode'] = $this->getPostalCode();
		}

		return $address;
	}
}
