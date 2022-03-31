<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class WebPage
 * @package Duracom\JsonLd\Schemas
 */
class WebPage implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = '@WebPage';

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $inLanguage;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $description;


	/**
	 * @var Organization
	 */
	protected $about;

	/**
	 * @var SchemaInterface
	 */
	protected $isPartOf;

	/**
	 * @var SchemaInterface[]|null
	 */
	protected $subSchemas;

	/**
	 * @var array
	 */
	protected $objects = [];

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return WebPage
	 */
	public function setType(string $type): WebPage
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
	 * @return WebPage
	 */
	public function setId(string $id): WebPage
	{
		$this->id = $id;
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
	 * @return WebPage
	 */
	public function setUrl(string $url): WebPage
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getInLanguage(): string
	{
		return $this->inLanguage;
	}

	/**
	 * @param string $inLanguage
	 * @return WebPage
	 */
	public function setInLanguage(string $inLanguage): WebPage
	{
		$this->inLanguage = $inLanguage;
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
	 * @return WebPage
	 */
	public function setName(string $name): WebPage
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
	 * @return WebPage
	 */
	public function setDescription(string $description): WebPage
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return Organization
	 */
	public function getAbout(): Organization
	{
		return $this->about;
	}

	/**
	 * @param Organization $about
	 * @return WebPage
	 */
	public function setAbout(Organization $about): WebPage
	{
		$this->about = $about;
		return $this;
	}

	/**
	 * @return SchemaInterface
	 */
	public function getIsPartOf(): SchemaInterface
	{
		return $this->isPartOf;
	}

	/**
	 * @param SchemaInterface $isPartOf
	 * @return WebPage
	 */
	public function setIsPartOf(SchemaInterface $isPartOf): SchemaInterface
	{
		$this->isPartOf = $isPartOf;
		return $this;
	}

	/**
	 * @return SchemaInterface[]|null
	 */
	public function getSubSchemas(): ?array
	{
		return $this->subSchemas;
	}

	/**
	 * @param SchemaInterface|null $appendableObjects
	 * @return SchemaInterface
	 */
	public function setSubSchemas(?SchemaInterface $appendableObjects): SchemaInterface
	{
		$this->subSchemas[] = $appendableObjects;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$webSite = [
			'@type' => $this->getType(),
			'@id' => $this->getId(),
			'url' => $this->getUrl(),
			'inLanguage' => $this->getInLanguage(),
			'name' => $this->getName(),
			'description' => $this->getDescription(),
			'isPartOf' => $this->getIsPartOf()->asArray(),
			'about' => $this->getAbout()->asArray()
		];

		if ($this->getSubSchemas()) {
			foreach ($this->getSubSchemas() as $object) {
				$webSite = array_merge($webSite, $object->asArray());
			}
		}

		return $webSite;
	}
}
