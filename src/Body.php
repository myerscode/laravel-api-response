<?php

declare(strict_types=1);

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Support\Collection;

/**
 * @implements Arrayable<string, mixed>
 */
class Body implements Arrayable, Jsonable
{
    /** @var array<array-key, mixed> */
    private array $data;

    /** @var array<int, string> */
    private array $messages;

    /** @var array<array-key, mixed> */
    private array $meta;

    private int $status;

    /**
     * @param  array<array-key, mixed>|Collection<array-key, mixed>  $data
     * @param  array<array-key, mixed>|Collection<array-key, mixed>  $meta
     * @param  array<int, string>|Collection<int, string>  $messages
     */
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

    public function addMessage(string $message): self
    {
        $this->messages[] = $message;

        return $this;
    }

    /** @return array<array-key, mixed> */
    public function getData(): array
    {
        return $this->data;
    }

    /** @return array<int, string> */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /** @return array<array-key, mixed> */
    public function getMeta(): array
    {
        return $this->meta;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    /** @param  array<array-key, mixed>|Collection<array-key, mixed>  $data */
    public function setData(array|Collection $data): self
    {
        $this->data = $data instanceof Collection ? $data->toArray() : $data;

        return $this;
    }

    /** @param  array<int, string>|Collection<int, string>  $messages */
    public function setMessages(array|Collection $messages): self
    {
        $this->messages = $messages instanceof Collection ? $messages->toArray() : $messages;

        return $this;
    }

    /** @param  array<array-key, mixed>|Collection<array-key, mixed>  $meta */
    public function setMeta(array|Collection $meta): self
    {
        $this->meta = $meta instanceof Collection ? $meta->toArray() : $meta;

        return $this;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /** @return array{status: int, data: array<array-key, mixed>, meta: array<array-key, mixed>, messages: array<int, string>} */
    public function toArray(): array
    {
        return [
            'status' => $this->getStatus(),
            'data' => $this->getData(),
            'meta' => $this->getMeta(),
            'messages' => $this->getMessages(),
        ];
    }

    public function toJson($options = 0): string
    {
        $json = json_encode($this->toArray(), $options);

        if ($json === false || JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonEncodingException();
        }

        return $json;
    }
}
