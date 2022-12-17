<?php

namespace App\Controller\Admin;

use App\Entity\LinkElement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LinkElementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LinkElement::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
