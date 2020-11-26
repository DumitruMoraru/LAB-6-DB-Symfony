<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/HelloUser/{name?}", name="hello_user")
     */
    public function HelloUser(Request $request, $name)
    {

$form = $this->createFormBuilder()
->add('fullname')
->getForm();

$person = [
'name'=>'Roger',
'lastname'=>'Smith',
'age'=>269
];

        return $this->render('home/greet.html.twig', [
        
            'person'=>$person,
            'user_form'=>$form->createView()

        ]);
    }   
}
