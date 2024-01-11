<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;


class TeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Team::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('name'),
            TextField::new('country'),
            TextEditorField::new('city'),
            ImageField::new('logo')
            ->setBasePath('/uploads/images/') // Path where uploaded images are stored
            ->setUploadDir('/public/uploads/images/') // Path to upload images
            ->setRequired(false), // Set this to false if the image is not required
        ];
    }
    
}
