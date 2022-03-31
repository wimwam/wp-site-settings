<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class Question
 * @package Duracom\JsonLd\Schemas
 */
class Question implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $type = 'Question';

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var Answer
	 */
	protected $acceptedAnswer;

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Question
	 */
	public function setType(string $type): Question
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
	 * @return Question
	 */
	public function setName(string $name): Question
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return Answer
	 */
	public function getAcceptedAnswer(): Answer
	{
		return $this->acceptedAnswer;
	}

	/**
	 * @param Answer $acceptedAnswer
	 * @return Question
	 */
	public function setAcceptedAnswer(Answer $acceptedAnswer): Question
	{
		$this->acceptedAnswer = $acceptedAnswer;
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
			'acceptedAnswer' => $this->getAcceptedAnswer()->asArray()
		];
	}
}
