<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Connection $conn): Response
    {
        $sql = "SELECT * FROM osoby WHERE ido < ?";
        $stmt =  $conn->prepare($sql);
        $stmt->bindValue(1,10);
        $resultSet = $stmt->executeQuery();
        //$dbData = $resultSet->fetchAllAssociative();
        while($row = $resultSet->fetchAssociative()){
            echo $row["jmeno"]." <br>";
        }
        
        
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
