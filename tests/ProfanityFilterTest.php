<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use RyanJMiranda\ContentModerator\StringFilters\ProfanityFilter;
use RyanJMiranda\ContentModerator\Dictionaries\ProfanityDictionary;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use RyanJMiranda\ContentModerator\Dictionaries\StrictProfanityDictionary;

#[CoversClass(ProfanityFilter::class)]
#[UsesClass(ProfanityDictionary::class)]
#[UsesClass(StrictProfanityDictionary::class)]

class ProfanityFilterTest extends TestCase
{
    public function testProfanityFilterReplacesBadWords()
    {
        $dictionary = new ProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "This is a fucking example.";
        $result = $filter->apply($content);

        $this->assertEquals("This is a ******* example.", $result);
    }

    public function testCustomReplacementCharacter()
    {
        $dictionary = new ProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);
        $filter->setReplacementCharacter('#');

        $content = "This is a fucking example.";
        $result = $filter->apply($content);

        $this->assertEquals("This is a ####### example.", $result);
    }

    public function testCaseInsensitiveReplacement()
    {
        $dictionary = new ProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "This is a FuCkInG example.";
        $result = $filter->apply($content);

        $this->assertEquals("This is a ******* example.", $result);
    }

    public function testReplacementOfMultipleMatchingWords()
    {
        $dictionary = new ProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "This is a fucking tittyfuck cocksucker example.";
        $result = $filter->apply($content);

        $this->assertEquals("This is a ******* ********* ********** example.", $result);
    }

    public function testStrictProfanityFilterReplacesBadWords()
    {
        $dictionary = new StrictProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "This is an abortion.";
        $result = $filter->apply($content);

        $this->assertEquals("This is an ********.", $result);
    }

    public function testStrictCustomReplacementCharacter()
    {
        $dictionary = new StrictProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);
        $filter->setReplacementCharacter('#');

        $content = "This is an abortion.";
        $result = $filter->apply($content);

        $this->assertEquals("This is an ########.", $result);
    }

    public function testStrictCaseInsensitiveReplacement()
    {
        $dictionary = new StrictProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "Get off of my ARSE!";
        $result = $filter->apply($content);

        $this->assertEquals("Get off of my ****!", $result);
    }

    public function testStrictReplacementOfMultipleMatchingWords()
    {
        $dictionary = new StrictProfanityDictionary();
        $filter = new ProfanityFilter($dictionary);

        $content = "Remove every asscowboy and assclown, fucker";
        $result = $filter->apply($content);

        $this->assertEquals("Remove every ********* and ********, ******", $result);
    }
}