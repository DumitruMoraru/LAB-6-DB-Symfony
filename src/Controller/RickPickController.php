<?php

namespace App\Controller;

use App\Entity\RickPick;
use App\Form\RickPick1Type;
use App\Repository\RickPickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rick/pick")
 */
class RickPickController extends AbstractController
{
    /**
     * @Route("/", name="rick_pick_index", methods={"GET"})
     */
    public function index(RickPickRepository $rickPickRepository): Response
    {
        return $this->render('rick_pick/index.html.twig', [
            'rick_picks' => $rickPickRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rick_pick_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rickPick = new RickPick();
        $form = $this->createForm(RickPick1Type::class, $rickPick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rickPick);
            $entityManager->flush();

            return $this->redirectToRoute('rick_pick_index');
        }

        return $this->render('rick_pick/new.html.twig', [
            'rick_pick' => $rickPick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rick_pick_show", methods={"GET"})
     */
    public function show(RickPick $rickPick): Response
    {
        return $this->render('rick_pick/show.html.twig', [
            'rick_pick' => $rickPick,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rick_pick_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RickPick $rickPick): Response
    {
        $form = $this->createForm(RickPick1Type::class, $rickPick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rick_pick_index');
        }

        return $this->render('rick_pick/edit.html.twig', [
            'rick_pick' => $rickPick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rick_pick_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RickPick $rickPick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rickPick->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rickPick);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rick_pick_index');
    }
}
