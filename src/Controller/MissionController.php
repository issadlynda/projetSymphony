<?php

// src/Controller/MissionController.php
namespace App\Controller;

use App\Entity\Mission;
use App\Form\MissionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{
    #[Route('/mission/new', name: 'mission_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mission = new Mission();
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mission);
            $entityManager->flush();
            return $this->redirectToRoute('mission_success');
        }

        return $this->render('mission/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
