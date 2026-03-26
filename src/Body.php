<?php

declare(strict_types=1);

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Support\Collection;

class Body implements Arrayable, Jsonable
{
    private Collection|array $data;

    private Collection|array $meta;

    private Collection|array $messages;

    private int $status;

    public function __construct(
        array|Collection $data = [],
        array|Collection $meta = [],
        array|Collection $messages = [],
        int $status = 200,
    ) {
        $this->setData($data);
        $this->setMeta($meta);
        $this->setMessages($messages);
        $this->setStatus($status);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array|Collection $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(array|Collection $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    public function addMessage(string $message): self
    {
        $this->messages[] = $message;

        return $this;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function setMeta(array|Collection $meta): self
    {
        $this->meta = $meta;

        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function toJson($options = 0): string
    {
        $json = json_encode($this->toArray(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonEncodingException();
        }

        return $json;
    }

    public function toArray(): array
    {
        return [
            'status' => $this->getStatus(),
            'data' => $this->getData(),
            'meta' => $this->getMeta(),
            'messages' => $this->getMessages(),
        ];
    }
}
