<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recettes;

class RecettePersonnaliseController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
          $this->entityManager = $entityManager;
    }
    



    #[Route('/recette/personnalise', name: 'app_recette_personnalise')]
    public function index(): Response
    {
       
       

        $recettes_id=$_GET['id'];       
        $recettes=$this->entityManager->getRepository(Recettes::class)->findOnerecettePerPatient($recettes_id);
        $user=$this->getUser();
        $id_recette=$_GET['id'];
        $id_user=$user->getId();
        $allergenes=$this->entityManager->getRepository(Recettes::class)->findAllRegimeRecette_Allergenes($id_recette, $id_user);






        return $this->render('recette_personnalise/index.html.twig', [
            'recettes' =>$recettes,
            'allergenes'=>$allergenes
        ]);
    }
}
