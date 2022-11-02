<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProprieteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Propriete::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('TypePropriete'),
            TextField::new('LibellePropriete'),
            TextField::new('LibelleCourtPropriete')
        ];
    }

}
