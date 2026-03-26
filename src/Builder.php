<?php

declare(strict_types=1);

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Builder implements Responsable
{
    protected Body $body;

    protected array $headers = [];

    public function __construct()
    {
        $this->fresh();
    }

    public function fresh(): self
    {
        $this->body = new Body();

        return $this;
    }

    public function body(): Body
    {
        return $this->body;
    }

    public function data(array $data): self
    {
        $this->body->setData($data);

        return $this;
    }

    public function meta(array $meta): self
    {
        $this->body->setMeta($meta);

        return $this;
    }

    public function message(string $messages): self
    {
        $this->body->addMessage($messages);

        return $this;
    }

    public function messages(array $messages): self
    {
        $this->body->setMessages($messages);

        return $this;
    }

    public function status(int $status): self
    {
        $this->body->setStatus($status);

        return $this;
    }

    public function header(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    public function headers(array $headers): self
    {
        $this->headers = array_filter($headers);

        return $this;
    }

    public function respond(): JsonResponse
    {
        return response()->json($this->body->toArray(), $this->body->getStatus(), $this->headers);
    }

    public function toResponse($request): JsonResponse
    {
        return $this->respond();
    }
}
