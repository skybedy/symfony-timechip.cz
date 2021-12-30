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
        
        
        return $this->render('home/index.html.twig', [
            'title' => 'Hlavní strana',
            'nextEvents' => $home->nextEvents($conn),
            'lastResults' => $home->lastResults($conn)
        ]);
    }
}
