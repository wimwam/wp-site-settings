<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Person
 * @package Duracom\JsonLd\Schemas
 */
class Person implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $itemType = 'Person';

	/**
	 * @var string|null
	 */
	protected $name = 'Anoniem';

	/**
	 * @var string|null
	 */
	protected $address = 'Onbekend';

	/**
	 * @return string
	 */
	public function getItemType(): string
	{
		return $this->itemType;
	}

	/**
	 * @param string $itemType
	 * @return Person
	 */
	public function setItemType(string $itemType): Person
	{
		$this->itemType = $itemType;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getName(): ?string
	{
		return $this->name;
	}

	/**
	 * @param string|null $name
	 * @return Person
	 */
	public function setName(?string $name): Person
	{
		$this->name = ($name ? $name : 'Anoniem');
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
	 * @return Person
	 */
	public function setAddress(?string $address): Person
	{
		$this->address = ($address ? $address : 'Onbekend');
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getItemType(),
			'name' => $this->getName(),
			'address' => $this->getAddress()
		];
	}
}
