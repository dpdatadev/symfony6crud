<?php

namespace App\Controller\Admin;

use App\Entity\LoginUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LoginUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LoginUser::class;
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
