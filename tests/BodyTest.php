<?php

namespace Tests;

use Mockery;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Myerscode\Laravel\ApiResponse\Body;
use PHPUnit\Framework\Attributes\DataProvider;

class BodyTest extends TestCase
{

    public static function provider(): array
    {
        return [
            [200, [], [], []],
        ];
    }

    /**
     * @param $status
     * @param $data
     * @param $messages
     * @param $meta
     *
     * @return void
     */
    #[DataProvider('provider')]
    public function testResponsePropertiesAreSet($status, $data, $messages, $meta): void
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertEquals($status, $body->getStatus());
        $this->assertEquals($data, $body->getData());
        $this->assertEquals($messages, $body->getMessages());
        $this->assertEquals($meta, $body->getMeta());
    }

    public function testAddMessageToBody(): void
    {
        $body = new Body();
        $body->addMessage(('Hello World'));

        $this->assertEquals(['Hello World'], $body->getMessages());
    }

    #[DataProvider('provider')]
    public function testBodyConvertedToJson($status, $data, $messages, $meta): void
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertJson($body->toJson());
    }

    public function testInvalidJsonThrowsError(): void
    {
        $this->expectException(JsonEncodingException::class);

        $body = Mockery::mock(Body::class)->makePartial();

        $body->shouldReceive('toArray')
            ->andReturn([NAN]);

        $body->toJson();
    }
}
