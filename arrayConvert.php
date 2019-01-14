<?php
Class arrayConvert {
    /*Array para asignar los valores de la primer linea que sera el encabezado del archivo csv
    array("Nombre","Apelliddo","Edad","Sexo","Localidad")
    */
    public $header = null;
    /*datos a agregar representado por un arreglo multidimencional
    array(
        array("Xochitl","Perez","6","F","Aguascalientes"),
        array("Angel","Ramirez","29","M","San marcos"),
        array("Cintia","Castillo","6","F","Ecatepec"),
    );s
     */
    public $data = null;
    //Nombre de archivo de salida
    public $fileName = "dataExport.csv";
    //Caracter de separacion de los datos
    public $delimiter = ",";

    function arrayToCsv() {
        if(!empty($this->data) && !empty($this->header)){
            $archivo = fopen('php://memory', 'w');
            //Da formato csv a el encabezado
            fputcsv($archivo,$this->header,$this->delimiter);
            //Da formato csv al arreglo con los datos
            foreach($this->data as $line){
                fputcsv($archivo,$line,$this->delimiter);
            }
             //Regresa al inicio del archivo
            fseek($archivo, 0);
            //Modifica los encabezados para forzar la descarga del archivo
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $this->fileName . '";');
            //Escribe el puntero en el archivo
            fpassthru($archivo);
            exit;
        }
        else{
            print "No hay datos a convertir";
        }
    }
}