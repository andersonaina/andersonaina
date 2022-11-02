<?php

namespace App\Controller\Admin;

use App\Entity\TypeActeur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeActeurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeActeur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            TextField::new('NomTypeActeur')
        ];
    }

}
