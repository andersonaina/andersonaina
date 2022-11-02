<?php

namespace App\Controller\Admin;

use App\Entity\Multimedia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MultimediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Multimedia::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomMultimedia'),
            TextField::new('cheminMultimedia'),
            TextField::new('descriptionMultimedia'),
            AssociationField::new('TypeMultimedia'),
            AssociationField::new('publication'),
        ];
    }

}
