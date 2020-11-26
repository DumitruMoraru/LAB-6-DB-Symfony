<?php

namespace App\Controller;

use App\Entity\RogerCity;
use App\Form\RogerCity1Type;
use App\Repository\RogerCityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/roger/city")
 */
class RogerCityController extends AbstractController
{
    /**
     * @Route("/", name="roger_city_index", methods={"GET"})
     */
    public function index(RogerCityRepository $rogerCityRepository): Response
    {
        return $this->render('roger_city/index.html.twig', [
            'roger_cities' => $rogerCityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="roger_city_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rogerCity = new RogerCity();
        $form = $this->createForm(RogerCity1Type::class, $rogerCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rogerCity);
            $entityManager->flush();

            return $this->redirectToRoute('roger_city_index');
        }

        return $this->render('roger_city/new.html.twig', [
            'roger_city' => $rogerCity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="roger_city_show", methods={"GET"})
     */
    public function show(RogerCity $rogerCity): Response
    {
        return $this->render('roger_city/show.html.twig', [
            'roger_city' => $rogerCity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="roger_city_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RogerCity $rogerCity): Response
    {
        $form = $this->createForm(RogerCity1Type::class, $rogerCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('roger_city_index');
        }

        return $this->render('roger_city/edit.html.twig', [
            'roger_city' => $rogerCity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="roger_city_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RogerCity $rogerCity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rogerCity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rogerCity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('roger_city_index');
    }
}
