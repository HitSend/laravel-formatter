<?php namespace wgerges\Formatter\Test\Parsers;

use wgerges\Formatter\Test\TestCase;
use wgerges\Formatter\Parsers\Parser;
use wgerges\Formatter\Parsers\XmlParser;

class XmlParserTest extends TestCase {

	public function testXmlParserIsInstanceOfParserInterface() {
		$parser = new XmlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfXmlObject() {
		$expected = ['foo' => 'bar'];
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testtoJsonReturnsJsonRepresentationOfXmlObject() {
		$expected = '{"foo":"bar"}';
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toJson());
	}
}
