<?php

namespace spec\Coduo\PHPHumanizer\Collection;

use Coduo\PHPHumanizer\Collection\Formatter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Translation\TranslatorInterface;

class OxfordSpec extends ObjectBehavior
{
    private $formatter;

    public function let(TranslatorInterface $translator)
    {
        $this->formatter = new Formatter(
            $translator->getWrappedObject()
        );
        $this->beConstructedWith($this->formatter);
    }
    function it_returns_empty_string_when_collection_is_empty()
    {
        $this->format(array())->shouldReturn('');
    }

    function it_returns_collection_item_string_when_collection_has_one_element()
    {
        $this->format(array(new CollectionItem("Michal")))->shouldReturn('Michal');
    }
}

class CollectionItem
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
