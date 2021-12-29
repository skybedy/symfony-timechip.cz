<?php

namespace App\Model;


/**
 * Model pro výběr nejbližších závodů a posledních výsledků
 * @package App\Model
 */
class Home
{
    public function  nextRaces($conn)
    {
        //$conn->query('SET NAMES utf8mb4');
        $sql = "SELECT * FROM osoby WHERE ido < ?";
        $stmt =  $conn->prepare($sql);
        $stmt->bindValue(1,10);
        $resultSet = $stmt->executeQuery();
        $dbData = $resultSet->fetchAllAssociative();
        return $dbData;
        
    }
}