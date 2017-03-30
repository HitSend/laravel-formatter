<?php namespace wgerges\Formatter\Test\Parsers;

use wgerges\Formatter\Test\TestCase;
use wgerges\Formatter\Parsers\Parser;
use wgerges\Formatter\Parsers\JsonParser;

class JsonParserTest extends TestCase {

	public function testJsonParserIsInstanceOfParserInterface() {
		$parser = new JsonParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresentationOfJsonObject() {
		$expected = ['foo' => 'bar'];
		$parser = new JsonParser('{"foo": "bar"}');
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testtoJsonReturnsArrayRepresentationOfArray() {
		$expected = '[0,1,2]';
		$parser = new JsonParser($expected);
		$this->assertEquals($expected, $parser->toJson());
	}

	public function testtoJsonReturnsJsonRepresentationOfNamedArray() {
		$expected = '{"foo":"bar"}';
		$parser = new JsonParser($expected);
		$this->assertEquals($expected, $parser->toJson());
	}
}
