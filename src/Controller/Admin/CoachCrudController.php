<?php

namespace App\Controller\Admin;

use App\Entity\Coach;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class CoachCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coach::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            AssociationField::new('team')
                ->setFormTypeOptions([
                    'required' => true,
                ])
                ->setSortable(true)
                ->setHelp('Select the team for the coach.'),
            TextField::new('name'),

        ];
    }
    
}
