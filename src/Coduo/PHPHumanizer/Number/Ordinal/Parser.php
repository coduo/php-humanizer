<?php

namespace Coduo\PHPHumanizer\Number\Ordinal;

//use Coduo\PHPHumanizer\Number\Ordinal\Builder;

class Parser
{

	private $builder;

	private $locale;

	public function __construct(Builder $builder, $locale = 'en')
	{
		$this->builder = $builder;
		$this->locale = $locale;
	}

	public function parse()
	{
		return simplexml_load_file($this->builder->build($this->locale)) or die("Error: Cannot create object");
	}
}
?>