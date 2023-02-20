<?php

namespace Duracom\JsonLd\DataFormats;

use DateTime;

class Job
{
	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $headline;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var DateTime
	 */
	private $datePosted;

	/**
	 * @var DateTime|null
	 */
	private $dateEnding;

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Job
	 */
	public function setTitle(string $title): Job
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHeadline(): string
	{
		return $this->headline;
	}

	/**
	 * @param string $headline
	 * @return Job
	 */
	public function setHeadline(string $headline): Job
	{
		$this->headline = $headline;
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
	 * @return Job
	 */
	public function setDescription(string $description): Job
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDatePosted(): DateTime
	{
		return $this->datePosted;
	}

	/**
	 * @param DateTime $datePosted
	 * @return Job
	 */
	public function setDatePosted(DateTime $datePosted): Job
	{
		$this->datePosted = $datePosted;
		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDateEnding(): ?DateTime
	{
		return $this->dateEnding;
	}

	/**
	 * @param DateTime|null $dateEnding
	 * @return Job
	 */
	public function setDateEnding(?DateTime $dateEnding): Job
	{
		$this->dateEnding = $dateEnding;
		return $this;
	}
}