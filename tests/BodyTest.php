<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Iterator;
use Myerscode\Laravel\ApiResponse\Body;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\DataProvider;

final class BodyTest extends TestCase
{

    public static function provider(): Iterator
    {
        yield [200, [], [], []];
    }

    #[DataProvider('provider')]
    public function testResponsePropertiesAreSet(int $status, array $data, array $messages, array $meta): void
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertSame($status, $body->getStatus());
        $this->assertEquals($data, $body->getData());
        $this->assertEquals($messages, $body->getMessages());
        $this->assertEquals($meta, $body->getMeta());
    }

    public function testAddMessageToBody(): void
    {
        $body = new Body();
        $body->addMessage(('Hello World'));

        $this->assertSame(['Hello World'], $body->getMessages());
    }

    #[DataProvider('provider')]
    public function testBodyConvertedToJson(int $status, array $data, array $messages, array $meta): void
    {
        $body = new Body();
        $body->setStatus(($status))->setData($data)->setMessages($messages)->setMeta($meta);

        $this->assertJson($body->toJson());
    }

    #[AllowMockObjectsWithoutExpectations]
    public function testInvalidJsonThrowsError(): void
    {
        $this->expectException(JsonEncodingException::class);

        $body = $this->createPartialMock(Body::class, ['toArray']);

        $body->method('toArray')
            ->willReturn([NAN]);

        $body->toJson();
    }
}
