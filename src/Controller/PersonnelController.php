<?php
// src/Controller/PersonnelController.php
namespace App\Controller;

use App\Entity\Personnel;
use App\Form\PersonnelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelController extends AbstractController
{
    #[Route('/personnel/new', name: 'personnel_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $personnel = new Personnel();
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($personnel);
            $entityManager->flush();
            return $this->redirectToRoute('personnel_success');
        }

        return $this->render('personnel/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
