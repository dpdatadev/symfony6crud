<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test/hello')]
    public function hello(): Response
    {
        return $this->render('/test/hello.html.twig', [
            'message' => 'World!!',
        ]);
    }
}