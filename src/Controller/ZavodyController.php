<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use App\Model\Zavody;


class ZavodyController extends AbstractController
{
    /**
     * @Route("/zavody/{raceYear}", name="zavody")
     */
    public function index(Connection $conn, Zavody $zavody, $raceYear): Response
    {
        
        $listEvents = $zavody->listEvents($conn,$raceYear);
        return $this->render('zavody/index.html.twig', [
            'controller_name' => 'ZavodyController',
        ]);
    }
}
