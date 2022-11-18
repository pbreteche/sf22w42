<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\Translation\t;

#[Route('/xhr')]
class XhrController extends AbstractController
{
    #[Route('/hello', methods: 'GET')]
    public function helloWorld(): Response
    {
        $message = t('demo.translatable_object', ['adjective' => 'magnifique']);
        usleep(500);
        return $this->render('xhr/hello_world.html.twig', [
            'message' => $message,
        ]);
    }
}