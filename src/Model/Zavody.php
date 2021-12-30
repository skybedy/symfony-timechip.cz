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
        $sql  = "SELECT "+sqlshortcut.zavody+".nazev_zavodu,DATE_FORMAT("+sqlshortcut.zavody+".datum_zavodu,'%e. %c') AS datum,DATE_FORMAT("+sqlshortcut.zavody+".datum_zavodu,'%e') AS den_zavodu,DATE_FORMAT("+sqlshortcut.zavody+".datum_zavodu_konec,'%e. %c') AS datum_zavodu_konec,"+sqlshortcut.zavody+".misto_zavodu,"+sqlshortcut.zavody+".id_zavodu,typ_zavodu.typ_zavodu,"+year+" AS year FROM "+sqlshortcut.zavody+",typ_zavodu WHERE "+sqlshortcut.zavody+".typ_zavodu = typ_zavodu.id_typ_zavodu AND zverejneni IS NOT NULL ORDER BY datum_zavodu,nazev_zavodu";

        return $dbData;
    }


}

