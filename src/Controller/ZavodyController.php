<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZavodyController extends AbstractController
{
    /**
     * @Route("/zavody", name="zavody")
     */
    public function index(): Response
    {
        return $this->render('zavody/index.html.twig', [
            'controller_name' => 'ZavodyController',
        ]);
    }
}
