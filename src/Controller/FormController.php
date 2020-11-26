<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RickPickType;
use App\Entity\RickPick;
use Symfony\Component\HttpFoundation\Request;
class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request): Response
   {	$rickpick=new RickPick();
   	
   	$form=$this->createForm(RickPickType::class,$rickpick,
      ['action'=> $this->generateUrl('form')
      ]);

   	//handle the request
    $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid())
      { 
      //storing to the database
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($rickpick);
        $entityManager->flush();
      }
        return $this->render('form/index.html.twig', [
            'rickpick_form' => $form->createView()
        ]);
    }
      /**
      * @Route("/form/remove/{id}", name="remove")
      */
    public function remove(Request $request, $id):Response
    {
       $entityManager=$this->getDoctrine()->getManager();
       $rickpick=$entityManager->getRepository(RickPick::class)->findOneBy(
        [ 'id'=> $id
        ]);
       $form=$this->createForm(ProductType::class, $rickpick,[
        'action'=>$this->generateUrl('form')
       ]);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid())
       {
        //$entityManager->remove($rickpick);
        //$entityManager->flush();
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($rickpick);
        $entityManager->flush();
       }
       $entityManager->remove($rickpick);
      $entityManager->flush();
       
       return $this->render('form/index.html.twig', [
            'rickpick_form' => $form->createView()]);
    }
    /**
    * @Route("/showRickPick/{id}", name="show_rickpick")
    */
    public function showRickPick(Request $request, RickPick $rickpick)
    {
       return $this->render('form/show_rickpick.html.twig', [
            'rickpick' => $rickpick]);
    }
}