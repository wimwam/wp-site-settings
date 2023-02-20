<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Product
 * @package Duracom\JsonLd\Schemas
 */
class Product implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 */
	protected $type = 'Product';

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var array
	 */
	protected $images;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $sku;

	/**
	 * @var string
	 */
	protected $brand;

	/**
	 * @var string|null
	 */
	protected $gtin13;

	/**
	 * @var SchemaInterface[]|null
	 */
	protected $subSchema;

	/**
	 * @return array
	 */
	public function getImages(): array
	{
		return $this->images;
	}

	/**
	 * @param array $images
	 * @return Product
	 */
	public function addImages(array $images): Product
	{
		$this->images = $images;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return Product
	 */
	public function setContext(string $context): Product
	{
		$this->context = $context;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Product
	 */
	public function setType(string $type): Product
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return Product
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 * @return Product
	 */
	public function setDescription(string $description): Product
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSku(): string
	{
		return $this->sku;
	}

	/**
	 * @param string $sku
	 * @return Product
	 */
	public function setSku(string $sku): Product
	{
		$this->sku = $sku;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBrand(): string
	{
		return $this->brand;
	}

	/**
	 * @param string $brand
	 * @return Product
	 */
	public function setBrand(string $brand): Product
	{
		$this->brand = $brand;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getGtin13(): ?string
	{
		return $this->gtin13;
	}

	/**
	 * @param string|null $gtin13
	 * @return Product
	 */
	public function setGtin13(?string $gtin13): Product
	{
		$this->gtin13 = $gtin13;
		return $this;
	}

	/**
	 * @return SchemaInterface[]|null
	 */
	public function getSubSchema(): ?array
	{
		return $this->subSchema;
	}

	/**
	 * @param SchemaInterface|null $appendableObjects
	 * @return SchemaInterface
	 */
	public function setSubSchema(?SchemaInterface $appendableObjects): SchemaInterface
	{
		$this->subSchema[] = $appendableObjects;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$jsonLdObject = [
			'@context' => $this->getContext(),
			'@type' => $this->getType(),
			'name' => $this->getName(),
			'image' => $this->getImages(),
			'description' => $this->getDescription(),
			'sku' => $this->getSku(),
			'brand' => $this->getBrand()
		];

		if (!empty($this->getGtin13())) {
			$jsonLdObject['gtin13'] = $this->getGtin13();
		}

		if ($this->getSubSchema()) {
			foreach ($this->getSubSchema() as $object) {
				$jsonLdObject = array_merge($jsonLdObject, $object->asArray());
			}
		}

		return $jsonLdObject;
	}
}
