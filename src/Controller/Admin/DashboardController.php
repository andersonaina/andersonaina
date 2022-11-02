<?php

namespace App\Controller\Admin;

use App\Entity\Acteur;
use App\Entity\Langue;
use App\Entity\Multimedia;
use App\Entity\Pays;
use App\Entity\Propriete;
use App\Entity\Publication;
use App\Entity\Region;
use App\Entity\TypeActeur;
use App\Entity\TypeMultimedia;
use App\Entity\TypePropriete;
use App\Entity\TypePublication;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         return $this->render('admin/admin.home.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PMA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Acteur','fa-solid fa-user', Acteur::class);
        yield MenuItem::linkToCrud('Pays','fa-solid fa-earth-africa', Pays::class);
        yield MenuItem::linkToCrud('Region','fa-solid fa-house-chimney-window', Region::class);
        yield MenuItem::linkToCrud('Langue','fa-solid fa-language', Langue::class);
        yield MenuItem::linkToCrud('Multimedia','fa-solid fa-photo-film', Multimedia::class);
        yield MenuItem::linkToCrud('Publication','fa-solid fa-newspaper', Publication::class);
        yield MenuItem::linkToCrud('Propriete','fa-solid fa-circle-info', Propriete::class);
        yield MenuItem::linkToCrud('Type Acteur','fa-solid fa-gears', TypeActeur::class);
        yield MenuItem::linkToCrud('Type Propriete','fa-solid fa-gears', TypePropriete::class);
        yield MenuItem::linkToCrud('Type publication','fa-solid fa-gears', TypePublication::class);
        yield MenuItem::linkToCrud('Type Multimedia','fa-solid fa-gears', TypeMultimedia::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
