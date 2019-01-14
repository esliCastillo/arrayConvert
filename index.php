<?php
include_once ("arrayConvert.php");

$toCsv = new arrayConvert;
$toCsv->header = array("Nombre","Apelliddo","Edad","Sexo","Localidad");
$toCsv->data = array(
    array("Daniel","Castillo","6","M","Cocotitlan"),
    array("Citlali","Ramirez","29","F","San Juan Tehuixtitlan"),
    array("Carlos","Castillo","6","M","Cocotitlan"),
);
$toCsv->delimiter = "|";
echo $toCsv->arrayToCsv();