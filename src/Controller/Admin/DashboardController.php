<?php

namespace App\Controller\Admin;
use App\Entity\Team;
use App\Entity\Coach;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DashboardController extends AbstractDashboardController
{
    /**
 *  @Route("/admin")
 */
#[Route('/dashboard', name: 'dashboard')]

    public function index(): Response
    {
        return $this->render('admin/dashboard/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Football');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Équipes', 'fa fa-shield', Team::class);
        yield MenuItem::linkToCrud('Coaches', 'fa fa-shield', Coach::class);

    }
}