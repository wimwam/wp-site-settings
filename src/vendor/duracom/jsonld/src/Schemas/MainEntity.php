<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class MainEntity
 * @package Duracom\JsonLd\Schemas
 */
class MainEntity implements SchemaInterface
{
	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return MainEntity
	 */
	public function setType(string $type): MainEntity
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return MainEntity
	 */
	public function setId(string $id): MainEntity
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getType(),
			'id' => $this->getId()
		];
	}
}
