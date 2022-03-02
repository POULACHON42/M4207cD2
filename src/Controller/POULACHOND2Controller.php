<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\UserPasswordEncoderInterface;


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

    public function traitement(Request $request, EntityManagerInterface $manager, SessionInterface $session) : Response
	{
        $profil = $session -> get('chiffre');
        $username = $request -> request -> get("username");
        $password = $request -> request -> get("password");
        $repo = $manager -> getRepository (Utilisateur::class);
        $username2 =  $repo -> findOneby (["login" => $username]);
                
        
        if($username2==NULL){
            $msg="Utilisateur inconnu";
            $profil = 0;
        }
        elseif ($password == $username2 -> getPassword()){
            $msg="Vos identifiants sont corrects !";
            $profil = $username2->getId();
            $session -> set('chiffre',$profil);
            $profil = $session -> get('chiffre');
            }
        else{
            $msg = "Il ne s'agit pas du bon identifiant ou  mot de passe";
            $profil = 0;
        }

        return $this->render('poulachond2/verification.html.twig', [
            'titre' => 'confirmation',
            'login' => $username,
            'pass' => $password,
            'ms' => $msg,
            'id' => $profil
        ]);   
        
    }

    /**
	* @Route("/deco", name="deco")
	*/
    public function deconnexion(Request $request, EntityManagerInterface $manager, SessionInterface $session): Response
    {
        $session -> set('numero', 0);
        $session -> clear();

    return $this->render('poulachond2/login.html.twig');
    
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
public function createUser(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) : Response
{
    $recuplogin = $request -> request -> get("login");
    $recuppassword = $request -> request -> get("password");

    $monUtilisateur = new Utilisateur();

    $monUtilisateur -> setlogin($recuplogin);
    $monUtilisateur -> setpassword($recuppassword);

    $manager -> persist($monUtilisateur);
    $manager -> flush ();
    
    $hash = $monUtilisateur->encodePassword($person, $person->getPassword());
    $person->setPassword($hash);
    return new Response ("Utilsateur créer");
}
    /**
	* @Route("/liste_user", name="liste_user")
	*/
    public function listeUser(Request $request, EntityManagerInterface $manager, SessionInterface $session) : Response
    {
        $listeUser = $manager -> getRepository(Utilisateur::class)-> findAll();
        $profil = $session -> get('chiffre');
        return $this->render('poulachond2/users.html.twig', [
            'liste_user' => $listeUser,'id' => $profil
        ]);

    }


/*
	* @Route("/envoi_fichier", name="envoi_fichier")
	
	
    public function fichier(Request $request, EntityManagerInterface $manager, SessionInterface $session) : Response
    {
			if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
            {
            $dest="/home/etudrt/FServerPOULACHON/public/";
            if (file_exists($dest)==false)
            mkdir("fichier");          
            $_FILES['fichier']['tmp_name'];
            $_FILES['fichier']['name'] ;
            basename($_FILES['fichier']['name']);
            }
            {
            move_uploaded_file($_FILES['fichier']['tmp_name']) $dest==false;
            return new Response ("L'envoi a bien été effectué !");

            }
        }
       */ 
}
