<?php

namespace App\Tests\MessageHandler;

use App\MessageHandler\SendEmailMessageHandler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use Symfony\Component\Mime\Message;

class SendEmailMessageHandlerTest extends KernelTestCase
{
    public function testInvoke()
    {
        static::bootKernel();

        $container = static::getContainer();
        $instance = $container->get(SendEmailMessageHandler::class);

        $result = $instance(new SendEmailMessage(new Message()));

        $this->assertEquals('success', $result, 'Le résultat doit être "success".');
    }
}