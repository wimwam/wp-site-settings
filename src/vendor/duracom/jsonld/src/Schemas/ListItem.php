<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class ListItem
 * @package Duracom\JsonLd\Schemas
 */
class ListItem implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = 'ListItem';

	/**
	 * @var int
	 */
	protected $position;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $item;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return ListItem
	 */
	public function setType(string $type): ListItem
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPosition(): int
	{
		return $this->position;
	}

	/**
	 * @param int $position
	 * @return ListItem
	 */
	public function setPosition(int $position): ListItem
	{
		$this->position = $position;
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
	 * @return ListItem
	 */
	public function setName(string $name): ListItem
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getItem(): string
	{
		return $this->item;
	}

	/**
	 * @param string $item
	 * @return ListItem
	 */
	public function setItem(string $item): ListItem
	{
		$this->item = $item;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getType(),
			'position' => $this->getPosition(),
			'name' => $this->getName(),
			'item' => $this->getItem()
		];
	}
}
