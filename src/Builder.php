<?php

namespace Myerscode\Laravel\ApiResponse;

use Illuminate\Contracts\Support\Responsable;

class Builder implements Responsable
{
    /**
     * @var Body
     */
    protected $body;

    /**
     * @var array
     */
    protected $headers;

    public function __construct()
    {
        $this->fresh();
    }

    /**
     * Reset response body, headers and options
     *
     * @return Builder
     */
    public function fresh(): Builder
    {
        $this->body = new Body();
        $this->headers = [];

        return $this;
    }

    /**
     * Return the set response body
     *
     * @return Body
     */
    public function body()
    {
        return $this->body;
    }

    /**
     * Set the api data response
     *
     * @param array $data
     * @return Builder
     */
    public function data(array $data): Builder
    {
        $this->body->setData($data);

        return $this;
    }

    /**
     * Set meta data of current api response
     *
     * @param array $meta
     * @return Builder
     */
    public function meta(array $meta): Builder
    {
        $this->body->setMeta($meta);

        return $this;
    }

    /**
     * Add a response message
     *
     * @param string $messages
     * @return Builder
     */
    public function message(string $messages): Builder
    {
        $this->body->addMessage($messages);

        return $this;
    }

    /**
     * Set collection of response messages
     *
     * @param array $messages
     * @return Builder
     */
    public function messages(array $messages): Builder
    {
        $this->body->setMessages($messages);

        return $this;
    }

    /**
     * Set HTTP status of response
     *
     * @param int $status
     * @return Builder
     */
    public function status(int $status): Builder
    {
        $this->body->setStatus($status);

        return $this;
    }

    /**
     * Set a HTTP header value to be returned with the response
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function header(string $key, string $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * Set headers that should be returned with the response
     *
     * @param array $headers
     * @return $this
     */
    public function headers(array $headers)
    {
        $this->headers = array_filter($headers);

        return $this;
    }

    /**
     * Return a json response using the api body
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond()
    {
        return response()->json($this->body->toArray(), $this->body->getStatus(), $this->headers);
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return $this->respond();
    }
}
