<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class ItemReviewed
 * @package Duracom\JsonLd\Schemas
 */
class ItemReviewed implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return ItemReviewed
	 */
	public function setType(string $type): ItemReviewed
	{
		$this->type = $type;
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
	 * @return ItemReviewed
	 */
	public function setName(string $name): ItemReviewed
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return ItemReviewed
	 */
	public function setUrl(string $url): ItemReviewed
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getType(),
			'name' => $this->getName(),
			'url' => $this->getUrl()

		];
	}
}
