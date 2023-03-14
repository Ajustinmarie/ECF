<?php

namespace App\Controller;

use App\Entity\Allergenes;
use App\Entity\Recettes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
          $this->entityManager = $entityManager;
    }


    #[Route('/account', name: 'account')]
    public function index(): Response
    {
        
    $recettes=$this->entityManager->getRepository(Recettes::class)->findWithAllergenes();

    dd($recettes);
  //  $recettes=$this->entityManager->getRepository(Recettes::class)->findWithPersonalise();

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'recettes'=> $recettes,
        ]);
    }
}
