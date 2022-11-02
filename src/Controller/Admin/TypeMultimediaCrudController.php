<?php

namespace App\Controller\Admin;

use App\Entity\TypeMultimedia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeMultimediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeMultimedia::class;
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
