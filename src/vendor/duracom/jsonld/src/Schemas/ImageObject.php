<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class ImageObject
 * @package Duracom\JsonLd\Schemas
 */
class ImageObject implements SchemaInterface
{
	/**
	 * @var string
	 */
	private $type = 'ImageObject';

	/**
	 * @var string|null
	 */
	private $caption;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return ImageObject
	 */
	public function setType(string $type): ImageObject
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCaption(): ?string
	{
		return $this->caption;
	}

	/**
	 * @param string|null $caption
	 * @return ImageObject
	 */
	public function setCaption(?string $caption): ImageObject
	{
		$this->caption = $caption;
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
	 * @return ImageObject
	 */
	public function setUrl(string $url): ImageObject
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$imageObject = [
			'@type' => $this->getType(),
			'url' => $this->getUrl()
		];

		if ($this->getCaption()) {
			$imageObject['caption'] = $this->getCaption();
		}

		return $imageObject;
	}
}
