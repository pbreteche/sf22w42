<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
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
}