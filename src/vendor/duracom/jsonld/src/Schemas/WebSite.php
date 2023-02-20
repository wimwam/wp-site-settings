<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class WebSite
 * @package Duracom\JsonLd\Schemas
 */
class WebSite implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = 'WebSite';

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $alternateName;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var array
	 */
	protected $potentialAction;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return WebSite
	 */
	public function setType(string $type): WebSite
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
	 * @return WebSite
	 */
	public function setName(string $name): WebSite
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAlternateName(): string
	{
		return $this->alternateName;
	}

	/**
	 * @param string $alternateName
	 * @return WebSite
	 */
	public function setAlternateName(string $alternateName): WebSite
	{
		$this->alternateName = $alternateName;
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
	 * @return WebSite
	 */
	public function setUrl(string $url): WebSite
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getPotentialAction(): array
	{
		return $this->potentialAction;
	}

	/**
	 * @param array $potentialAction
	 * @return WebSite
	 */
	public function setPotentialAction(array $potentialAction): WebSite
	{
		$this->potentialAction = $potentialAction;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@context' => 'https://schema.org',
			'@type' => $this->getType(),
			'name' => $this->getName(),
			'alternateName' => $this->getAlternateName(),
			'url' => $this->getUrl(),
			'potentialAction' => $this->getPotentialAction()
		];
	}
}
