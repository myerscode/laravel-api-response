<?php

declare(strict_types=1);

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class Builder implements Responsable
{
    protected Body $body;

    /** @var array<string, string> */
    protected array $headers = [];

    public function __construct()
    {
        $this->fresh();
    }

    public function body(): Body
    {
        return $this->body;
    }

    /** @param  array<array-key, mixed>  $data */
    public function data(array $data): self
    {
        $this->body->setData($data);

        return $this;
    }

    public function fresh(): self
    {
        $this->body = new Body();

        return $this;
    }

    public function header(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /** @param  array<string, string>  $headers */
    public function headers(array $headers): self
    {
        $this->headers = array_filter($headers);

        return $this;
    }

    public function message(string $messages): self
    {
        $this->body->addMessage($messages);

        return $this;
    }

    /** @param  array<int, string>  $messages */
    public function messages(array $messages): self
    {
        $this->body->setMessages($messages);

        return $this;
    }

    /** @param  array<array-key, mixed>  $meta */
    public function meta(array $meta): self
    {
        $this->body->setMeta($meta);

        return $this;
    }

    public function respond(): JsonResponse
    {
        return response()->json($this->body->toArray(), $this->body->getStatus(), $this->headers);
    }

    public function status(int $status): self
    {
        $this->body->setStatus($status);

        return $this;
    }

    public function toResponse($request): JsonResponse
    {
        return $this->respond();
    }
}
