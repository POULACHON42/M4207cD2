<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
