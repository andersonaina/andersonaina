<?php

namespace App\Controller\Admin;

use App\Entity\Acteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActeurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Acteur::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('TypeActeur'),
            AssociationField::new('Pays'),
            AssociationField::new('Propriete'),
            TextField::new('NomActeur'),
            TelephoneField::new('Contact'),
            EmailField::new('Email'),
//            TextEditorField::new('description'),
        ];
    }

}
