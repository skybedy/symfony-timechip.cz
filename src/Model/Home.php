<?php

namespace App\Model;



/**
 * Model pro výběr nejbližších závodů a posledních výsledků
 * @package App\Model
 */
class Home extends Basic
{


    
    
    public function  nextRaces($conn)
    {
      //$this->sqlShortcuts(date("Y"));
      
       // return $this->sqlZavody;

       $year = date("Y");
     
     
        $sql = "SELECT zv.id_zavodu,zv.nazev_zavodu,zv.kod_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e.%c.%Y') AS datum,tz.icon,zv.web FROM zavody_{$year} zv, typ_zavodu tz WHERE zv.datum_zavodu  > CURDATE() AND zv.typ_zavodu = tz.id_typ_zavodu ORDER BY zv.datum_zavodu ASC LIMIT 0,4";
        $stmt =  $conn->prepare($sql);
        $stmt->bindValue(1,10);
        $resultSet = $stmt->executeQuery();
        $dbData = $resultSet->fetchAllAssociative();
        return $dbData;
        
    }
}