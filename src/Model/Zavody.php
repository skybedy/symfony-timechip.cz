<?php

namespace App\Model;

/**
 * Model pro výpis závodů v danném roce
 * @package App\Model
 */
class Zavody extends Basic
{

    public function  listEvents($conn,$raceYear): array
    {
        $sql  = "SELECT zv.nove_vysledky,zv.prihlasky,zv.nazev_zavodu,DATE_FORMAT(zv.datum_zavodu,'%e. %c') AS datum,DATE_FORMAT(zv.datum_zavodu,'%e') AS den_zavodu,DATE_FORMAT(zv.datum_zavodu_konec,'%e. %c') AS datum_zavodu_konec,zv.misto_zavodu,zv.id_zavodu,zv.web,typ_zavodu.typ_zavodu,$raceYear AS year FROM zavody_{$raceYear} zv,typ_zavodu  WHERE zv.typ_zavodu = typ_zavodu.id_typ_zavodu AND zverejneni IS NOT NULL ORDER BY datum_zavodu,nazev_zavodu";
        $dbData = $conn->fetchAllAssociative($sql);
        return $dbData;
    }


}

