<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class BreadcrumbList
 * @package Duracom\JsonLd\Schemas
 */
class BreadcrumbList implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 */
	protected $type = 'BreadcrumbList';

	/**
	 * @var Listitem[]
	 */
	protected $breadcrumbItems;

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return BreadcrumbList
	 */
	public function setContext(string $context): BreadcrumbList
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
	 * @return BreadcrumbList
	 */
	public function setType(string $type): BreadcrumbList
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return Listitem[]
	 */
	public function getBreadcrumbItems(): array
	{
		return $this->breadcrumbItems;
	}

	/**
	 * @param Listitem $breadcrumbItems
	 * @return BreadcrumbList
	 */
	public function addBreadcrumbItem(ListItem $breadcrumbItems): BreadcrumbList
	{
		$this->breadcrumbItems[] = $breadcrumbItems;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$breadcrumbsArray = [];
		foreach($this->getBreadcrumbItems() as $breadcrumbItem){
			$breadcrumbsArray[] = $breadcrumbItem->asArray();
		}
		return [
			'@context' => $this->getContext(),
			'@type' => $this->getType(),
			'itemListElement' => $breadcrumbsArray
		];
	}
}
