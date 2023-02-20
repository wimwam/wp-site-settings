<?php

namespace Duracom\JsonLd\Interfaces;

use Duracom\JsonLd\JsonLd;

/**
 * Interface PageTypeInterface
 * @package Duracom\JsonLd\Interfaces
 */
interface PageTypeInterface
{
	/**
	 * @return JsonLd
	 */
	public function toJsonLdObject(): JsonLd;

	/**
	 * @return string
	 */
	public function output(): string;

	/**
	 * @return string
	 */
	public function __toString(): string;
}
