<?php

include("settings");


$veri = simplexml_load_file("http://udim.koeri.boun.edu.tr/zeqmap/xmlt/son24saat.xml");


foreach ($veri->earhquake AS $deprem) {

	$tarih = str_replace(".", "-", $deprem["name"]);
	$check->bindParam(":tarih", $tarih);
	$check->execute();
	if($check->rowCount()==0)
	{
        $query = $MYSQLdb->prepare("INSERT INTO depremler (lokasyon, lat, lng, mag, depth, tarih) VALUES (:lokasyon, :lat, :lng, :mag, :depth, :tarih)");
        $query->bindParam(":lokasyon", $deprem["lokasyon"]);
        $query->bindParam(":lat", $deprem["lat"]);
        $query->bindParam(":lng", $deprem["lng"]);
        $query->bindParam(":mag", $deprem["mag"]);
        $query->bindParam(":depth", $deprem["Depth"]);
        $query->bindParam(":tarih", $tarih);
        $query->execute();
        $query->closeCursor();
        if ($query) {
            echo "true";
        }
	}
}

?>
