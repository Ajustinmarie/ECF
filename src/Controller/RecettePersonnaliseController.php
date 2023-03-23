<?php

namespace App\Controller;

use App\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recettes;
use App\Form\FormCommentairesType;
use Symfony\Component\HttpFoundation\Request;

class RecettePersonnaliseController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
          $this->entityManager = $entityManager;
    }
    



    #[Route('/recette/personnalise', name: 'app_recette_personnalise')]
    public function index(Request $request): Response
    {
       
       

        $recettes_id=$_GET['id'];       
        $recettes=$this->entityManager->getRepository(Recettes::class)->findOnerecettePerPatient($recettes_id);
        $user=$this->getUser();
        $id_recette=$_GET['id'];
        $id_user=$user->getId();
        $allergenes=$this->entityManager->getRepository(Recettes::class)->findAllRegimeRecette_Allergenes($id_recette, $id_user);

         $commentaires=new Commentaire();
         $form=$this->createForm(FormCommentairesType::class, $commentaires);

         $form->handlerequest($request);
        

         if($form->isSubmitted() && $form->isValid())
         {    
                $commentaires->setUserId($id_user);
                $commentaires->setRecetteId($id_recette);
                $products=$this->entityManager->persist($commentaires);
                $this->entityManager->flush();  
         }


     $commentaire_lectures=$this->entityManager->getRepository(Commentaire::class)->findCommentairesPerRecette($id_recette);


   

        return $this->render('recette_personnalise/index.html.twig', [
            'recettes' =>$recettes,
            'allergenes'=>$allergenes,
            'form'=>$form->createView(),
            'commentaire_lectures'=>$commentaire_lectures,
            'recettes_id'=>$recettes_id
        ]);
    }



         /*route utilisation de ajax */

        #[Route('/recette/personnalise/recharge', name: 'app_commentaire_recharge')]
        public function show(): Response
        {


            $user=$this->getUser();


            $id_recette=$_GET['id']; 
            $id_user=$user->getId();

            $commentaires=new Commentaire();
            $form=$this->createForm(FormCommentairesType::class, $commentaires);

         //   $form->handlerequest($request);
            

       /*
            if($form->isSubmitted() && $form->isValid())
            {    
                    $commentaires->setUserId($id_user);
                    $commentaires->setRecetteId($id_recette);
                    $products=$this->entityManager->persist($commentaires);
                    $this->entityManager->flush();  
            }
        */
     

        $commentaire_lectures=$this->entityManager->getRepository(Commentaire::class)->findCommentairesPerRecette($id_recette);
        $id_recette=1; 

            return $this->render('recette_personnalise/commentaire_page.html.twig', [
                'form'=>$form->createView(),
                'commentaire_lectures'=>$commentaire_lectures,
                'id_recette'=>$id_recette
            ]);
        }






}
