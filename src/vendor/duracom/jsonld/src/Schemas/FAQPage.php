<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class FAQPage
 * @package Duracom\JsonLd\Schemas
 */
class FAQPage implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 */
	protected $type = 'FAQPage';

	/**
	 * @var Question[]
	 */
	protected $mainEntity;

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return FAQPage
	 */
	public function setContext(string $context): FAQPage
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
	 * @return FAQPage
	 */
	public function setType(string $type): FAQPage
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return Question[]
	 */
	public function getMainEntities(): array
	{
		return $this->mainEntity;
	}

	/**
	 * @param Question $mainEntity
	 * @return FAQPage
	 */
	public function addMainEntity(Question $mainEntity): FAQPage
	{
		$this->mainEntity[] = $mainEntity;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$questionArray = [];
		foreach($this->getMainEntities() as $question){
			$questionArray[] = $question->asArray();
		}
		return [
			'@context' => $this->getContext(),
			'@type' => $this->getType(),
			'mainEntity' => $questionArray
		];
	}
}
