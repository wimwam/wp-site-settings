<?php

namespace Duracom\JsonLd\Schemas;

use DateTime;
use Duracom\JsonLd\Interfaces\SchemaInterface;

/**
 * Class BlogPosting
 * @package Duracom\JsonLd\Schemas
 */
class BlogPosting implements SchemaInterface
{
	/**
	 * @var string
	 */
	protected $context = 'https://schema.org';

	/**
	 * @var string
	 */
	protected $type = 'BlogPosting';

	/**
	 * @var string
	 */
	protected $headline;

	/**
	 * @var string|null
	 */
	protected $alternativeHeadline;

	/**
	 * @var string
	 */
	protected $image;

	/**
	 * @var string|null
	 */
	protected $award;

	/**
	 * @var SchemaInterface|null
	 */
	protected $editor;

	/**
	 * @var string
	 */
	protected $genre;

	/**
	 * @var string
	 */
	protected $keywords;

	/**
	 * @var int|null
	 */
	protected $wordCount;

	/**
	 * @var SchemaInterface
	 */
	protected $publisher;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var DateTime
	 */
	protected $datePublished;

	/**
	 * @var DateTime
	 */
	protected $dateCreated;

	/**
	 * @var DateTime
	 */
	protected $dateModified;

	/**
	 * @var string|null
	 */
	protected $description;

	/**
	 * @var string|null
	 */
	protected $articleBody;

	/**
	 * @var MainEntity|null
	 */
	protected $mainEntityOfPage;

	/**
	 * @var SchemaInterface
	 */
	protected $author;

	/**
	 * @return string
	 */
	public function getContext(): string
	{
		return $this->context;
	}

