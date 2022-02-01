<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class POULACHOND2Controller extends AbstractController
{
    /**
     * @Route("/poulachond2", name="poulachond2")
     */
    public function index(): Response
    {
        return $this->render('poulachond2/index.html.twig', [
            'controller_name' => 'POULACHOND2Controller',
        ]);
    }

	/**
	* @Route("/", name="home")
	*/
	
    	public function home()
	{
		return $this->render('poulachond2/home.html.twig', [
		]);
}
    
    /**
	* @Route("/traitement", name="traitement")
	*/
    public function traitement(Request $request) : Response
	{
        $nom = $request->request->get("login");
		return $this->render('poulachond2/traitement.html.twig', [
            'titre' => 'confirmation',
            'login' => $nom,
		]);
   
        $mdp = $request->request->get("pass");
		return $this->render('poulachond2/traitement.html.twig', [
            'titre' => 'confirmation',
            'pass' => $mdp,
		]);
    }

}
