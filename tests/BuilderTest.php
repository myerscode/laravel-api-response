<?php

namespace Tests;

class BuilderTest extends TestCase
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
        $builder = api()->status($status)->data($data)->messages($messages)->meta($meta);

        $this->assertEquals($status, $builder->body()->getStatus());
        $this->assertEquals($data, $builder->body()->getData());
        $this->assertEquals($messages, $builder->body()->getMessages());
        $this->assertEquals($meta, $builder->body()->getMeta());
    }

    public function testAddMessageToResponse()
    {
        $builder = api()->message('Hello World');

        $this->assertEquals(['Hello World'], $builder->body()->getMessages());
    }

}