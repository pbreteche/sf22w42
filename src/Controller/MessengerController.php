<?php

namespace App\Controller;

use App\Message\CustomMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messenger')]
class MessengerController extends AbstractController
{
    #[Route('/mail')]
    public function sendMail(MailerInterface $mailer)
    {
        $email = new Email();
        $email
            ->to('test@example.com')
            ->from('sender@example.com')
            ->subject('test subject')
            ->text('email content')
        ;

        $mailer->send($email);

        return $this->render('messenger/mail.html.twig');
    }

    #[Route('/bus')]
    public function custom(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new CustomMessage('Hello'));

        return $this->render('messenger/custom.html.twig');
    }
}
