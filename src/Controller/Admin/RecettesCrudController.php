<?php

namespace App\Controller\Admin;

use App\Entity\Recettes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecettesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recettes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Titre'),
            SlugField::new('slug')->setTargetFieldName('Titre'),
            TextEditorField::new('Description'),
            NumberField::new('TempsDePreparation'),
            NumberField::new('TempsDeRepos'),
            NumberField::new('TempsDeCuisson'),
            TextEditorField::new('ingedrients'),
            TextEditorField::new('Etapes'),
            AssociationField::new('Listes_des_allergenes','Allergenes'),
            AssociationField::new('Liste_de_regimes','Regimes'),
            BooleanField::new('Patients')->renderAsSwitch(false),
          
        ];
    }
    
}
