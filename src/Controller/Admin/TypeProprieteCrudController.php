<?php

namespace App\Controller\Admin;

use App\Entity\TypePropriete;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeProprieteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypePropriete::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('LibelleTypePropriete')
        ];
    }
}
