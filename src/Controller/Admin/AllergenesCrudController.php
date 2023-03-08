<?php

namespace App\Controller\Admin;

use App\Entity\Allergenes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AllergenesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allergenes::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
