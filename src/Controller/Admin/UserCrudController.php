<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UserCrudController extends AbstractCrudController
{

   public $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        
    }


    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName,  ): iterable
    {
        return [
       
            // TextField::new('password')->setFormType(PasswordType::class),
          //  $pass=TextField::new('password')->setFormType(PasswordType::class),
          //  $passwordEncoder->encodePassword($user, $pass)

          EmailField::new('email'),
          $password = TextField::new('password', 'Mot de passe (crypté BDD, algo : bcrypt)')
          ->setFormType(PasswordType::class)      
          ->onlyOnForms(),
         
          
          AssociationField::new('allerg','Allergenes'),
          TextField::new('allergenes_2','Allergenes'),
          TextField::new('allergenes_3','Allergenes'),
          TextField::new('allergenes_4','Allergenes'),
          TextField::new('allergenes_5','Allergenes'),
          TextField::new('allergenes_6','Allergenes'),
          TextField::new('allergenes_7','Allergenes'),
          TextField::new('allergenes_8','Allergenes'),
          TextField::new('allergenes_9','Allergenes'),
          TextField::new('allergenes_10','Allergenes'),
          TextField::new('allergenes_11','Allergenes'),
          TextField::new('allergenes_12','Allergenes'),
          TextField::new('allergenes_13','Allergenes'),
          TextField::new('allergenes_14','Allergenes'),
          TextField::new('Regimes1','Regime'),
          TextField::new('Regimes2','Regime'),
          TextField::new('Regimes3','Regime'),
          TextField::new('Regimes4','Regime'),
          TextField::new('Regimes5','Regime'),
          TextField::new('Regimes6','Regime'),

         
           // yield TextField::new('plainPassword')->onlyOnForms()->setFormTypeOption('empty_data', ''),
        ];
    }




    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }


    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function encodePassword(User $user)
    {
        if ($user->getPassword() !== null) {
            //$user->setSalt(base_convert(bin2hex(random_bytes(20)), 16, 36));
            // This is where you use UserPasswordEncoderInterface
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
        }
    }






    
}
