<?php

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\JsonEncodingException;

class Body implements Arrayable, Jsonable
{

    /**
     * Collect of json data to return
     *
     * @var array
     */
    private $data;

    /**
     * Meta values of response
     *
     * @var array
     */
    private $meta;

    /**
     * Collection of messages
     *
     * @var array
     */
    private $messages;

    /**
     * Status code of the response
     *
     * @var int $status
     */
    private $status;

    public function __construct($data = [], $meta = [], $messages = [], int $status = 200)
    {
        $this->setData($data);
        $this->setMeta($meta);
        $this->setMessages($messages);
        $this->setStatus($status);
    }

    /**
     * @return mixed
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return Body
     */
    public function setData($data): Body
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     *
     * @return Body
     */
    public function setMessages(array $messages): Body
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return Body
     */
    public function addMessage($message): Body
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param mixed $meta
     *
     * @return Body
     */
    public function setMeta($meta): Body
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Body
     */
    public function setStatus(int $status): Body
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        $json = json_encode($this->toArray(), $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }

        return $json;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
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
