<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Myerscode\Laravel\ApiResponse\Builder;

final class RespondTest extends TestCase
{
    public function testHelperMakesBuilder(): void
    {
        $this->assertInstanceOf(Builder::class, api());
    }

    public function testRespondCreatesJsonResponse(): void
    {
        $this->assertInstanceOf(JsonResponse::class, api()->respond());
        $this->assertInstanceOf(JsonResponse::class, api()->toResponse(new Request()));
    }



}
