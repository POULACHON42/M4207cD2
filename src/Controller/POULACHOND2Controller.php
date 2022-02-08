<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;


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

    public function traitement(Request $request, EntityManagerInterface $manager) : Response
	{
        $username = $request -> request -> get("login");
        $password = $request -> request -> get("password");
        $repo = $manager -> getRepository (Utilisateur::class);
        $username2 =  $repo -> findOneby (["login" => $username]);
        
        if($username==NULL)
          $msg="Utilisateur inconnu";
        elseif ($password == $username2 -> getPassword())
            $msg="Vos identifiants sont corrects !";
        else
            $msg = "Il ne s'agit pas du bon identifiant ou  mot de passe";

        return $this->render('poulachond2/verification.html.twig', [
            'titre' => 'confirmation',
            'login' => $username,
            'pass' => $password,
            'ms' => $msg,
        ]);   
    }

    /**
	* @Route("/creaUser", name="creaUser")
	*/
	public function creation()
	{
		return $this->render('poulachond2/création.html.twig', [
		]);
    }

    /**
	* @Route("/creation", name="creation")
	*/
public function createUser(Request $request, EntityManagerInterface $manager) : Response
{
    $recuplogin = $request -> request -> get("login");
    $recuppassword = $request -> request -> get("password");

    $monUtilisateur = new Utilisateur();

    $monUtilisateur -> setlogin($recuplogin);
    $monUtilisateur -> setpassword($recuppassword);

    $manager ->persist($monUtilisateur);
    $manager ->flush ();
    return new reponse ("Utilsateur créer");




}


}
