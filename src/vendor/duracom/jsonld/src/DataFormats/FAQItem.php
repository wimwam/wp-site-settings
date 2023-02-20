<?php

namespace Duracom\JsonLd\DataFormats;

class FAQItem
{
	/**
	 * @var string
	 */
	private $question;

	/**
	 * @var string
	 */
	private $answer;

	/**
	 * @return string
	 */
	public function getQuestion(): string
	{
		return $this->question;
	}

	/**
	 * @param string $question
	 * @return FAQItem
	 */
	public function setQuestion(string $question): FAQItem
	{
		$this->question = $question;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAnswer(): string
	{
		return $this->answer;
	}

	/**
	 * @param string $answer
	 * @return FAQItem
	 */
	public function setAnswer(string $answer): FAQItem
	{
		$this->answer = $answer;
		return $this;
	}
}