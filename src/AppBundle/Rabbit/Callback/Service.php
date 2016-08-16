<?php

namespace AppBundle\Rabbit\Callback;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Service implements ConsumerInterface
{
    public function execute(AMQPMessage $msg)
    {
        var_dump(unserialize($msg->body));
    }
}
