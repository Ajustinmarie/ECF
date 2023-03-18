<?php

namespace App\Controller;

use App\Entity\Recettes;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\app;

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

  //   $recettes=$this->entityManager->getRepository(Recettes::class)->findWithPersonalise();

        /* Allergenes user_allergenes */
      //   $allergenes=$this->entityManager->getRepository(Recettes::class)->findAllAllergenesPerPatient(10);

         /* regimes  user_regime */
         $user=$this->getUser();
         $regimes=$this->entityManager->getRepository(Recettes::class)->findAllregimePerPatient($user->getId());        // dd($regimes);


       

       // $liste_allergenes=array_keys($allergenes);         
       //  $definitive_allergenes=implode(',',$liste_allergenes); 
        


        /* recette allergenes recettes_allergenes */
      //  $recette_allergenes=$this->entityManager->getRepository(Recettes::class)->findAllRegimeRecette_Allergenes(1,3);
       // dd($recette_allergenes);


     /* recette regime recettes_regime */
     // $regime='1,3';
     //   $recette_regime=$this->entityManager->getRepository(Recettes::class)->findAllRegimeRecette($regime);


       // dd($recette_regime);

    //   dd($regimes);
        



       //  $liste_allergenes=array_keys($allergenes);         
       //  $definitive_allergenes=implode(',',$liste_allergenes); 





        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'regimes'=> $regimes ,  
        ]);
    }
}
