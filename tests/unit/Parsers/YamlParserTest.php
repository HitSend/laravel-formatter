<?php namespace wgerges\Formatter\Test\Parsers;

use wgerges\Formatter\Test\TestCase;
use wgerges\Formatter\Parsers\Parser;
use wgerges\Formatter\Parsers\YamlParser;
use wgerges\Formatter\Parsers\XmlParser;

class YamlParserTest extends TestCase {

	public function testYamlParserIsInstanceOfParserInterface() {
		$parser = new YamlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfYamlObject() {
		$expected = ['foo' => 'bar'];
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$x = new YamlParser($parser->toYaml());
		$this->assertEquals($expected, $x->toArray());
	}

}
