<?php

namespace App\Controller;

use App\Form\TimeSlotType;
use App\Utils\DataType\TimeSlot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route("/form/custom", methods: ['GET', 'POST'])]
    public function customType(Request $request): Response
    {
        $data = [
            'title' => '',
            'time_slot' => new TimeSlot(),

        ];

        $form = $this->createFormBuilder($data)
            ->add('title')
            ->add('time_slot', TimeSlotType::class)
            ->getForm();

        $form->handleRequest($request);

        return $this->renderForm('form/custom.html.twig', [
            'form' => $form,
        ]);
    }
}
