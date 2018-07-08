<?php

namespace SoapBox\Formatter\Test\Parsers;

use SoapBox\Formatter\Parsers\CsvParser;
use SoapBox\Formatter\Test\TestCase;

class CsvEnclosureTest extends TestCase
{
    private $simpleCsv = '"foo";"boo"
    "bar";"far"';


    public function testItAllowsUserToSetEnclosureParamater()
    {
        $parser = new CsvParser('', ';', '"');

        $this->assertEquals($parser->getEnclosure(), '"');
    }

    public function testItFallbacksToDefaultEnclosureIfNotSet()
    {
        $parser =  new CsvParser('', ';');

        $this->assertEquals($parser->getEnclosure(), '|');
    }
    
    public function testToArrayReturnsCsvArrayRepresentation()
    {
        $expected = [['foo' => 'bar', 'boo' => 'far']];
        $parser = new CsvParser($this->simpleCsv, ';', '"');

        $this->assertEquals($expected, $parser->toArray());
    }


    public function testToCsvFailsForDataWithOtherThanDefaultEnclosureAndParserEnclosureNotSet()
    {
        $expected = [['foo' => 'bar', 'boo' => 'far']];
        $parser = new CsvParser($this->simpleCsv, ';');

        $this->assertNotEquals($expected, $parser->toArray());
    }

    public function testToJsonReturnsJsonRepresentationOfNamedArray()
    {
        $expected = '[{"foo":"bar","boo":"far"}]';
        $parser = new CsvParser($this->simpleCsv, ';', '"');

        $this->assertEquals($expected, $parser->toJson());
    }

    public function testToJsonFailsForDataWithOtherThanDefaultEnclosureAndParserEnclosureNotSet()
   {
        $expected = '[{"foo":"bar","boo":"far"}]';
        $parser = new CsvParser($this->simpleCsv, ';');

        $this->assertNotEquals($expected, $parser->toJson());
    }
}