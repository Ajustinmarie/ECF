<?php

namespace App\Repository;

use App\Entity\Recettes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recettes>
 *
 * @method Recettes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recettes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recettes[]    findAll()
 * @method Recettes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecettesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recettes::class);
    }

    public function save(Recettes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recettes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function findWithPatient()
    {
         $query=$this
         ->createQueryBuilder('r') 
         ->andWhere('r.Patients = :val') 
         ->setParameter('val', 0);
         return  $query->getQuery()->getResult();         
    }



    public function findWithPersonalise()
    {
        
         $query= $this
         ->createQueryBuilder('r') 
         ->select('c','p')
         
         ->andWhere('r.Patients = :val') 
         ->setParameter('val', 1);

         return  $query->getQuery()->getResult();  
    }

     

    public function findAllAllergenesPerPatient($allergenes): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM user_allergenes WHERE user_id=$allergenes";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findAllregimePerPatient($regimes): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT rc.id,
        rc.titre,
        rc.description,
        rc.temps_de_preparation,
        rc.temps_de_cuisson,
        rc.ingedrients,
        rc.etapes,
        rc.temps_de_repos,
        rc.illustration
        FROM 
        user_regime AS ur, 
        recettes_regime AS rr,  
        recettes AS rc
        WHERE ur.regime_id=rr.regime_id 
        AND ur.user_id=10 
        AND rr.recettes_id=rc.id
        AND rc.patients=1";      
      
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }



    public function findOnerecettePerPatient($recettes_id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT 
        * FROM recettes 
        WHERE id=$recettes_id
        AND patients=1
        ";
      
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }




    public function findAllRegimeRecette_Allergenes($id_recette, $id_user): array
    {


        $conn = $this->getEntityManager()->getConnection();
     //  $sql = "SELECT * FROM recettes_allergenes WHERE allergenes_id=$recette_allergenes";
     $sql = "
       SELECT al.nom,
       al.id     
       FROM 
       user_allergenes AS ua, 
       recettes_allergenes AS ra,
       allergenes AS al,
       recettes AS rc
       WHERE ua.allergenes_id=ra.allergenes_id
       AND ra.recettes_id=$id_recette
       AND ua.user_id=$id_user
       AND al.id=ua.allergenes_id
       AND rc.id=1
       AND rc.patients=1
     ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findAllRegimeRecette($regimeRecette): array {
    
      // dd($regimeRecette);
        $conn = $this->getEntityManager()->getConnection();
      //  $sql = "SELECT * FROM recettes_regime WHERE regime_id=$regimeRecette";
     // $sql = "SELECT * FROM recettes_regime WHERE regime_id in ('.$regimeRecette.')";
         $sql = "SELECT * FROM recettes_regime WHERE regime_id in ($regimeRecette) ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();

    }


    

//    /**
//     * @return Recettes[] Returns an array of Recettes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recettes
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
