<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Answer
 * @package Duracom\JsonLd\Schemas
 */
class Answer implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = 'Answer';

	/**
	 * @var string
	 */
	protected $text;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Answer
	 */
	public function setType(string $type): Answer
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}

	/**
	 * @param string $text
	 * @return Answer
	 */
	public function setText(string $text): Answer
	{
		$this->text = $text;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		return [
			'@type' => $this->getType(),
			'text' => $this->getText()
		];
	}
}
