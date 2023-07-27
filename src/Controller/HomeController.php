<?php

namespace App\Controller;

use App\Entity\Recettes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
         $this->entityManager=$entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
                $recettes=$this->entityManager->getRepository(Recettes::class)->findWithPatient();
            //   dd($recettes);
                return $this->render('home/index.html.twig',[
                    'recettes'=>$recettes
                ]);
    }


    #[Route('/home/detail/recettes/{id}', name: 'home_controller_detail_recettes')]
    public function Show_detail($id): Response
    {        
        $recettes=$this->entityManager->getRepository(Recettes::class)->findOneById($id);
      //   dd($recettes);
        return $this->render('home/homeDetail.html.twig',[
            'recettes'=>$recettes
        ]);
    }
}
