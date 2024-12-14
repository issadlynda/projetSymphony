<?php 

// src/Controller/FreelanceController.php
namespace App\Controller;

use App\Entity\Freelance;
use App\Form\FreelanceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FreelanceController extends AbstractController
{
    #[Route('/freelance/new', name: 'freelance_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $freelance = new Freelance();
        $form = $this->createForm(FreelanceType::class, $freelance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($freelance);
            $entityManager->flush();
            return $this->redirectToRoute('freelance_success');
        }

        return $this->render('freelance/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
