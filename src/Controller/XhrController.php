<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/xhr')]
class XhrController extends AbstractController
{
    #[Route('/hello', methods: 'GET')]
    public function helloWorld(): Response
    {
        usleep(500);
        return $this->render('xhr/hello_world.html.twig');
    }
}