	/**
	 * @param string $context
	 * @return BlogPosting
	 */
	public function setContext(string $context): BlogPosting
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
	 * @return BlogPosting
	 */
	public function setType(string $type): BlogPosting
	{
		$this->type = $type;
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
	 * @return BlogPosting
	 */
	public function setHeadline(string $headline): BlogPosting
	{
		$this->headline = $headline;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAlternativeHeadline(): ?string
	{
		return $this->alternativeHeadline;
	}

	/**
	 * @param string|null $alternativeHeadline
	 * @return BlogPosting
	 */
	public function setAlternativeHeadline(?string $alternativeHeadline): BlogPosting
	{
		$this->alternativeHeadline = $alternativeHeadline;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): string
	{
		return $this->image;
	}

	/**
	 * @param string $image
	 * @return BlogPosting
	 */
	public function setImage(string $image): BlogPosting
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAward(): ?string
	{
		return $this->award;
	}

	/**
	 * @param string|null $award
	 * @return BlogPosting
	 */
	public function setAward(?string $award): BlogPosting
	{
		$this->award = $award;
		return $this;
	}

	/**
	 * @return SchemaInterface|null
	 */
	public function getEditor(): ?SchemaInterface
	{
		return $this->editor;
	}

	/**
	 * @param SchemaInterface|null $editor
	 * @return BlogPosting
	 */
	public function setEditor(?SchemaInterface $editor): BlogPosting
	{
		$this->editor = $editor;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getGenre(): string
	{
		return $this->genre;
	}

	/**
	 * @param string $genre
	 * @return BlogPosting
	 */
	public function setGenre(string $genre): BlogPosting
	{
		$this->genre = $genre;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getKeywords(): string
	{
		return $this->keywords;
	}

	/**
	 * @param string $keywords
	 * @return BlogPosting
	 */
	public function setKeywords(string $keywords): BlogPosting
	{
		$this->keywords = $keywords;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getWordCount(): ?int
	{
		return $this->wordCount;
	}

	/**
	 * @param int|null $wordCount
	 * @return BlogPosting
	 */
	public function setWordCount(?int $wordCount): BlogPosting
	{
		$this->wordCount = $wordCount;
		return $this;
	}

	/**
	 * @return SchemaInterface
	 */
	public function getPublisher(): SchemaInterface
	{
		return $this->publisher;
	}

	/**
	 * @param SchemaInterface $publisher
	 * @return BlogPosting
	 */
	public function setPublisher(SchemaInterface $publisher): BlogPosting
	{
		$this->publisher = $publisher;
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
	 * @return BlogPosting
	 */
	public function setUrl(string $url): BlogPosting
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDatePublished(): DateTime
	{
		return $this->datePublished;
	}

	/**
	 * @param DateTime $datePublished
	 * @return BlogPosting
	 */
	public function setDatePublished(DateTime $datePublished): BlogPosting
	{
		$this->datePublished = $datePublished;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDateCreated(): DateTime
	{
		return $this->dateCreated;
	}

	/**
	 * @param DateTime $dateCreated
	 * @return BlogPosting
	 */
	public function setDateCreated(DateTime $dateCreated): BlogPosting
	{
		$this->dateCreated = $dateCreated;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getDateModified(): DateTime
	{
		return $this->dateModified;
	}

	/**
	 * @param DateTime $dateModified
	 * @return BlogPosting
	 */
	public function setDateModified(DateTime $dateModified): BlogPosting
	{
		$this->dateModified = $dateModified;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string|null $description
	 * @return BlogPosting
	 */
	public function setDescription(?string $description): BlogPosting
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getArticleBody(): ?string
	{
		return $this->articleBody;
	}

	/**
	 * @param string|null $articleBody
	 * @return BlogPosting
	 */
	public function setArticleBody(?string $articleBody): BlogPosting
	{
		$this->articleBody = $articleBody;
		return $this;
	}

	/**
	 * @return SchemaInterface
	 */
	public function getAuthor(): SchemaInterface
	{
		return $this->author;
	}

	/**
	 * @param SchemaInterface $author
	 * @return BlogPosting
	 */
	public function setAuthor(SchemaInterface $author): BlogPosting
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return MainEntity|null
	 */
	public function getMainEntityOfPage(): ?MainEntity
	{
		return $this->mainEntityOfPage;
	}

	/**
	 * @param MainEntity|null $mainEntityOfPage
	 * @return BlogPosting
	 */
	public function setMainEntityOfPage(?MainEntity $mainEntityOfPage): BlogPosting
	{
		$this->mainEntityOfPage = $mainEntityOfPage;
		return $this;
	}

	/**
	 * @return array
	 */
	public function asArray(): array
	{
		$blogPosting = [
			'@context' => $this->getContext(),
			'@type' => $this->getType(),
			'headline' => $this->getHeadline(),
			'image' => $this->getImage(),
			'genre' => $this->getGenre(),
			'keywords' => $this->getKeywords(),
			'url' => $this->getUrl(),
			'datePublished' => $this->getDatePublished()->format('Y-m-d'),
			'dateCreated' => $this->getDateCreated()->format('Y-m-d'),
			'dateModified' => $this->getDateModified()->format('Y-m-d'),
			'author' => $this->getAuthor()->asArray(),
			'publisher' => $this->getPublisher()->asArray(),
		];
		if ($this->getMainEntityOfPage()) {
			$blogPosting['mainEntityOfPage'] = $this->getMainEntityOfPage()->asArray();
		}
		if ($this->getWordCount()) {
			$blogPosting['wordcount'] = $this->getWordCount();
		}
		if ($this->getAlternativeHeadline()) {
			$blogPosting['alternativeHeadline'] = $this->getAlternativeHeadline();
		}
		if ($this->getAward()) {
			$blogPosting['award'] = $this->getAward();
		}
		if ($this->getEditor()) {
			$blogPosting['editor'] = $this->getEditor()->asArray();
		}
		if ($this->getDescription()) {
			$blogPosting['description'] = $this->getDescription();
		}
		if ($this->getArticleBody()) {
			$blogPosting['articleBody'] = $this->getArticleBody();
		}

		return $blogPosting;
	}
}
