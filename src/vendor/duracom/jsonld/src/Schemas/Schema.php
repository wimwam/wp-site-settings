<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Schema
 * @package Duracom\JsonLd\Schemas
 */
class Schema implements SchemaInterface
{
	/**
	 * @var SchemaInterface
	 */
	protected $subSchema;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @return SchemaInterface
	 */
	public function getSubSchema(): SchemaInterface
	{
		return $this->subSchema;
	}

	/**
	 * @param string $name
	 * @param SchemaInterface $subObject
	 * @return SchemaInterface
	 */
	public function setSubSchema(string $name, SchemaInterface $subObject): SchemaInterface
	{
		$this->setName($name);
		$this->subSchema = $subObject;
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
	 * @return SchemaInterface
	 */
	public function setName(string $name): SchemaInterface
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			$this->getName() => $this->getSubSchema()->asArray()
		];
	}
}
