<?php

namespace Tests;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Myerscode\Laravel\ApiResponse\Body;

class BodyTest extends TestCase
{

    public function provider()
    {
        return [
            [200, [], [], []],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testResponsePropertiesAreSet($status, $data, $messages, $meta)
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertEquals($status, $body->getStatus());
        $this->assertEquals($data, $body->getData());
        $this->assertEquals($messages, $body->getMessages());
        $this->assertEquals($meta, $body->getMeta());
    }

    public function testAddMessageToBody()
    {
        $body = new Body();
        $body->addMessage(('Hello World'));

        $this->assertEquals(['Hello World'], $body->getMessages());
    }

    /**
     * @dataProvider provider
     */
    public function testBodyConvertedToJson($status, $data, $messages, $meta)
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertJson($body->toJson());
    }

    public function testInvalidJsonThrowsError()
    {
        $this->expectException(JsonEncodingException::class);

        $body = \Mockery::mock(Body::class)->makePartial();

        $body->shouldReceive('toArray')
            ->andReturn([NAN]);

        $body->toJson();
    }
}