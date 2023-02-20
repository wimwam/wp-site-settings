<?php

namespace Duracom\JsonLd\DataFormats;

use DateTime;

class BlogPost
{
	/**
	 * @var string
	 */
	private $headline;

	/**
	 * @var string|null
	 */
	private $alterinativeHeadline;

	/**
	 * @var string
	 */
	private $image;

	/**
	 * @var array
	 */
	private $keyWords;

	/**
	 * @var string|null
	 */
	private $description;

	/**
	 * @var string|null
	 */
	private $articleBody;

	/**
	 * @var int|null
	 */
	private $wordCount;

	/**
	 * @var DateTime
	 */
	private $dateCreated;

	/**
	 * @var DateTime
	 */
	private $dateModified;

	/**
	 * @var DateTime
	 */
	private $datePublished;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @return string
	 */
	public function getHeadline(): string
	{
		return $this->headline;
	}

	/**
	 * @param string $headline
	 * @return BlogPost
	 */
	public function setHeadline(string $headline): BlogPost
	{
		$this->headline = $headline;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAlterinativeHeadline(): ?string
	{
		return $this->alterinativeHeadline;
	}

	/**
	 * @param string|null $alterinativeHeadline
	 * @return BlogPost
	 */
	public function setAlterinativeHeadline(?string $alterinativeHeadline): BlogPost
	{
		$this->alterinativeHeadline = $alterinativeHeadline;
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
	 * @return BlogPost
	 */
	public function setImage(string $image): BlogPost
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getKeyWords(): array
	{
		return $this->keyWords;
	}

	/**
	 * @param array $keyWords
	 * @return BlogPost
	 */
	public function setKeyWords(array $keyWords): BlogPost
	{
		$this->keyWords = $keyWords;
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
	 * @return BlogPost
	 */
	public function setDescription(?string $description): BlogPost
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
	 * @return BlogPost
	 */
	public function setArticleBody(?string $articleBody): BlogPost
	{
		$this->articleBody = $articleBody;
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
	 * @return BlogPost
	 */
	public function setWordCount(?int $wordCount): BlogPost
	{
		$this->wordCount = $wordCount;
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
	 * @return BlogPost
	 */
	public function setDateCreated(DateTime $dateCreated): BlogPost
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
	 * @return BlogPost
	 */
	public function setDateModified(DateTime $dateModified): BlogPost
	{
		$this->dateModified = $dateModified;
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
	 * @return BlogPost
	 */
	public function setDatePublished(DateTime $datePublished): BlogPost
	{
		$this->datePublished = $datePublished;
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
	 * @return BlogPost
	 */
	public function setUrl(string $url): BlogPost
	{
		$this->url = $url;
		return $this;
	}

}
