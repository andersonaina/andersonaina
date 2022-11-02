<?php

namespace App\Controller\Admin;

use App\Entity\Publication;
use App\Entity\TypePublication;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class PublicationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publication::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            AssociationField::new('acteur'),
            AssociationField::new('TypePublication'),
            AssociationField::new('Propriete'),
            TextField::new('libellePublication'),
            DateField::new('datePublication'),
            TimeField::new('heurePublication')
        ];
    }

}
