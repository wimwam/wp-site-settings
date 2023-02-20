<?php

namespace Duracom\JsonLd;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class JsonLd
 * @package Duracom\JsonLd
 */
class JsonLd
{
	/**
	 * @var array
	 */
	protected $jsonLdObject;

	/**
	 * @param SchemaInterface $object
	 * @return JsonLd
	 */
	public function addSchema(SchemaInterface $object): JsonLd
	{
		if (!is_array($this->jsonLdObject)) {
			$this->jsonLdObject = [];
		}

		$this->jsonLdObject = array_merge($this->jsonLdObject, $object->asArray());

		return $this;
	}

	/**
	 * @return string
	 */
	public function output(): string
	{
		return sprintf(
			'<script type="application/ld+json">%s</script>',
			json_encode($this->jsonLdObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
		);
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return (string)$this->output();
	}
}