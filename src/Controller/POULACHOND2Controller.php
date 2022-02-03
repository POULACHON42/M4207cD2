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
        return $this->render('poulachond2/base.html.twig', [
            'controller_name' => 'POULACHOND2Controller',
        ]);
    }

	/**
	* @Route("/", name="home")
	*/
	
    	public function home()
	{
		return $this->render('poulachond2/login.html.twig', [
		]);
    }
    
    /**
	* @Route("/traitement", name="traitement")
	*/

    public function forget(Request $request) : Response
	{
        $nom = $request->request->get("username");
        $mdp = $request->request->get("password");

        if($nom=="root" && $mdp=="toor")
            $message="Vous avez mis le bon mot de passe";
        else
            $message="Il ne s'agit pas du bon identifiant ou mot de passe";

        return $this->render('poulachond2/verification.html.twig', [
            'titre' => 'confirmation',
            'login' => $nom,
            'pass' => $mdp,
            'ms' => $message,
        ]);
    }

}
