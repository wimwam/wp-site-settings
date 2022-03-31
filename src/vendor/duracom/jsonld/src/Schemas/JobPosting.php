<?php

namespace Duracom\JsonLd\Schemas;

use Duracom\JsonLd\Interfaces\SchemaInterface;
use DateTime;

/**
 * Class JobPosting
 * @package Duracom\JsonLd\Schemas
 */
class JobPosting implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var DateTime
	 */
	protected $datePosted;

	/**
	 * @var Organization
	 */
	protected $hiringOrganization;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var Address
	 */
	protected $jobLocation;

	/**
	 * @var Price|null
	 */
	protected $baseSalary;

	/**
	 * @var string|null
	 */
	protected $employmentType;

	/**
	 * @var DateTime|null
	 */
	protected $validThrough;

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return JobPosting
	 */
	public function setContext(string $context): JobPosting
	{
		$this->context = $context;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return JobPosting
	 */
	public function setTitle(string $title): JobPosting
	{
		$this->title = $title;
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
	 * @return JobPosting
	 */
	public function setName(string $name): JobPosting
	{
		$this->name = $name;
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
	 * @return JobPosting
	 */
	public function setDatePosted(DateTime $datePosted): JobPosting
	{
		$this->datePosted = $datePosted;
		return $this;
	}

	/**
	 * @return Organization
	 */
	public function getHiringOrganization(): Organization
	{
		return $this->hiringOrganization;
	}

	/**
	 * @param Organization $hiringOrganization
	 * @return JobPosting
	 */
	public function setHiringOrganization(Organization $hiringOrganization): JobPosting
	{
		$this->hiringOrganization = $hiringOrganization;
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
	 * @return JobPosting
	 */
	public function setDescription(string $description): JobPosting
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return Address
	 */
	public function getJobLocation(): Address
	{
		return $this->jobLocation;
	}

	/**
	 * @param Address $jobLocation
	 * @return JobPosting
	 */
	public function setJobLocation(Address $jobLocation): JobPosting
	{
		$this->jobLocation = $jobLocation;
		return $this;
	}

	/**
	 * @return Price|null
	 */
	public function getBaseSalary(): ?Price
	{
		return $this->baseSalary;
	}

	/**
	 * @param Price|null $baseSalary
	 * @return JobPosting
	 */
	public function setBaseSalary(?Price $baseSalary): JobPosting
	{
		$this->baseSalary = $baseSalary;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getEmploymentType(): ?string
	{
		return $this->employmentType;
	}

	/**
	 * @param string|null $employmentType
	 * @return JobPosting
	 */
	public function setEmploymentType(?string $employmentType): JobPosting
	{
		$this->employmentType = $employmentType;
		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getValidThrough(): ?DateTime
	{
		return $this->validThrough;
	}

	/**
	 * @param DateTime|null $validThrough
	 * @return JobPosting
	 */
	public function setValidThrough(?DateTime $validThrough): JobPosting
	{
		$this->validThrough = $validThrough;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$jobPosting = [
			'@context' => $this->getContext(),
			'@type' => 'JobPosting',
			'name' => $this->getName(),
			'datePosted' => $this->getDatePosted()->format('Y-m-d'),
			'description' => $this->getDescription(),
			'hiringOrganization' => $this->hiringOrganization->asArray(),
			'title' => $this->getTitle()
		];
		if ($this->getJobLocation()) {
			$jobPosting['jobLocation']['address'] = $this->getJobLocation()->asArray();
			unset($jobPosting['jobLocation']['address']['@type']);
		}
		if ($this->getBaseSalary()) {
			$jobPosting['baseSalary'] = $this->getBaseSalary()->format();
		}
		if ($this->getEmploymentType()) {
			$jobPosting['employmentType'] = $this->getEmploymentType();
		}
		if ($this->getValidThrough()) {
			$jobPosting['validThrough'] = $this->getValidThrough()->format('Y-m-d');
		}

		return $jobPosting;
	}
}
