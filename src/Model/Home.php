<?php

namespace App\Model;

/**
 * Model pro výběr nejbližších závodů a posledních výsledků
 * @package App\Model
 */
class Home extends Basic
{

    public function  nextEvents($conn): array
    {
        $sql = "SELECT zv.id_zavodu,zv.nazev_zavodu,zv.kod_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e.%c.%Y') AS datum,tz.icon,zv.web FROM zavody_{$this->currentYear()} zv, typ_zavodu tz WHERE zv.datum_zavodu  > CURDATE() AND zv.typ_zavodu = tz.id_typ_zavodu ORDER BY zv.datum_zavodu ASC LIMIT 0,4";
        $dbData = $conn->fetchAllAssociative($sql);
        if(count($dbData) < 4)
        {
            $sql1 = "SELECT zv.id_zavodu,zv.nazev_zavodu,zv.kod_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e.%c.%Y') AS datum,tz.icon,zv.web FROM zavody_{$this->nextYear()} zv, typ_zavodu tz WHERE zv.datum_zavodu  > CURDATE() AND zv.typ_zavodu = tz.id_typ_zavodu ORDER BY zv.datum_zavodu ASC LIMIT 0,4";
            $dbData1 = $conn->fetchAllAssociative($sql1);
            foreach($dbData1 as $arr)
            {
                $dbData[] = $arr;
            }
        }
        return $dbData;
    }

    public function lastResults($conn): array
    {
        $sql = "SELECT zv.id_zavodu,zv.nazev_zavodu,zv.kod_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e.%c.%Y') AS datum,tz.icon,zv.web FROM zavody_{$this->currentYear()} zv,typ_zavodu tz WHERE zv.typ_zavodu = tz.id_typ_zavodu AND zv.zverejneni > 0 AND  zv.datum_zavodu  <= CURDATE() AND zv.nove_vysledky  < 1 ORDER BY zv.datum_zavodu DESC LIMIT 0,4";
        $dbData = $conn->fetchAllAssociative($sql);
        if(count($dbData) < 4)
        {
            $sql1 = "SELECT zv.id_zavodu,zv.nazev_zavodu,zv.kod_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e.%c.%Y') AS datum,tz.icon,zv.web FROM zavody_{$this->lastYear()} zv,typ_zavodu tz WHERE zv.typ_zavodu = tz.id_typ_zavodu AND zv.zverejneni > 0 AND  zv.datum_zavodu  <= CURDATE() AND zv.nove_vysledky  < 1 ORDER BY zv.datum_zavodu DESC LIMIT 0,4";
            $dbData1 = $conn->fetchAllAssociative($sql1);
            foreach($dbData1 as $arr)
            {
                $dbData[] = $arr;
            }
        }
        return $dbData;
    }

}

