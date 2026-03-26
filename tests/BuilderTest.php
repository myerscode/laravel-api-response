<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Testing\TestResponse;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class BuilderTest extends TestCase
{
    public static function provider(): Iterator
    {
        yield [200, [], [], []];
    }

    public function testAddingHeaderToResponse(): void
    {
        $testResponse = new TestResponse(api()->header('foo', 'bar')->respond());

        $testResponse->assertHeader('foo');
    }

    public function testAddingMultipleHeaderToResponse(): void
    {
        $testResponse = new TestResponse(api()->headers(['foo' => 'bar', 'hello' => 'world', 'invalid header'])->respond());

        $testResponse->assertHeader('foo');
        $testResponse->assertHeader('hello');
        $testResponse->assertHeaderMissing('invalid header');
    }

    public function testAddMessageToResponse(): void
    {
        $builder = api()->message('Hello World');

        $this->assertEquals(['Hello World'], $builder->body()->getMessages());
    }


    #[DataProvider('provider')]
    public function testResponsePropertiesAreSet(int $status, array $data, array $messages, array $meta): void
    {
        $builder = api()->status($status)->data($data)->messages($messages)->meta($meta);

        $this->assertEquals($status, $builder->body()->getStatus());
        $this->assertEquals($data, $builder->body()->getData());
        $this->assertEquals($messages, $builder->body()->getMessages());
        $this->assertEquals($meta, $builder->body()->getMeta());
    }
}
