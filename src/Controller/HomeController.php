<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use App\Model\Home;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Home $home,Connection $conn): Response
    {
        print_r($home->nextRaces($conn));
        
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
