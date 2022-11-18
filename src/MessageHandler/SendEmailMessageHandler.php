<?php

namespace App\MessageHandler;

use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

#[AsMessageHandler(priority: -10 )]
class SendEmailMessageHandler implements MessageHandlerInterface
{
    public function __construct() {}

    public function __invoke(SendEmailMessage $message)
    {
        /** @var Email $email */
        $email = $message->getMessage();

        return 'success';
    }
}
