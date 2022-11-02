<?php

namespace App\Controller\Admin;

use App\Entity\TypePublication;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypePublicationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypePublication::class;
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
