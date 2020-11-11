<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\RickPick;

class RickPickController extends AbstractController
{
	

	
	
    /**
     * @Route("/RickPick", name="create_product")
     */
	
	 public function createRickPick(ValidatorInterface $validator): Response
    {
		$entityManager = $this->getDoctrine()->getManager();
		
        $rickpick = new RickPick();
        // This will trigger an error: the column isn't nullable in the database
        $rickpick->setName('Ciki Pauki');
        // This will trigger a type mismatch error: an integer is expected
        $rickpick->setAdress('31 August 3/1');
$rickpick->setAge('21');
        // ...
		
       $entityManager->persist($rickpick);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$rickpick->getId());		

        $errors = $validator->validate($rickpick);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }
}

/**
 * @Route("/RickPick/{id}", name="rickpick_show")
 */
public function show($id)
{
    $rickpick = $this->getDoctrine()
        ->getRepository(RickPick::class)
        ->find($id);

    if (!$rickpick) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    return new Response('Check out this great product: '.$rickpick->getName());

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}

/**
 * @Route("/RickPick/edit/{id}")
 */
public function update($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $rickpick = $entityManager->getRepository(RickPick::class)->find($id);

    if (!$rickpick) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $rickpick->setName('Ciki Pauki');
    $entityManager->flush();

    return $this->redirectToRoute('rickpick_show', [
        'id' => $rickpick->getId()
    ]);
}





}
