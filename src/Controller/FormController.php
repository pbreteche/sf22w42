<?php

namespace App\Controller;

use App\Utils\DataType\TimeSlot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route("/form/custom")]
    public function customType(): Response
    {
        $data = [
            'title' => '',
            'time_slot' => new TimeSlot(),

        ];

        $form = $this->createFormBuilder($data)
            ->add('title')
            ->add('time_slot')
            ->getForm();


        return $this->renderForm('form/custom.html.twig', [
            'form' => $form,
        ]);
    }
}
