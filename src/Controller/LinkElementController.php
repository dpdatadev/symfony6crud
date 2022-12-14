<?php

namespace App\Controller;

use App\Entity\LinkElement;
use App\Form\LinkElementType;
use App\Repository\LinkElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/link/element')]
class LinkElementController extends AbstractController
{
    #[Route('/', name: 'app_link_element_index', methods: ['GET'])]
    public function index(LinkElementRepository $linkElementRepository): Response
    {
        return $this->render('link_element/index.html.twig', [
            'link_elements' => $linkElementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_link_element_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LinkElementRepository $linkElementRepository): Response
    {
        $linkElement = new LinkElement();
        $form = $this->createForm(LinkElementType::class, $linkElement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $linkElementRepository->save($linkElement, true);

            return $this->redirectToRoute('app_link_element_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('link_element/new.html.twig', [
            'link_element' => $linkElement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_link_element_show', methods: ['GET'])]
    public function show(LinkElement $linkElement): Response
    {
        return $this->render('link_element/show.html.twig', [
            'link_element' => $linkElement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_link_element_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LinkElement $linkElement, LinkElementRepository $linkElementRepository): Response
    {
        $form = $this->createForm(LinkElementType::class, $linkElement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $linkElementRepository->save($linkElement, true);

            return $this->redirectToRoute('app_link_element_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('link_element/edit.html.twig', [
            'link_element' => $linkElement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_link_element_delete', methods: ['POST'])]
    public function delete(Request $request, LinkElement $linkElement, LinkElementRepository $linkElementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$linkElement->getId(), $request->request->get('_token'))) {
            $linkElementRepository->remove($linkElement, true);
        }

        return $this->redirectToRoute('app_link_element_index', [], Response::HTTP_SEE_OTHER);
    }
}
